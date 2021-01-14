<?php
require_once('../models/gericht.php');
require_once('../models/kategorie.php');

class BewertungController
{
    public function index(RequestData $rd){
        $data = db_gericht_all_names();
        return view('bewertung',['data'=>$data]);
    }

    public function bewertung_abgeben(RequestData $rd){

    }

    public function bewertung_gericht_ausgesucht(RequestData $rd){
        $gericht_bild = $_POST['gericht_bild'] ;
        $data = db_gericht_all_names();
        return view('bewertung',['data'=>$data]);
        echo "gericht_bild";
    }

    public function gerichte_anzeigen(RequestData $rd){
        $data = db_gericht_all_names();
        return view('bewertung',['data'=>$data]);
    }
}