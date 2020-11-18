<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_PARAM_SHOW_DESCRIPTION = 'show_description';

/**
 * Liste aller möglichen Allergene.
 */
$allergens = array(
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch')
;

$englisch = array(
        "gericht" => 'Meal:',
        "allergene" => 'Allgergens in this meal: ',
        "bewertungenIngesamt" => 'Rating (Total: ',
        "suchen" => 'search',
        "beschreibung"=>'show description'
);
$deutsch = array(
        "gericht"=>'Gericht: ',
        "allgerne"=>'Folgende Allergene sind enthalten: ',
        "bewertungenInsgesamt"=>'Bewertungen (Ingesamt: ',
        "suchen"=>'suchen',
        "beschreibung"=> 'Beschreibung anzeigen'
);

$meal = [ // Kurzschreibweise für ein Array (entspricht = array())
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => '2.90€',
    'price_extern' => '3.90€',
    'allergens' => [11, 13],
    'amount' => 42   // Anzahl der verfügbaren Gerichte.
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];

$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (strripos($rating['text'], $searchTerm) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}

function calcMeanStars($ratings) : float { // : float gibt an, dass der Rückgabewert vom Typ "float" ist
    $sum = 0;
    $i = 1;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] ; // /i muss weg, sonst teilen wir 2 mal durch die Anzahl an Bewertungen, i kann eigentlich weg
        $i++;
    }
    return $sum / count($ratings);
}
function showDescription($meal){
    if(isset($_GET['show_description'])&& $_GET[GET_PARAM_SHOW_DESCRIPTION]==1){
        echo $meal['description'];}
    else{
        echo'';
    }
}
function changeLanguage($deutsch, $englisch)
{
    //hier muss ich jetzt str_ireplace("find","replace","stringzuvergleichen")
    str_ireplace($deutsch['gericht'], $englisch['gericht'],"Gericht:");
    //Ich muss die deutschen Wörter in Array schreiben und dann im html text via dem array ausgeben:
    echo'test';
}



?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Gericht: <?php echo $meal['name']; ?></title>
        <style type="text/css">
            * {
                font-family: Arial, serif;
            }
            .rating {
                color: darkgray;
            }
        </style>
    </head>
    <body>
    <p>Sprache ändern: <form method="get"><input type="submit" name="Englisch" value="english");">
    <form method="get"> <input type="submit" name="Deutsch" value="deutsch");"> </form> </p>

        <h1><?php if(!empty($_GET['Deutsch'])){
            echo $deutsch['gericht'];
            }
            else if(!empty($_GET['Englisch'])){
                echo $englisch['gericht'];
            }
            else echo$deutsch['gericht'];?>
        <?php echo $meal['name'] ; ?></h1>
        <p>Preis intern: <?php echo $meal['price_intern']?> / Preis extern: <?php echo$meal['price_extern']?></p>

        <!--Description anzeigen und verstecken:-->
        <form method="post"> <input type="checkbox"  name="show_description" value = "anzeigen">
            <input type = "submit" value="<?php if(!empty($_GET['Deutsch'])){
                echo $deutsch['beschreibung'];
            }
            else if(!empty($_GET['Englisch'])){
                echo $englisch['beschreibung'];
            }
            else echo$deutsch['beschreibung'];?>"> </form>

            <p><?php if(empty($_POST[GET_PARAM_SHOW_DESCRIPTION])){
                 echo'';}
                else{
                    echo $meal['description'];
                    } ?></p>
        <p><b><?php if(!empty($_GET['Deutsch'])){
                    echo $deutsch['allgerne'];
                }
                else if(!empty($_GET['Englisch'])){
                    echo $englisch['allergene'];
                }
                else echo$deutsch['allgerne'];?> </b> <br>

    <ul> <?php //Hier werden die Allergene ausgegeben
        foreach($meal['allergens'] as $allergen)
            echo "<li>{$allergens[$allergen]} </li>";
        ?>
    </ul>
        <!-- Hier kommen die Bewertungen -->
        <h1><?php if(!empty($_GET['Deutsch'])){
                echo $deutsch['bewertungenInsgesamt'];
            }
            else if(!empty($_GET['Englisch'])){
                echo $englisch['bewertungenIngesamt'];
            }
            else echo$deutsch['bewertungenInsgesamt'];?><?php echo calcMeanStars($ratings); ?>)</h1>

<!-- Hier ist die Suche implementiert, -->
        <form method="get" onsubmit="return false" >
            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text" >
            <input type="submit" value="<?php if(!empty($_GET['Deutsch'])){
                echo $deutsch['suchen'];
            }
            else if(!empty($_GET['Englisch'])){
                echo $englisch['suchen'];
            }
            else echo$deutsch['suchen'];?>">
        </form>
        <table class="rating">
            <thead>
            <tr>
                <td>Autor</td>
                <td>Text</td>
                <td>Sterne</td>
            </tr>
            </thead>
            <tbody>
            <?php
        foreach ($showRatings as $rating) {
            echo "<tr><td class='rating_author'>{$rating['author']}</td>
                      <td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                  </tr>";
        }
        ?>
            </tbody>
        </table>
    </body>
</html>