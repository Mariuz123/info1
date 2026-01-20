<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div id = "information">
            <form action="">
                <h1>LOGIN</h1>
                <label for="casellaNome">Nome</label>
                <br>
                <input type="text" id="casellaNome" name="casellaNome">
                <br>
                <label for="casellaCognome">Cognome</label>
                <br>
                <input type="text" id="casellaCognome" name="casellaCognome">
                <br>
                <label for="casellaData">Data di Nascita</label>
                <br>
                <input type="date" id="casellaData" name="casellaData">
                <br>
                <label for="casellaIndirizzo">Indirizzo</label>
                <br>
                <input type="text" id="casellaIndirizzo" name="casellaIndirizzo">
                <br>
                <label for="casellaUser">Mail</label>
                <br>
                <input type="text" id="casellaUser" name="casellaUser">
                <br>
                <label for="pws1">Password</label>
                <br>
                <input type="password" name="pws1" id="pws1">
                <br>
                <label for="menu_tendina">Professione</label>
                <br>
                <select id="menu_tendina">
                    <option class="menu" value="Impiegato">Impiegato</option>
                    <option class="menu" value="Libero Professionista">Libero Professionista</option>
                    <option class="menu" value="Imprenditore">Imprenditore</option>
                    <option class="menu" value="Schiavo">Schiavo</option>
                    <option class="menu" value="Sottopagato">Sottopagato</option>
                </select>
                <br>
                <br>
                <input type="button" id="btn1" name="btn1" value="INVIA">
            </form>
        </div>
</body>
</html>