<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => [2019] // eigentlich mit is_array abfragen
]];

function jahreErmitteln($famousMeals)
{
    $jahre3 = array();
        foreach ($famousMeals as $key => $value1) {
            $jahre1 = implode (",", $value1['winner']);
            //$jahre2 = explode (",",$jahre1);
            $jahre3 = array_merge($jahre3,$value1['winner']);
        }
        for($i=2000; $i<2021; $i++){
        if(in_array($i,$jahre3)==false){
            echo $i.",";
        }
}
}
?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Array ausgeben</title>
</head>
<body>
<h3>Hier wird das Array wie gewünscht ausgegeben</h3>

<?php
    /**foreach ($famousMeals as $key => $value){
        echo $key, "  ", $value['name'], "<br> \n";
        foreach($famousMeals as $winner=>$value){
            echo $value['winner'][$key];}
        }
*/
    foreach ($famousMeals as $key =>$value1){
        echo $key.".".'&nbsp'.'&nbsp'.'&nbsp'. $value1['name'], "<br> \n";
            echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'. implode (",  ", $value1['winner']), "<br> \n";
    }
?>

<h4>In folgenden Jahren gab es keine Gewinner:</h4>
<?php echo jahreErmitteln($famousMeals); ?>
</body>
</html>
