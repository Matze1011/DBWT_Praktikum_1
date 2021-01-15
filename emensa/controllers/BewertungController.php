<?php
require_once('../models/gericht.php');
require_once('../models/kategorie.php');

class BewertungController
{
    public function index(RequestData $rd)
    {
        $login_status = $_SESSION['login_ok'] ?? false;

            $data = db_gericht_all_names();
            $dataFromDB = bew();

            //$i = (int) $_GET['gerichtid'];
            $nameVonGericht = new GerichtAR;
            // $name = $nameVonGericht->getNameAttribute($i);
            $name = $nameVonGericht->name;
            // var_dump($name);
            // var_dump($i);
            // $gericht = GerichtAR::find($i);
            //$nameVonGericht = $gericht->attributes['name'];
            //var_dump($nameVonGericht);
            return view('bewertung', ['data' => $data, 'dataFromDB' => $dataFromDB, 'name' => $name]);
    }

    public function bewertung_abgeben(RequestData $rd){

            $user = $_SESSION['username'];
            $gerichtid = $_POST["gerichtID"];
            $text = $_POST["textarea"];
            $stars = $_POST["bewertung"];


            $neues_rev = new BewertungAR();
            $neues_rev->user_id = $user;
            $neues_rev->dish_id = $gerichtid;
            $neues_rev->review_text = $text;
            $neues_rev->review_rating = $stars;
            $neues_rev->save();

            //$data = bew_senden();
            $_SESSION['review_success'] = "Review was posted!";
            header('Refresh: 0; URL=/');
    }

    public function bewertung_gericht_ausgesucht(RequestData $rd){
        $data = db_gericht_all_names();
        $gericht_id = $_POST['gericht_id'];
        $data2 = db_gericht_ausgewähltes_gericht($gericht_id);
        return view('bewertung',['data'=>$data,
                                 'data2'=>$data2]);

    }

    public function gerichte_anzeigen(RequestData $rd){
        $data = db_gericht_all_names();
        return view('bewertung',['data'=>$data]);
    }

    public function bew_zeigen()
    {
        $data = bew_zeigen();
        return view('werbeseite.bewertungen', ['data'=>$data]);
    }
    public function meine_bew()
    {
        $data = meine_bew_models();
        return view('werbeseite.meinebewertungen', ['data'=>$data]);
    }
    public function loschen_bew()
    {
        $flag =  loeschen();
        if ($flag)
        {
            //return view('werbeseite.meinebewertungen', ['data'=>$data]);
            $_SESSION['bew_loschen'] = "Bewertung erfolgreich gelöscht!";
            header('Refresh: 0; URL=/');
        }else{
            //return view('werbeseite.meinebewertungen', ['data'=>$data]);
            $_SESSION['bew_loschen_error'] = "Bewertung KONNTE NICHT gelöscht werden, please check if it is yours first!!!";
            header('Refresh: 0; URL=/');
        }
    }
    public function hervorheben()
    {
        $flag =  one();
        if ($flag)
        {
            $_SESSION['hervorheben'] = "HERVORHEBEN erfolgreich!";
            header('Location: http://localhost:9000/bewertungen');
        }else{
            $_SESSION['hervorheben_error'] = "YOU HAVE TO BE ADMIN TO DO THIS!!!";
            header('Location: http://localhost:9000/bewertungen');
        }

    }
    public function hervorhebung_abwaehlen()
    {
        $flag =  two();
        if ($flag)
        {
            $_SESSION['hervorhebung_abwaehlen'] = "HERVORHEBEN erfolgreich ABGEWÄHLT!";
            header('Refresh: 0; URL=/bewertungen');
        }else{
            $_SESSION['hervorheben_error'] = "YOU HAVE TO BE ADMIN TO DO THIS!!!";
            header('Refresh: 0; URL=/bewertungen');
        }

    }

}