<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
    $link = connectdb();
    mysqli_set_charset($link, "utf8"); //Für Umlaute hinzugefügt
    $sql = "SELECT id, name, beschreibung FROM gericht ORDER BY name";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

//Aufgabe 6.3
function db_gericht_select_mehr_als_2euro(){
    $link = connectdb();
    mysqli_set_charset($link, "utf8"); //Für Umlaute hinzugefügt
    $sql = "SELECT name,preis_intern FROM gericht having preis_intern > 2
            order by name desc";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}