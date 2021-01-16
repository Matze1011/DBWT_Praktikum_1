<?php
class BewertungAR extends Illuminate\Database\Eloquent\Model{
    public $table = "bewertung";
    public $primarykey = "id";
    public $timestamps = false;
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

}