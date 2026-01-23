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
                <h1></h1>
                <label for="menu_tendina">Tipo</label>
                <br>
                <select id="menu_tendina">
                    <option class="menu" value="Impiegato">Atleta</option>
                    <option class="menu" value="Libero Professionista">Frequentatore</option>
                    <option class="menu" value="Imprenditore">Onorari</option>
                </select>
                <br>
                <label for="casellaNome">Visista medica / NCorsi / Ruolo</label>
                <br>
                <input type="text" id="casellaNome" name="casellaNome">
                <br>
                <label for="casellaData">Data di Nascita</label>
                <br>
                <input type="date" id="casellaData" name="casellaData">
                <br>
                <label for="casellaIndirizzo">Tipo</label>
                <br>
                <input type="text" id="casellaIndirizzo" name="casellaIndirizzo">
                <br>
                <br>
                <br>
                <input type="button" id="btn1" name="btn1" value="INVIA">
            </form>
        </div>
</body>
</html>