<?php
require_once('../config/db.php');
require_once('../models/index.php');
require_once('../models/gericht_orm.php');
require_once('../models/bewertung_orm.php');

function bew()
{
    $link = connectdb();
    $Gerichte = vorbereitung();
    $user_data = NULL;
    $idURL = $_GET['gerichtid'];
    $idValidURL = 0;

    foreach ($Gerichte as $Gericht)
    {
        if ($Gericht["id"] == $idURL)
        {
            $idValidURL = $idURL;
        }
    }

    if ($idValidURL != 0)
    {
        $query = "SELECT * FROM gericht WHERE id = '$idValidURL'";
        $result = mysqli_query($link, $query);
        $user_data = mysqli_fetch_assoc($result);
    }

    return $user_data;
}

function bew_senden()
{

    $user_id = $_SESSION['User']['id'];
    $gerichtid = $_POST["gerichtID"];
    $text = htmlspecialchars($_POST["bemerkung"]);
    $stars = $_POST["bewertung"];


    $link = connectdb();
    $query = "INSERT INTO bewertung (userID, gericht_id,bemerkung,sternebewertung) VALUES ('$user_id','$gerichtid','$text','$stars')";

    if (mysqli_query($link, $query)) {

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);


}


function bew_zeigen()
{
    $link = connectdb();
    $query = "SELECT * FROM bewertung ORDER BY id DESC LIMIT 30;";
    $result = mysqli_query($link, $query);
    $review_data = mysqli_fetch_all($result,MYSQLI_ASSOC);


    return $review_data;
}
function meine_bew_models()
{
    $link = connectdb();
    $usersID = $_SESSION['User']['id'];
    $query = "SELECT * FROM bewertung WHERE userID = ". $usersID ." ORDER BY id DESC LIMIT 30;";
    $result = mysqli_query($link, $query);
    $review_data = mysqli_fetch_all($result,MYSQLI_ASSOC);


    return $review_data;
}

function loeschen()
{
    $link = connectdb();
    $h = false;
    $usersID = $_SESSION['User']['id'];
    $reviewID = $_POST["review_id"];

    $reviewIDint = (int) $_POST["review_id"];



    $query = "SELECT * FROM bewertung WHERE id = '$reviewID' ";
    $result = mysqli_query($link, $query);

    $review_data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if ($usersID === $review_data[0]["userID"])
    {

        //loeschen
        //$query = "DELETE FROM reviews WHERE id = ". $review_data[0]["id"];
        //$result = mysqli_query($link, $query);
        $one = new BewertungAR;
        $two = $one->haha($reviewIDint);
        //var_dump($two);
        $two -> delete();


        $h = true;
    }else{
        //error message
        $h = false;
    }
    return $h;
}

function one()
{
    $link = connectdb();
    $usersID = $_SESSION['User']['id'];
    $reviewID = $_GET["id"];
    $flag = false;


    $query_benutzer = "SELECT admin FROM benutzer WHERE id = '$usersID'";
    $result0 = mysqli_query($link, $query_benutzer);
    $admin = mysqli_fetch_assoc($result0);
    //var_dump($admin['admin']);
    if ($admin['admin'] === "1")
    {
        $makierenAr = new BewertungAR;
        $makierenAr = $makierenAr->hervorheben($reviewID);
        $makierenAr->is_pinned = 1;
        $makierenAr->save();
       // $query = "UPDATE reviews SET is_pinned = 1 WHERE id = '$reviewID' ";
       // $result = mysqli_query($link, $query);
        $flag = true;
    }else{
        $flag = false;
    }
    return $flag;

}

function two()
{
    $link = connectdb();
    $usersID = $_SESSION['User']['id'];
    $reviewID = $_GET["id"];
    $flag = false;


    $query_benutzer = "SELECT admin FROM benutzer WHERE id = '$usersID'";
    $result0 = mysqli_query($link, $query_benutzer);
    $admin = mysqli_fetch_assoc($result0);
    if ($admin['admin'] === "1")
    {
        $makierenAr = new BewertungAR;
        $m = $makierenAr::find($reviewID);
        //$makierenAr = $makierenAr->hervorheben($reviewID);
        $m->is_pinned = 0;
        $m->save();

        //$query = "UPDATE bewertung SET is_pinned = 0 WHERE id = '$reviewID' ";
        //$result = mysqli_query($link, $query);
        $flag = true;
    }else{
        $flag = false;
    }
    return $flag;

}