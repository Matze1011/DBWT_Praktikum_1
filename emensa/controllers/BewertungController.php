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
        $gericht_id = $_POST['id'];
        $data2 = db_gericht_ausgewähltes_gericht($gericht_id);
        $data = db_gericht_all_names();
        return view('bewertung',['data'=>$data,
                                 'data2'=>$data2]);

    }

    public function gerichte_anzeigen(RequestData $rd){
        $data = db_gericht_all_names();
        return view('bewertung',['data'=>$data]);
    }
}