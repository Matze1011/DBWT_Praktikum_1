<?php
function vorbereitung()
{


    $link = mysqli_connect("localhost", "root", "Matze0021", "emensawerbeseite");
 //   $link = connectdb();
    if (!$link) {
        echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
        exit();
    }


    $Gerichte = mysqli_fetch_all(mysqli_query($link,
        "SELECT gericht.name,gericht.bildname,gericht.preis_intern, gericht.preis_extern,gericht.id, group_concat(allergen.code)
                        FROM gericht
                        LEFT JOIN gericht_hat_allergen ON gericht.id=gericht_hat_allergen.gericht_id
                        LEFT JOIN allergen ON allergen.code=gericht_hat_allergen.code
                        GROUP BY gericht.name
                        ORDER BY gericht.name ASC LIMIT 5;
                            "), MYSQLI_ASSOC);

    mysqli_close($link);
    return $Gerichte;
}
