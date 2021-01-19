<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" charset="UTF-8">
    {{--Für Styling --}}
    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <link rel="stylesheet" href="./css/stylesheet_bewertung.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    {{-- Für die mobile Ansicht --}}

    <title>Bewertung unserer Gerichte</title>
</head>
<body>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        <div><img id= "logo-mensa" src="./img/MenaBild.jpg" width="600"  alt="Mensa-Logo"></div>
        <div><h2 id="login_begrüßung"> Bitte bewerten Sie das Gericht:</h2></div>
        <p id = "gericht_titel"><b>{{$dataFromDB['name']}}</b></p>

        <br>

        @if($dataFromDB["bildname"]!=NULL)
            <td> <img  alt="No image" width="150" height="150" src="/img/gerichte/{{$dataFromDB["bildname"]}}"></td>
        @else
            <td> <img  alt="No image" width="300" height="150" src="/img/gerichte/00_image_missing.jpg"></td>
        @endif


                <form action="bewertung_senden" method="POST">
                    <input type="hidden" name="gerichtID" id="gerichtID" value="{{$dataFromDB["id"]}}">
                    <div id="content1" class=".vert">Bewerten Sie das Produkt: </div>
                    <div onmouseleave="starsOut()" class="d-inline"><span class="sternebewertung">
                          <label  for="stern1" title="1"><i onmouseover="stars(this)" id="stern1stern" class="fas fa-star fa-lg mr-n1 "></i></label>
                            <input type="radio" id="stern1" name="bewertung" value="1" checked required>
                          <label  for="stern2" title="2"><i onmouseover="stars(this)" id="stern2stern" class="far fa-star fa-lg mr-n1"></i></label>
                            <input type="radio" id="stern2" name="bewertung" value="2">
                          <label  for="stern3" title="3"><i onmouseover="stars(this)" id="stern3stern" class="far fa-star fa-lg mr-n1"></i></label>
                            <input type="radio" id="stern3" name="bewertung" value="3">
                          <label  for="stern4" title="4"><i onmouseover="stars(this)" id="stern4stern" class="far fa-star fa-lg mr-n1"></i></label>
                            <input type="radio" id="stern4" name="bewertung" value="4">
                        </span>
                        <br>
                        <br>
                        <div class ="flex-container">
                            <div class="links"></div>
                            <label class ="bewertung_label" for ="bemerkung"></label>
                                <div id ="bemerkungsfeld"><textarea id="bemerkung" name="bemerkung" cols = "47" rows ="5"  required placeholder="Bitte Bemerkung eingeben"></textarea></div>
                                <div id ="abschicken_rechts"><input type = "submit" id = "submit-button_bewertung" name = "submit" value="Abschicken"></div>
                        </div>
                    </div>
                </form>


                <script>
                    function stars(arg){
                        let over=false;
                        for(let i=1; i<=4;i++){
                            if(!over){
                                document.getElementById('stern'+i+'stern').className="fas fa-star fa-lg mr-n1";
                            }
                            else{
                                document.getElementById('stern'+i+'stern').className="far fa-star fa-lg mr-n1";
                            }
                            if(document.getElementById('stern'+i+'stern')==arg){
                                over=true;
                            }
                        }
                    }
                    function starsOut(){
                        let over=false;
                        for(let i=1; i<=4;i++){
                            if(!over){
                                document.getElementById('stern'+i+'stern').className="fas fa-star fa-lg mr-n1 star-color";
                            }
                            else{
                                document.getElementById('stern'+i+'stern').className="far fa-star fa-lg mr-n1 star-color";
                            }
                            if(document.getElementById('stern'+i).checked){
                                over=true;
                            }
                        }
                    }
                </script>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                        crossorigin="anonymous"></script>

                <script
                        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
                        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
                        crossorigin="anonymous">
                </script>



    </div>
    <div class="rechts">
    </div>
</div>
</body>
</html>