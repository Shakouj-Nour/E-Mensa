<?php
session_start();
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'             => "HomeController@werbeseite",
    "/demo"         => "DemoController@demo",
    '/dbconnect'    => 'DemoController@dbconnect',
    '/debug'        => 'HomeController@debug',
    '/error'        => 'DemoController@error',
    '/requestdata'   => 'DemoController@requestdata',
    '/log'        => 'ExamplesController@logger',

    // Erstes Beispiel:
    '/m4_7a_queryparameter' => 'ExamplesController@m4_7a_queryparameter',
    '/m4' => 'ExamplesController@m4_7a_queryparameter',
    '/m4_7b_kategorie' => 'ExamplesController@m4_7b_kategorie',
    '/m4_7c_gerichte' => 'ExamplesController@m4_7c_gerichte',
    '/page' => 'ExamplesController@layout',

    // Werbeseite
    '/anmeldung' =>"HomeController@anmeldung",
    '/anmeldung_verifizieren'=>"HomeController@anmeldung_verfizieren",
    '/abmeldung'=>"HomeController@abmeldung",
    '/benutzer_verifizieren' => 'HomeController@benutzer_verifizieren',
    '/werbeseite'=>"HomeController@werbeseite",
    '/bewertung' => 'HomeController@bewertung',
    '/bewertungen' => 'HomeController@bewertungen',
    '/bewerten_verifizieren'=>"HomeController@bewerten_verifizieren",
    '/meinebewertungen' => "HomeController@meinebewertungen",
    '/delete_bewertung'=>"HomeController@delete_bewertung",
    '/hervorheben_bewertung' => 'HomeController@hervorheben_bewertung',
    '/remove_hervorgehobene_bewertung' => 'HomeController@remove_hervorgehobene_bewertung',
);