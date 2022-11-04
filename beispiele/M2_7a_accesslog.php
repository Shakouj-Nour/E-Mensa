<?php

$file = fopen('./accesslog.txt', 'a');
date_default_timezone_set("Europe/Berlin");
fwrite($file, $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . "  " . date("d.m.Y h:i:sa"));
fclose($file);