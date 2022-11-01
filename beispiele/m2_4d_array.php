<?php
$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>4d</title>
</head>
<body>
    <ol>
        <li>
            <?php
                echo $famousMeals[1]['name'];
                echo "<br>";
                $name = $famousMeals[1];
                foreach ($name['winner']as $jahr){
                    echo $jahr, ',';
                }
            ?>
        </li>
        <br>
        <li>
            <?php
                echo $famousMeals[2]['name'];
                echo "<br>";
                $name = $famousMeals[2];
                foreach ($name['winner']as $jahr){
                    echo $jahr, ',';
                }
            ?>
        </li>
        <br>
        <li>
            <?php
                echo $famousMeals[3]['name'];
                echo "<br>";
                $name = $famousMeals[3];
                foreach ($name['winner']as $jahr){
                    echo $jahr, ',';
                }
            ?>
        </li>
        <br>
        <li>
            <?php
                echo $famousMeals[4]['name'];
                echo "<br>";
                $name = $famousMeals[4];
                foreach ($name['winner']as $jahr){
                    echo $jahr, ',';
                }
            ?>
        </li>

    </ol>
</body>
