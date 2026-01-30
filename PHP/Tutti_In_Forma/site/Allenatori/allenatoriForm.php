<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Allenatori</title>
</head>
<body>
<div id = "information">
            <form action="allenatori.php" method="post">
                <h1>ALlenatori</h1>
                <label for="casellaNome">Nome</label>
                <br>
                <input type="text" id="casellaNome" name="casellaNome">
                <br>
                <label for="casellaCognome">Cognome</label>
                <br>
                <input type="text" id="casellaCognome" name="casellaCognome">
                <br>
                <label for="casellaData">Data Tessera</label>
                <br>
                <input type="date" id="casellaData" name="casellaData">
                <br>
                <br>
                <input type="button" id="btn1" name="btn1" value="INVIA">
            </form>
        </div>
</body>
</html>