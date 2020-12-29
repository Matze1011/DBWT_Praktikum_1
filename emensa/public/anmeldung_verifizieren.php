<?php

require_once('../models/benutzer.php');

//Anzahl Treffer überprüfen

    $link = connectdb();
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $result1 = db_benutzer_suchen();
    $resultCheck = mysqli_num_rows($result1);


    if ($resultCheck < 1) {
        echo "Benutzer nicht gefunden";
        //header("Location: /login");
        //exit();
    } else {
        // Ist das Passwort korrekt?
        // Die Variable row wird als Array mit den Informationen aus der Datenbank gefüllt
        if ($row = mysqli_fetch_assoc($result1)) {
            // De-Hashing des Passwortes
            // password_verify($password, $row['password']) gibt true oder false zurück
            $hashedPassword = password_verify($password, $row['password']);
            if ($hashedPassword == false) {
                //header("Location: /login");
                //exit();
                // elseif fängt unvorhergesehene Fehler ab
            } elseif ($hashedPassword == true) {
                // Benutzer anmelden
                $_SESSION['session_id'] = $row['id'];
                $_SESSION['session_user'] = $row['user'];
                $_SESSION['session_firstname'] = $row['firstname'];
                $_SESSION['session_lastname'] = $row['lastname'];
               //header("Location: /emensaWerbeseite");
                echo"Anmeldung hat geklappt!!!!";
                //exit();
            }
        }
    }

