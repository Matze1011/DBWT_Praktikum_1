<?php

use \Illuminate\Database\Capsule\Manager as DB;

class GerichtAR extends Illuminate\Database\Eloquent\Model{
    public $table = "gericht";
    public $primarykey = "id";
    public $timestamps = false;
    public $incrementing = true;


    function getPreisAttribute(){
        $preisIntern = $this->attributes['preis_intern'];
        $preisExtern = $this->attributes['preis_extern'];
        return $this->attributes['name'] . " " . number_format((float)$preisIntern, 2, '.', '') .
            "€ " . number_format((float)$preisExtern, 2, '.', '') . "€";
    }

    function setVeganAttribute($value){
        $value = str_replace(' ', '', $value);
        $value = strtolower($value);
        if($value == yes)
            $this->attributes['vegan'] = true;
        else if($value == no)
            $this->attributes['vegan'] = false;
    }

    function setVegetarischAttribute($value){
        $value = str_replace(' ', '', $value);
        $value = strtolower($value);
        if($value == yes)
            $this->attributes['vegetarisch'] = true;
        else if($value == no)
            $this->attributes['vegetarisch'] = false;
    }
}