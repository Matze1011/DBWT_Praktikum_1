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
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
        return $sql;
    }

    function db_benutzer_mysqli_begin_transaction(){
    $link = connectdb();
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $link->begin_transaction();
    $link->query("UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1, letzteanmeldung = CURRENT_TIMESTAMP WHERE email = '$username'");
    $link->commit();
    return $link;

    }


function db_benutzer_procedur()
{
    $link = connectdb();
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $sql = "SELECT id, passwort FROM benutzer WHERE email='$username'";
    $result = mysqli_query($link, $sql);
    echo mysqli_error($link); //falls Fehler

        $benutzer = mysqli_fetch_assoc($result); //Daten als Array in Benutzer speichern

        $link->begin_transaction(); //1.9

            //1.6
            $link->query("UPDATE benutzer SET letzteanmeldung=CURRENT_TIMESTAMP WHERE id=" . $benutzer['id']);
            echo mysqli_error($link);//n.w.; ausgabe falls fehler

            //1.5 oder 5
            $link->query("CALL anzahlanmeldung(".$benutzer['id'].");");//Aufruf der Prozedur
            $link->commit();
            return $benutzer;

}



