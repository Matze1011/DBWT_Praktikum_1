<?php
require_once('../models/kategorie.php');
require_once ('../models/gericht.php');

class ExampleController
{
    public function m4_6a_queryparameter(RequestData $rd) {
        // ...

        return view('examples.m4_6a_queryparameter',[
            'name' => '<name>', //Oder hier etwas eingeben lassen?
        ]);
    }

    public function m4_6b_kategorie(){
        $data = db_kategorie_select_all();
        return view('examples.m4_6b_kategorie',['data'=>$data]);
    }

    public function m4_6c_gerichte(RequestData $rd){

    }

    public function mm4_6d_layout(RequestData $rd){

    }


}