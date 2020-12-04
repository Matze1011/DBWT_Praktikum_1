<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

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
?>

            <?php

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
                    $anmeldung = fopen("newsletterDaten.txt", "a");

                    fwrite($anmeldung, "Name:"."$name"." "."E-Mail:"."$email"." "."Sprache:"."$sprache"." "."\n");
                    fclose($anmeldung);
                    include("newsletterCounter.php"); //Newsletter Zähler ums eins inkrementieren

                }

                else if($checkmail == false && checkname == true)
                    echo'<script>alert("Diese E-Mail existiert nicht")</script>';

                else if($checkmail == true  && $checkname == false)
                    echo'<script>alert("Ungültiger Name")</script>';

                else
                    echo'<script>alert("Ungütliger Name. Diese E-Mail exisiert nicht")</script>';

                }

            }
            ?>
<script type="text/javascript">
    window.location = "werbeseite.php";
</script>

        </tr>
    </table>
</form>

