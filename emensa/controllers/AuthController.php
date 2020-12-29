<?php
require_once('../models/benutzer.php');

class AuthController

{
    public function index(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        echo $msg;
        echo "Test";
        return view('login', ['msg' => $msg]);

    }

    /** Route /login_check */
    public function check(RequestData $rd)
    {
       // $username = $rd->query['username'] ?? false;
       // $password = $rd->query['password'] ?? false;
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Überprüfung Eingabedaten
        $_SESSION['login_result_message'] = null;
        $link = connectdb();
        $query = "SELECT * FROM benutzer WHERE email ='$username'";
        $query_safe = mysqli_real_escape_string($link, $query); //_real_escape damit kein Code in die Datenbank gelangt!
        $result1 = mysqli_query($link, $query);

        if ($rows = mysqli_num_rows($result1) == 1) {
            while ($data = mysqli_fetch_assoc($result1)) {
                // De-Hashing des Passwortes
                // password_verify($password, $row['password']) gibt true oder false zurück
                $password_check = password_verify($password, $data['passwort']);
                if ($password_check == true) {
                    $_SESSION['login_ok'] = true;
                    $target = $_SESSION['target'];
                    echo "ERFOLG!!!!!";
                        header('Location: /');
                }
            }
        }
        else {
            $_SESSION['login_result_message'] = 'Benutzer- oder Passwort falsch';
            header('Location: /login');
        }
    }
}
