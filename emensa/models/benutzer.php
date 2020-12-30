<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "benutzer"
 */

//Sucht in der Datenbank nach der eingegeben email
function db_benutzer_suchen()
{
        $link = connectdb();
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $query = "SELECT * FROM benutzer WHERE email ='$username'";
        $query_safe = mysqli_real_escape_string($link, $query); //_real_escape damit kein Code in die Datenbank gelangt!

        $result1 = mysqli_query($link, $query);

        mysqli_close($link);
        return $result1;
    }

    function db_benutzer_anzahl_letzteanmeldungen_inkrement(){
        $link = connectdb();
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $sql = "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1, letzteanmeldung = CURRENT_TIMESTAMP WHERE email = '$username'";
        if ($link->query($sql) === TRUE) {
            echo'<script>alert("Daten gespeichert")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
        return $sql;
}

    function db_benutzer_letzterfehler(){
        $link = connectdb();
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $sql = "UPDATE benutzer SET letzterfehler = CURRENT_TIMESTAMP WHERE email = '$username'";
        if ($link->query($sql) === TRUE) {
            echo'<script>alert("Daten gespeichert")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
        return $sql;
    }

    function db_mysqli_begin_transaction(){
    $link = connectdb();
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $link->begin_transaction();
    $link->query("UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1, letzteanmeldung = CURRENT_TIMESTAMP WHERE email = '$username'");
    $link->commit();
    return $link;

    }



