<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "kategorie"
 */
function db_kategorie_select_all() {
    $link = connectdb();
    mysqli_set_charset($link, "utf8"); //Für Umlaute hinzugefügt
    $sql = "SELECT * FROM kategorie";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}
//Aufgabe 6.2 Kategorien sortiert ausgeben
function db_kategorie_select_name() {
    $link = connectdb();
    mysqli_set_charset($link, "utf8"); //Für Umlaute hinzugefügt
    $sql = "SELECT name FROM kategorie order by name";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}