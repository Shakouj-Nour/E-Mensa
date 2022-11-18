<?php
$link = mysqli_connect(
    "localhost",
    "root",
    "root",
    "emensawerbeseite",
    "3306"
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}
$sql = "SELECT * FROM gericht";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "Fehler während der Abfrage: ", mysqli_error($link);
    exit();
}

echo '<table style="border: blueviolet">';
echo '<thead>';
echo '<tr>';
echo  "<td> id </td>" ;
echo  "<td> name </td>" ;
echo  "<td> beschreibung </td>" ;
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) { //nimmt eine row und packt jedes row in einem Array
    echo '<tr >';
    echo '<td >', $row['id'] ,'</td>';
    echo '<td>', $row['name'] ,'</td>';
    echo '<td>', $row['beschreibung'] ,'</td>';
    echo '</tr>';
}
echo "</tbody>";
echo "</table>";