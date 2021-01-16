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
        " select g.*,
                            group_concat(a.code separator ', ') as codes,
                            group_concat(a.name separator ', ') as Allergene
                            FROM gericht g
                            left join gericht_hat_allergen ha
                            ON ha.gericht_id = g.id
                            left join allergen a
                            ON ha.code = a.code
                            GROUP BY g.id
                            ORDER BY g.id ASC LIMIT 5;
                            "), MYSQLI_ASSOC);

    mysqli_close($link);
    return $Gerichte;
}
