<?php
//Benutzereingaben speichern
$benutzer_eingabe = $_POST['password'];

//salt
$salt = "dbwt";


//Passwort Hash generieren
$gehashtesPassword = crypt('password',$salt); //eingegebenes Passwort und ein selbst gewählter Salt
if(crypt($benutzer_eingabe,$gehashtesPassword)==$gehashtesPassword){
    echo "Passwort stimmt überein";
}

//Passwort für admin Benutzer erstellen und in Datenbank speichern
$passwortAdmin = "admin";
$hash_passwordAdmin = crypt($passwortAdmin,$salt);
echo $hash_passwordAdmin; //um es in der Datenbank zu speichern
