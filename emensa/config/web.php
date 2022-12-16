<?php
session_start();
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'             => "HomeController@anmeldung",
    "/demo"         => "DemoController@demo",
    '/dbconnect'    => 'DemoController@dbconnect',
    '/debug'        => 'HomeController@debug',
    '/error'        => 'DemoController@error',
    '/requestdata'   => 'DemoController@requestdata',
    '/log'        => 'ExamplesController@logger',
    '/anmeldung' =>"HomeController@anmeldung",
    '/anmeldung_verfizieren'=>"HomeController@anmeldung_verfizieren",
    '/abmeldung'=>"HomeController@abmeldung",
    '/werbeseite'=>"HomeController@werbeseite",

    // Erstes Beispiel:
    '/m4_7a_queryparameter' => 'ExamplesController@m4_7a_queryparameter',
    '/m4' => 'ExamplesController@m4_7a_queryparameter',
    '/m4_7b_kategorie' => 'ExamplesController@m4_7b_kategorie',
    '/m4_7c_gerichte' => 'ExamplesController@m4_7c_gerichte',
    '/page' => 'ExamplesController@layout',

);