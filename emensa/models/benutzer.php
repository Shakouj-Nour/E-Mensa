<?php
function login_controller($rd){
    if($_SERVER['REQUEST_METHOD'] !== 'POST') return;

    $link = connectdb();

    $b_email = mysqli_real_escape_string($link, htmlspecialchars($_POST['b_email']));
    $b_passwort = crypt($_POST['b_passwort'], 'dbwt');
    $timestamp = $_SERVER['REQUEST_TIME']; // was ist das?
    $date = new DateTime();
    $date->setTimestamp($timestamp); // das auch
    $dateTime = $date->format('Y-m-d H-i-s');

    $_SESSION['username'] = $_POST['b_email'];


    // Start Transaction
    mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);

    // Check if user exists
    $sql = "SELECT b_id, b_admin FROM tbl_benutzeren WHERE tbl_benutzeren.b_email = '$b_email' ";
    $res = $link->query($sql)->fetch_assoc();

    $userID = $res['b_id'];
    $admin = $res['b_admin'];

    $link -> commit();

    if(isset($userID)){
        $_SESSION['userId'] = $userID;
        $_SESSION['admin'] = $admin;

        // login user
        $userLoginDataCheck = $link->query("SELECT COUNT(1) as res FROM tbl_benutzeren WHERE b_passwort = '$b_passwort' AND b_email = '$b_email'")->fetch_assoc()['res'];
        $link -> commit();

        if($userLoginDataCheck === '1'){
            // update user
            $stmt = $link->prepare("CALL update_anmeldung(?, ?)");
            $stmt->bind_param("ss", $userID, $dateTime);
            $stmt->execute();
            $link -> commit();
            $stmt->close();

            $_SESSION['logged_in'] = true;//set session


        }else{

            $stmt = $link->prepare("UPDATE tbl_benutzeren 
            SET tbl_benutzeren.b_anzahlfehler = tbl_benutzeren.b_anzahlfehler + 1, b_letzterFehler = ? 
            WHERE b_email = ?");
            $stmt->bind_param("ss", $dateTime, $_POST['b_email']);
            $stmt->execute();
            $link -> commit();
            $stmt->close();
            $_SESSION['check_passwort'] = false;
            return false;
        }

    }else{
        // register user

        /* Prepared statement, stage 1: prepare */
        $stmt = $link->prepare("INSERT INTO tbl_benutzeren (b_name, b_email, b_passwort, b_admin, b_anzahlfehler, 
        b_anzahlAnmeldung, b_letzteAnmeldung, b_letzteAnmeldung, b_letzterFehler)
        VALUES (?, ?, ?, 0, 0, 1, ?, NULL)");

        /* Prepared statement, stage 2: bind and execute */
        $stmt->bind_param("sss", $_POST['b_email'], $password, $dateTime);
        $stmt->execute();
        $link -> commit();
        $stmt->close();

        // Get userID
        $sql = "SELECT b_id, b_admin FROM tbl_benutzeren WHERE tbl_benutzeren.b_email = '$b_email' ";
        $register = $link->query($sql)->fetch_assoc();
        $userID = $register['id'];
        $admin = $register['admin'];
        $_SESSION['userId'] = $userID;
        $_SESSION['admin'] = $admin;
    }
    return true;
}
/**
 * @return void
 * initialise Session
 * if user isn't logged in, redirect to login page
 */
function isLoggedIn() {
    // Start a session if one is not already active
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the 'logged_in' key is set in the session data
    return isset($_SESSION['logged_in']);
}

