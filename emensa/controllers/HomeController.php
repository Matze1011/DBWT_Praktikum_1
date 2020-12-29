<?php
require_once('../models/gericht.php');


/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request)
    {
        $user = $_SESSION['username'] ?? 'nicht angemeldet';
        //Zähler für webseite
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        }
        $_SESSION['counter']++;
        echo $_SESSION['counter'];

        return view('emensaWerbeseite', ['rd' => $request,
                                         'user' => $user]);
        //hier für die anderen Aufgaben wieder auf
        //return view('home', ['rd' => $request ]);
    }

}