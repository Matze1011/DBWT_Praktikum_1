<?php
/**
 * Mapping of paths to controlls.
 * Note, that the path only support 1 level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as aspected
 */
return array(

    "/"            => "HomeController@index",
    "/demo"        => "DemoController@demo",
    '/dbconnect'   => 'DemoController@dbconnect',
    "/login"       => "AuthController@index",
    "/logout"      => "AuthController@logout",
    "/check_login" => "AuthController@check",
    "/wunschgericht" => "HomeController@wunschgericht",
    "/wunschgericht_formdata" => "HomeController@wunschgericht_formdata",
    "/newsletter" => "HomeController@newsletter",
    "/bewertung_abgeben" => "BewertungController@bewertung_abgeben",
    "/bewertung_gericht_ausgesucht" => "BewertungController@bewertung_gericht_ausgesucht",
    '/bewertung' => 'BewertungController@index',
    '/bewertung_senden'=> 'BewertungController@store',
    '/bewertungen'=> 'BewertungController@bew_zeigen',
    '/meinebewertungen'=> 'BewertungController@meine_bew',
    '/pinned_bewertungen' => 'BewertungController@pinned_bewertungen_anzeigen',
    '/loeschen_bewertungen'=> 'BewertungController@loschen_bew',
    '/hervorheben'=> 'BewertungController@hervorheben',
    '/hervorhebung_abwaehlen'=> 'BewertungController@hervorhebung_abwaehlen',

    // Erstes Beispiel:
    //Pfad zur jeweiligen Mehtode angeben mittels @
    '/m4_6a_queryparameter' => 'ExampleController@m4_6a_queryparameter',
    '/m4_6b_kategorie' => 'ExampleController@m4_6b_kategorie',
    '/m4_6c_gerichte' => 'ExampleController@m4_6c_gerichte',
    '/m4_6d_layout' => 'ExampleController@m4_6d_layout',
    '/vlsessiondemo' => 'DemoController@vlsessiondemo',

);