<?php
require_once('../models/gericht.php');


/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request)
    {
        //Aufgabe 3 Log file
        logger('Zugriff')->info('Zugriff auf Hauptseite von',['unbekannt']);
        $login_status = $_SESSION['login_ok'] ?? false;
        $user = $_SESSION['username'] ?? 'nicht angemeldet';
        $gerichte = db_gericht_mit_allergenen();

        //Zähler für webseite
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        }


        $_SESSION['counter']++;
        // Zum testen: echo $_SESSION['counter'];
        return view('emensaWerbeseite', ['rd' => $request,
                                         'user' => $user,
                                         'login_status' => $login_status,
                                         'gerichte' => $gerichte]);
        //hier für die anderen Aufgaben wieder auf
        //return view('home', ['rd' => $request ]);


    }

}