<?php
require_once('../models/gericht.php');
require_once('../models/kategorie.php');
require_once('../models/bewertung.php');
require_once('../models/gericht_orm.php');
require_once('../models/bewertung_orm.php');
use \Illuminate\Database\Capsule\Manager as DB;

class BewertungController
{
    public function index()
    {
        $login_status = $_SESSION['login_ok'] ?? false;
        if ($login_status==false)
        {
            header('Refresh: 0; URL=/login');
        }
        else
        {
            $dataFromDB = bew();

            if ($dataFromDB!=NULL)
            {
                //$i = (int) $_GET['gerichtid'];
                $nameVonGericht = new GerichtAR;
                // $name = $nameVonGericht->getNameAttribute($i);
                $name = $nameVonGericht->name;
                // var_dump($name);
                // var_dump($i);
                // $gericht = GerichtAR::find($i);
                //$nameVonGericht = $gericht->attributes['name'];
                //var_dump($nameVonGericht);
                return view('bewertung', ['dataFromDB'=>$dataFromDB,'name'=>$name]);
            }
            else
            {
                $_SESSION['gericht_error'] = "The Gericht you are trying to access is not on our menu";
                header('Refresh: 0; URL=/');
            }

        }
    }

    public function store()
    {
        $userID = $_SESSION['User']['id'];
        $gerichtid = $_POST["gerichtID"];
        $text = $_POST["bemerkung"];
        $stars = $_POST["bewertung"];


        $neues_rev = new BewertungAR();
        $neues_rev->userID = $userID;
        $neues_rev->gericht_id = $gerichtid;
        $neues_rev->bemerkung = $text;
        $neues_rev->sternebewertung = $stars;
        //$neues_rev->bewertungszeitpunkt = CURRENT_TIMESTAMP();
        $neues_rev->save();

       // $data = bew_senden();
        $_SESSION['review_success'] = "Bewertung gesendet!";
        header('Refresh: 0; URL=/');

    }
    public function bew_zeigen()
    {
        $data = bew_zeigen();
        return view('bewertungen', ['data'=>$data]);
    }
    public function meine_bew()
    {
        $data = meine_bew_models();
        return view('meinebewertungen', ['data'=>$data]);
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