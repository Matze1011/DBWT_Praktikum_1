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

function db_gericht_mit_allergenen(){
    $link = connectdb();
    $sql =  "SELECT gericht.name,gericht.bildname,gericht.preis_intern, gericht.preis_extern,gericht.id, group_concat(allergen.code)
                        FROM gericht
                        LEFT JOIN gericht_hat_allergen ON gericht.id=gericht_hat_allergen.gericht_id
                        LEFT JOIN allergen ON allergen.code=gericht_hat_allergen.code
                        GROUP BY gericht.name
                        ORDER BY gericht.name ASC LIMIT 5";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

function db_gericht_all_names() {
    $link = connectdb();
    mysqli_set_charset($link, "utf8"); //Für Umlaute hinzugefügt
    $sql = "SELECT id, name, bildname FROM gericht ORDER BY name";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

function db_gericht_ausgewähltes_gericht($gericht_id) {
    $link = connectdb();
    mysqli_set_charset($link, "utf8"); //Für Umlaute hinzugefügt
    $sql = "SELECT bildname FROM gericht WHERE id = '$gericht_id'";
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