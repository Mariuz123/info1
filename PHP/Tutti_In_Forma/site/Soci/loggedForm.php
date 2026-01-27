<?php 

    session_start();
    if(!isset($_SESSION['idLogin'])){
        header('Location: login.php')
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOGGED</title>
</head>
<body>
<div id = "information">
            <form action="logged.php" method="post">
                <h1>Login</h1>
                <label for="menu_tendina">Tipo</label>
                <br>
                <select id="menu_tendina">
                    <option class="menu" value="Atleta">Atleta</option>
                    <option class="menu" value="Frequentatore">Frequentatore</option>
                    <option class="menu" value="Onorari">Onorari</option>
                </select>
                <script>
                    let choice = document.getElemnetById('menu_tendina');

                    if(choice.value == "Atleta"){
                        document.getElementById('casellaCorsi').style.display = "none";
                        document.getElementById('casellaRuolo').style.display = "none";
                    }else if(choice.value == "Frequentatore"){
                        document.getElementById('casellaVisita').style.display = "none";
                        document.getElementById('casellaRuolo').style.display = "none";
                        document.getElementById('casellaData').style.display = "none";
                        document.getElementById('casellaSquadre').style.display = "none";
                    }else if(choice.value == "Onorari"){
                        document.getElementById('casellaVisita').style.display = "none";
                        document.getElementById('casellaCorsi').style.display = "none";
                        document.getElementById('casellaData').style.display = "none";
                        document.getElementById('casellaSquadre').style.display = "none";
                    }

                </script>
                <br>
                <label for="casellaVisita">Visista medica</label>
                <br>
                <input type="text" id="casellaVisita" name="casellaVisita">
                <br>
                <label for="casellaCorsi">NCorsi</label>
                <br>
                <input type="text" id="casellaCorsi" name="casellaCorsi">
                <br>
                <label for="casellaRuolo">Ruolo</label>
                <br>
                <input type="text" id="casellaRuolo" name="casellaRuolo">
                <br>
                <label for="casellaData">Data</label>
                <br>
                <input type="date" id="casellaData" name="casellaData">
                <br>
                <label for="casellaSquadre">Squadre</label>
                <br>
                <input type="text" id="casellaSquadre" name="casellaSquadre">
                <br>
                <br>
                <br>
                <input type="button" id="btn1" name="btn1" value="INVIA">
            </form>
        </div>
</body>
</html>