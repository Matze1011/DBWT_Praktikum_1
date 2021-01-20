<?php
use \Illuminate\Database\Capsule\Manager as DB;

class BewertungAR extends Illuminate\Database\Eloquent\Model
{
    public $table = "bewertung";
    public $primarykey = "id";
    public $timestamps = true;
    public $incrementing = true;

    function haha($idVonReview)
    {
        $revToDelete = BewertungAR::find($idVonReview);
        return $revToDelete;
    }

    function hervorheben($id)
    {
        //var_dump($id);
        $user = BewertungAR::find($id);

        return $user;
    }

    function getBemerkungAttribute()
    {
        return $bemerkung = $this->attributes['bemerkung'];
    }

    function getSternebwertungAttribute()
    {
        return $sternebewertung = $this->attributes['sternebwertung'];
    }

    function getCreated_atAttribute()
    {
        return $created_at = $this->attributes['created_at'];
    }

    function getUserIDAttribute()
    {
        return $userID = $this->attributes['userID'];
    }
}