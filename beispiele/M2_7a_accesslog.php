/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
*/
<?php

$zeitFile = fopen('./accesslog.txt', 'a');
fwrite($zeitFile, $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . "  " . date("d.m.Y h:i:sa"));
fclose($zeitFile);