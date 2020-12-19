<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */
//Verbindung zur Datenbank aufbauen

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

if(isset($_POST['senden_button']))
{
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
        echo'<script>alert("Daten gespeichert")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<script type="text/javascript">
    window.location = "werbeseite.php";
</script>
