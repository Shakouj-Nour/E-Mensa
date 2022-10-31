<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
 */
include 'm2_4a_standardparameter.php';
$var = addieren(12, 15);
var_dump($var);
$var1 = addieren($var, 2);
var_dump($var1);
$var2 = addieren($var, $var1);
var_dump($var2);
