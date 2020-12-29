<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "benutzer"
 */

//Sucht in der Datenbank nach der eingegeben email
function db_benutzer_suchen()
{
        $link = connectdb();
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $query = "SELECT * FROM emensawerbeseite.benutzer WHERE email ='$username'";
        $data = mysqli_real_escape_string($link, $query); //_real_escape damit kein Code in die Datenbank gelangt!

        $result1 = mysqli_query($link, $data);

        mysqli_close($link);
        return $result1;
    }


