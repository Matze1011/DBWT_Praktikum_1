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
       $username = $rd->query['username'] ?? false;

       // $password = $rd->query['password'] ?? false;
        $password = $_POST['password'];

        // Überprüfung Eingabedaten
        $_SESSION['login_result_message'] = null;
        $result1 = db_benutzer_suchen(); //siehe models/benutzer.php

        if ($rows = mysqli_num_rows($result1) == 1) {
            while ($data = mysqli_fetch_assoc($result1)) {
                // De-Hashing des Passwortes
                // password_verify($password, $row['password']) gibt true oder false zurück
                $password_check = password_verify($password, $data['passwort']);
                if ($password_check == true) {
                    $_SESSION['login_ok'] = true;
                    //$target = $_SESSION['target'];
                    $_SESSION['login_result_message'] = 'Sie sind bereits angemeldet';
                    $_SESSION['username'] = $_POST['username'];

                    db_benutzer_anzahl_letzteanmeldungen_inkrement();

                    header('Location: /');
                } else {
                    $_SESSION['login_result_message'] = 'Benutzer- oder Passwort falsch';
                    $_SESSION['login_ok'] = false;
                    db_benutzer_letzterfehler();
                    header('Location: /login');
                }
            }
        }
        else {
            $_SESSION['login_result_message'] = 'Benutzer- oder Passwort falsch';
            $_SESSION['login_ok'] = false;
            db_benutzer_letzterfehler();
            header('Location: /login');
        }
    }
}
