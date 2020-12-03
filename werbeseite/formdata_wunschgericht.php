<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */
//Verbindung zur Datenbank aufbauen
$servername = "127.0.0.1";
$username = "root";
$password = "Matze0021";
$dbname = "emensawerbeseite";

$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
if(isset($_POST['senden_button']))
{
    $gerichtname = $_POST['gerichtname'];
    $beschreibung = $_POST['beschreibung'];
    $erstellername = $_POST['erstellername'];
    $email = $_POST['email'];

    //Aufgabe 2
    htmlspecialchars($gerichtname, ENT_QUOTES, 'UTF-8'); //XSS - wandelt Sonderzeichen in eine html Schreibweise um (aus " wird &quot; etc.)
    htmlspecialchars($beschreibung, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($erstellername, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

    $gerichtname = str_replace('\'', "", $gerichtname);
    $beschreibung = str_replace('\'', "", $beschreibung);
    $erstellername = str_replace('\'', "", $erstellername);
    $email = str_replace('\'', "", $email);

    $gerichtname = mysqli_real_escape_string($link, $gerichtname);
    $beschreibung = mysqli_real_escape_string($link, $beschreibung);
    $erstellername = mysqli_real_escape_string($link, $erstellername);
    $email = mysqli_real_escape_string($link, $email); //wandelt in einen string um, der dann in sql benutzt werden kann.
    //Aufgabe 2 Ende

    $sql = "INSERT INTO wunschgericht (Name, Beschreibung, Erstellungsdatum, Erstellername, EMail)
     VALUES ('$gerichtname','$beschreibung', current_date, '$erstellername', '$email')";

    if ($link->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $link->close();
}
?>

