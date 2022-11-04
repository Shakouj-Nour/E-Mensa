<?php
$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => [2019]]
];

$loser=array();
function keinGewinner($famousMeals)
{
    $year=[];
    foreach ($famousMeals as $meals){
        foreach ($meals['winner'] as $years){
            $year[]= $years;
        }
    }
    asort($year, SORT_NUMERIC);
    $test= range(2000, 2022);
    foreach ($test as $key) {
        if(in_array($key, $year)){

        }
        else{
            $loser[]=$key;
        }
    }
    return $loser;
}
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
                $a = 0;
                foreach (array_reverse($name['winner'])as $jahr){
                    if($a != 0){
                        echo ', ';
                    }
                    $a++;
                    echo $jahr;
                }
            ?>
        </li>
        <br>
        <li>
            <?php
                echo $famousMeals[2]['name'];
                echo "<br>";
                $name = $famousMeals[2];
                $a = 0;
                foreach (array_reverse($name['winner'])as $jahr){
                    if($a != 0){
                        echo ', ';
                    }
                    $a++;
                    echo $jahr;
                }
            ?>
        </li>
        <br>
        <li>
            <?php
                echo $famousMeals[3]['name'];
                echo "<br>";
                $name = $famousMeals[3];
                $a = 0;
                foreach (array_reverse($name['winner'])as $jahr){
                    if($a != 0){
                        echo ', ';
                    }
                    $a++;
                    echo $jahr;
                }
            ?>
        </li>
        <br>
        <li>
            <?php
                echo $famousMeals[4]['name'];
                echo "<br>";
                $name = $famousMeals[4];
                $a = 0;
                foreach ($name['winner']as $jahr){
                    if($a != 0){
                        echo ', ';
                    }
                    $a++;
                    echo $jahr;
                }
            ?>
        </li>
    </ol>
    <p>
        <?php
            foreach ( keinGewinner($famousMeals) as $key){
                echo $key. ', ';
            }
        ?>
    </p>
</body>
