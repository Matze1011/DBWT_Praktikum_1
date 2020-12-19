<?php
require_once('../models/gericht.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        //return view('emensaWerbeseite', ['rd' => $request ]);
        //hier für die anderen Aufgaben wieder auf
        return view('home', ['rd' => $request ]);
    }

}