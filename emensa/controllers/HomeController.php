<?php
require_once('../models/gericht.php');


/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request)
    {
        session_start();
        //Zähler für webseite
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        }
        $_SESSION['counter']++;
        echo $_SESSION['counter'];

        return view('emensaWerbeseite', ['rd' => $request]);
        //hier für die anderen Aufgaben wieder auf
        //return view('home', ['rd' => $request ]);
    }

}