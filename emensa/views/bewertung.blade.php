<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    {{--Für Styling --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <link rel="stylesheet" href="./css/stylesheet_bewertung.css">
    {{-- Für die mobile Ansicht --}}
    <meta content="width=device-width, initial-scale=1" name="viewport" charset="utf-8" />
    <title>Bewertungen Formular</title>
    <title>Bewertung unserer Gerichte</title>
</head>
<body>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        <img id= "logo-mensa" src="./img/MenaBild.jpg" width="600"  alt="Mensa-Logo">
        <br>
        <h2 id="login_begrüßung"> Bitte bewerten Sie das Gericht:</h2>
        <b>{{$name}}</b>

        <br><br>

        @if($dataFromDB["bildname"]!=NULL)
            <td> <img  alt="No image" width="150" height="150" src="/img/gerichte/{{$dataFromDB["bildname"]}}"></td>
        @else
            <td> <img  alt="No image" width="300" height="150" src="/img/gerichte/00_image_missing.jpg"></td>
        @endif

       {{-- <form action="/bewertung_gericht_ausgesucht" method="post" id = "bewertung_formular">
            <label for = "gericht">Gericht auswählen</label>
            <select class="gericht_select" name="gericht_id" id="gericht_id">
                <option value="not selected" selected>Bitte auswählen</option>
                @foreach($data as $a)
                    <option value={{$a['id']}} >{{$a['name']}} </option>
                    @if(isset($_POST['gericht_id']))
                        <option value={{$a['gericht_id']}}>{{$a['name']}}</option>
                    @endif
                    @endforeach
            </select>
            <input id="submit" type="submit" name="submit" value="auswählen">
            <br>
            <br>
        </form>
--}}

                <form action="bewertung_senden" method="POST">
                    <input type="hidden" name="gerichtID" id="gerichtID" value="{{$dataFromDB["id"]}}">
                    <div id="content1" class=".vert">Bewerten sie das Produkt: </div>
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
                            <fieldset id = "bemerkung_rahmen">
                            <label class ="bewertung_label" for ="bemerkung"></label>
                            <textarea id="bemerkung" name="bemerkung" cols = "47" rows ="5"  required placeholder="Bitte Bemerkung eingeben"></textarea>
                            <input type = "submit" id = "submit-button_bewertung" name = "submit" value="Abschicken">
                            </fieldset>
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