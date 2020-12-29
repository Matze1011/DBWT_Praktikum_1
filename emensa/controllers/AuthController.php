<?php


class AuthController
{
    public function index(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('login', ['msg' => $msg]);
    }

    /** Route /login_check */
    public function anmeldung_verifizieren(RequestData $rd) {
        $username = $rd->query['username'] ?? false;
        $password = $rd->query['password'] ?? false;
        // Überprüfung der Eingabedaten

        $_SESSION['login_result_message'] = null;
        if ($user !== false && password_verify($passwort, $user['passwort']))  {
            $_SESSION['login_ok'] = true;
            $target = $_SESSION['target'];
            header('Location: /' . $target);
        }
        else {
            $_SESSION['login_result_message'] =
            'Benutzer- oder Passwort falsch';
        header('Location: /login');
        } }
}
