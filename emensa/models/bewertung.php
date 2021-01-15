<?php
require_once('../config/db.php');
require_once('../models/index.php');
require_once('../models/GerichtAR.php');
require_once('../models/BewertungAR.php');
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
    $text = htmlspecialchars($_POST["textarea"]);
    //$stars = $_POST["stars"];
    $stars = $_POST["bewertung"];

   // var_dump($user_id);
   // var_dump($gerichtid);
   // var_dump($text);
   // var_dump($stars);

   // $user_id = $_SESSION['User']['id'];
    //$gerichtid = $_POST["gerichtID"];
   // $text = $_POST["textarea"];
    //$bew = $_POST["bewertung"];
    //var_dump($bew);

    //var_dump($stars);

    $link = connectdb();
    $query = "INSERT INTO reviews (user_id, dish_id,review_text,review_rating) VALUES ('$user_id','$gerichtid','$text','$stars')";

    if (mysqli_query($link, $query)) {
      //  echo "New record created successfully REVIEW";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);


}

/*$user_id = $_SESSION['User']['id'];
$gerichtid = $_POST["gerichtID"];
$text = $_POST["textarea"];
$start = $_POST["stars"];

$link = connectdb();
$query = "INSERT INTO reviews (`user_id`, `dish_id`,`review_text`,`review_rating`) VALUES (,,,)";

if (mysqli_query($link, $query)) {
    echo "New record created successfully REVIEW";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}

mysqli_close($link);*/

function bew_zeigen()
{
    $link = connectdb();
    $query = "SELECT * FROM reviews ORDER BY date DESC LIMIT 30;";
    $result = mysqli_query($link, $query);
    $review_data = mysqli_fetch_all($result,MYSQLI_ASSOC);


    return $review_data;
}
function meine_bew_models()
{
    $link = connectdb();
    $usersID = $_SESSION['User']['id'];
    $query = "SELECT * FROM reviews WHERE user_id = ". $usersID ." ORDER BY date DESC LIMIT 30;";
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



    $query = "SELECT * FROM reviews WHERE id = '$reviewID' ";
    $result = mysqli_query($link, $query);

    $review_data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //var_dump($review_data[0]["id"]);
   // var_dump($reviewID);
   // var_dump($usersID);
    if ($usersID === $review_data[0]["user_id"])
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
    //var_dump($admin['admin']);
    if ($admin['admin'] === "1")
    {
        $makierenAr = new BewertungAR;
        $m = $makierenAr::find($reviewID);
        //$makierenAr = $makierenAr->hervorheben($reviewID);
        $m->is_pinned = 0;
        $m->save();

        //$query = "UPDATE reviews SET is_pinned = 0 WHERE id = '$reviewID' ";
       // $result = mysqli_query($link, $query);
        $flag = true;
    }else{
        $flag = false;
    }
    return $flag;

}