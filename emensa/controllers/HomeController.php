<?php
require_once('../models/gericht.php');


/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request)
    {
        //Aufgabe 3 Log file
        logger('Zugriff')->info('Zugriff auf Hauptseite von', ['unbekannt']);
        $login_status = $_SESSION['login_ok'] ?? false;
        $user = $_SESSION['username'] ?? 'nicht angemeldet';
        $gerichte = db_gericht_mit_allergenen();

        //Zähler für webseite
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        }

        include("../public/inlcudes/counter.php");


        $_SESSION['counter']++;
        // Zum testen: echo $_SESSION['counter'];
        return view('emensaWerbeseite', ['rd' => $request,
            'user' => $user,
            'login_status' => $login_status,
            'gerichte' => $gerichte]);
        //hier für die anderen Aufgaben wieder auf
        //return view('home', ['rd' => $request ]);


    }

    public function wunschgericht(RequestData $rd)
    {
        return view('wunschgericht', []);
    }

    public function wunschgericht_formdata()
    {
        $servername = "localhost";
        $username = "root";
        $password = "Matze0021";
        $dbname = "emensawerbeseite";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['senden_button'])) {
            $gerichtname = $_POST['gerichtname'];
            $beschreibung = $_POST['beschreibung'];
            $erstellername = $_POST['erstellername'];
            $email = $_POST['email'];

            htmlspecialchars($gerichtname, ENT_QUOTES, 'UTF-8'); //XSS - wandelt Sonderzeichen in eine html Schreibweise um (aus " wird &quot; und sowas)
            htmlspecialchars($beschreibung, ENT_QUOTES, 'UTF-8'); //Verhindert das Einschleusen von eigenen HTML Code
            htmlspecialchars($erstellername, ENT_QUOTES, 'UTF-8');
            htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            $gerichtname = str_replace('\'', "", $gerichtname);
            $beschreibung = str_replace('\'', "", $beschreibung);
            $erstellername = str_replace('\'', "", $erstellername);
            $email = str_replace('\'', "", $email); // Unnötig! Da ja schon in real_escape_string drin

            $gerichtname = mysqli_real_escape_string($conn, $gerichtname);
            $beschreibung = mysqli_real_escape_string($conn, $beschreibung);
            $erstellername = mysqli_real_escape_string($conn, $erstellername);
            $email = mysqli_real_escape_string($conn, $email); //. Diese Anweisung sorgt dafür das spezielle Zeichen masikiert werden. Dadurch werden Sachen wie ‘or 1=1; verhindert.

            $sql = "INSERT INTO wunschgericht (name, beschreibung, erstellungsdatum, erstellername, email)
     VALUES ('$gerichtname','$beschreibung', current_date, '$erstellername', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Daten gespeichert")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        return view('wunschgericht', []);

    }

    public function newsletter(){

$name = $_POST['benutzer'];
$email = $_POST['mail'];
$sprache = $_POST['sprache'];

htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); //XSS - wandelt Sonderzeichen in eine html Schreibweise um (aus " wird &quot; und sowas)
htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); //Verhindert das Einschleusen von eigenen HTML Code
htmlspecialchars($sprache, ENT_QUOTES, 'UTF-8');


function isvalidemail($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function username($name)
{
    if (ctype_alnum($name))
        return true;

    else return false;
}

function trashmail($email)
{
    $ListeBlockierterMails = array('rcpt.at', 'damnthespam.at', 'wegwerfmail.de', 'trashmail.de', 'trashmail.com');

    //exploden um leichter nach String suchen zu können
    foreach ($ListeBlockierterMails as $blockiert) {
        list(, $domain) = explode('@', $email);
        if (strcasecmp($domain, $blockiert) == 0) {
            return true;
        }
    }
    return false;
}
$checkmail = isvalidemail($email);
$checkname = username($name);
$trashmail = trashmail($email);




            if($email != null && $name != null)
            {
                if($trashmail == true && $checkname == true)
                    echo'<script>alert("Dieser E-Mail Provider wird nicht akzeptiert.")</script>';
                else if($trashmail == false && $checkname == false)
                    echo'<script>alert("Ungültiger Name.")</script>';

                // Wenn kein Fehler, dann Daten verarbeiten!:
                else
                { if ($checkmail == true && $checkname == true)
                {

                    echo'<script>alert("Daten gespeichert")</script>';
                    $anmeldung = fopen('../storage/daten/newsletterDaten.txt', "a");

                    fwrite($anmeldung, "Name:"."$name"." "."E-Mail:"."$email"." "."Sprache:"."$sprache"." "."\n");
                    fclose($anmeldung);
                    include("../public/inlcudes/newsletterZähler.php"); //Newsletter Zähler ums eins inkrementieren

                }

                else if($checkmail == false && checkname == true)
                    echo'<script>alert("Diese E-Mail existiert nicht")</script>';

                else if($checkmail == true  && $checkname == false)
                    echo'<script>alert("Ungültiger Name")</script>';

                else
                    echo'<script>alert("Ungütliger Name. Diese E-Mail exisiert nicht")</script>';

                }

            }
             $login_status = $_SESSION['login_ok'] ?? false;
             $user = $_SESSION['username'] ?? 'nicht angemeldet';
             $gerichte = db_gericht_mit_allergenen();

             return view('emensaWerbeseite', [
                'user' => $user,
                'login_status' => $login_status,
                'gerichte' => $gerichte]);

    }
}







