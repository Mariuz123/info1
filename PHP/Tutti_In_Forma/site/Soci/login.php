<?php

    session_start();
    require_once('DbHandler.php');

    $nome = htmlspecialchars($_POST["casellaNome"]);
    $cognome = htmlspecialchars($_POST["casellaCognome"]);
    $data = htmlspecialchars($_POST["casellaData"]);
    $indirizzo = htmlspecialchars($_POST["casellaIndirizzo"]);
    $mail = htmlspecialchars($_POST["casellaUser"]);
    $pwd = htmlspecialchars($_POST["pws1"]);
    $professione = htmlspecialchars($_POST["menu_tendina"]);
    
    $sql = "SELECT NTessera FROM loginForm WHERE mail = :mail AND pwd = :pwd"
    $sth = DBHandler::getPDO()->prepare($sql);

    $sth->bindParam(':mail', $mail, PDO::PARAM_STR);
    $sth->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $sth->execute();

    if($sth->rowCount() > 0){
        $rows = $sth->fetchAll();
        $hashedPassword = $rows[0]['pwd'];
        if(password_verify($insertedPassword, $hashedPassword)){
            $_SESSION['idLogin'] = $rows[0]['idLogin'];
            $_SESSION['NTessera'] = $rows[0]['NTessera'];
        }
    } else {
        $sth = DBHandler::getPDO()->prepare("INSERT INTO soci(nome, cognome, indirizzo, dataDiNascita, professione) VALUES (:nome, :cognome, :indirizzo, :dataDiNascita, :professione");
        $sth->bindParam(":nome", $nome);
        $sth->bindParam(":cognome", $cognome);
        $sth->bindParam(":indirizzo", $indirizzo);
        $sth->bindParam(":dataDiNascita", $data);
        $sth->bindParam(":professione", $professione);
        $sth->execute();

        $sth = DBHandler::getPDO()->prepare("SELECT NTessera FROM soci(nome, cognome, indirizzo, dataDiNascita, professione) WHERE nome = :nome AND cognome = :cognome AND indirizzo = :inidirizzo AND dataDiNascita = :dataDiNascita AND professione = :professione");
        $sth->bindParam(":nome", $nome);
        $sth->bindParam(":cognome", $cognome);
        $sth->bindParam(":indirizzo", $indirizzo);
        $sth->bindParam(":dataDiNascita", $data);
        $sth->bindParam(":professione", $professione);
        $sth->execute();

        $rows = $sth->fetchAll();

        $sth = DBHandler::getPDO()->prepare("INSERT INTO loginForm(nome, cognome, pwd, mail, NTessera) VALUES (:nome, :cognome, :pwd, :mail, :ntessera");
        $sth->bindParam(":nome", $nome);
        $sth->bindParam(":cognome", $cognome);
        $sth->bindParam(":mail", $mail);
        $sth->bindParam(":pwd", password_hash($pwd, PASSWORD_DEFAULT));
        $sth->bindParam(":NTessera", $row[0]['NTessera']);
        $sth->bindParam(":ruolo", null);
        $sth->execute();

        $sql = "SELECT NTessera FROM loginForm WHERE mail = :mail AND pwd = :pwd"
        $sth = DBHandler::getPDO()->prepare($sql);

        $sth->bindParam(':mail', $mail, PDO::PARAM_STR);
        $sth->bindParam(':pwd', $pwd, PDO::PARAM_STR);
        $sth->execute();

        $rows = $sth->fetchAll();

        $_SESSION['idLogin'] = $rows[0]['idLogin'];
        $_SESSION['NTessera'] = $rows[0]['NTessera'];
    }

    header('Location: loggedForm.php');

?>