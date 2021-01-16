<?php
require_once('../models/benutzer.php');

class AuthController

{
    public function index(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        //$user = $_SESSION['username'] ?? null;
        return view('login', ['msg' => $msg]);

    }

    /** Route /login_check */
    public function check(RequestData $rd)
    {
        $link = connectdb();
        //$username = $rd->query['username'] ?? false;
        $password = $_POST['password'];
        $passwordsafe = mysqli_real_escape_string($link, $_POST['password']); //Zum Schutz
        htmlspecialchars($passwordsafe, ENT_QUOTES, 'UTF-8'); //Zum Schutz

        // Überprüfung Eingabedaten
        $_SESSION['login_result_message'] = null;
        //$result1 = db_benutzer_suchen(); //siehe models/benutzer.php
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $query = "SELECT * FROM benutzer WHERE email ='$username'";
        $result1 = mysqli_query($link, $query);
        $user_data = mysqli_fetch_assoc($result1);
        //FALLS NÖTIG: HIER DANN DATEN DES BENUTZERS MITTELS FETCH_ASSOOC IN EINER VARIABLEN SPEICHERN
        if ($result1) {
                // De-Hashing des Passwortes
                // password_verify($password, $row['password']) gibt true oder false zurück
                $password_check = password_verify($passwordsafe, $user_data['passwort']);
                if ($password_check == true) {
                    $_SESSION['login_ok'] = true;
                    $_SESSION['login_result_message'] = 'Sie sind bereits angemeldet';
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['User'] = $user_data;


                    //Aufgabe 1.5 und 1.6
                    //db_benutzer_anzahl_letzteanmeldungen_inkrement();

                    //Aufgabe 1.9
                    //db_benutzer_mysqli_begin_transaction();

                    // Aufgabe 5
                    db_benutzer_procedur();

                    //Aufgabe 3 Log
                    logger('login')->info('Erfolgreicher Login Benutzer: ',[$_SESSION['username']]);

                    header('Location: /');

                } else {
                    $_SESSION['login_result_message'] = 'Benutzer- oder Passwort falsch';
                    $_SESSION['login_ok'] = false;
                    db_benutzer_letzterfehler();
                    //Aufgabe 3 Log
                    logger('loginversuch')->warning('Erfolgloser Loginversuch Benutzer: ',[$_POST['username']]);
                    header('Location: /login');
                }
            }

        else {
            $_SESSION['login_result_message'] = 'Benutzer- oder Passwort falsch';
            $_SESSION['login_ok'] = false;

            //Aufgabe 3 Log
            logger('loginversuch')->warning('Erfolgloser Loginversuch von: ' ,['unbekannt']);

            header('Location: /login');
        }
    }

    public function logout(){
        session_destroy();
        //Aufgabe 3
        logger('logout')->info('Abgemeldet Benutzer: ',[$_SESSION['username']]);
        header ('Location: /');
    }
}
