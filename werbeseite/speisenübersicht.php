<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */
?>


<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet_werbeseite.css">
    <title>Speisen</title>
</head>
<body>
<div class="grid-container2" style="border: #40BEA9 solid">
    <div class="grid-item">
        <p><?php //1. Gericht
            $file = fopen('./speisenRindfleisch.txt', 'r');
            if (!$file){
                die('Öffnen fehlgeschlagen');
            }
            while (!feof($file)){
                $line = fgets($file,500);
                echo $line;
            }
            fclose($file);
            ?></p>
        <img class = "speisenbild" src="img/rindfleisch.jpg" width="240" height="150" style="border-radius: 1em"> <br>
        <a style="color: #40BEA9; text-decoration: none" href="../beispiele/meal.php" target="_blank" class ="speisenLink" id = "rindfleisch"> Anzeigen </a>
    </div>
        <div class="grid-item">
        <p><?php //2. Gericht
            $file = fopen('./speisenSpinatRisotto.txt', 'r');
            if (!$file){
                die('Öffnen fehlgeschlagen');
            }
            while (!feof($file)){
                $line = fgets($file,500);
                echo $line;
            }
            fclose($file);
            ?></p>
        <img class = "speisenbild" src="img/SpinatRisotto.jpg" width="240" height="150" style="border-radius: 1em"> <br>
        <a style="color: #40BEA9; text-decoration: none" href="../beispiele/meal.php" target="_blank" class ="speisenLink" > Anzeigen </a>
        </div>

        <div class="grid-item">
        <p><?php //3. Gericht
            $file = fopen('./speisenPizaaHawaii.txt', 'r');
            if (!$file){
                die('Öffnen fehlgeschlagen');
            }
            while (!feof($file)){
                $line = fgets($file,500);
                echo $line;
            }
            fclose($file);
            ?></p>
        <img class = "speisenbild" src="img/pizzaHawaii.jpg" width="240" height="150" style="border-radius: 1em"> <br>
        <a style="color: #40BEA9; text-decoration: none" href="../beispiele/meal.php" target="_blank" class ="speisenLink" > Anzeigen </a>
        </div>
        <div class="grid-item">
        <p><?php //4. Gericht
            $file = fopen('./spaghettiCarbonara.txt', 'r');
            if (!$file){
                die('Öffnen fehlgeschlagen');
            }
            while (!feof($file)){
                $line = fgets($file,500);
                echo $line;
            }
            fclose($file);
            ?></p>
        <img class = "speisenbild" src="img/spaghetti-carbonara.jpg" width="240" height="150" style="border-radius: 1em"> <br>
        <a style="color: #40BEA9; text-decoration: none" href="../beispiele/meal.php" target="_blank" class ="speisenLink" > Anzeigen </a>
        </div>

</div>
</body>
</html>



