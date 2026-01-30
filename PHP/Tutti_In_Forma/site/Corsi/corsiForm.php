<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Corsi</title>
</head>
<body>
<div id = "information">
            <form action="corsi.php" method="post">
                <h1>Corsi</h1>
                <label for="casellaDescrizione">Descrizone</label>
                <br>
                <input type="text" id="casellaDescrizione" name="casellaDescrizione">
                <br>
                <label for="casellaCosto">Costo</label>
                <br>
                <input type="number" id="casellaCosto" name="casellaCosto">
                <br>
                <label for="casellaData">Giorno</label>
                <br>
                <input type="date" id="casellaData" name="casellaData">
                <br>
                <label for="casellaImpianto">Impianto</label>
                <br>
                <input type="text" id="casellaImpianto" name="casellaImpianto">
                <br>
                <label for="casellaOra">Ora</label>
                <br>
                <input type="text" id="casellaOra" name="casellaOra">
                <br>
                <label for="casellaResponsabile">Responsabile</label>
                <br>
                <input type="text" name="casellaResponsabile" id="casellaResponsabile">
                <br>
                <br>
                <input type="button" id="btn1" name="btn1" value="INVIA">
            </form>
        </div>
</body>
</html>