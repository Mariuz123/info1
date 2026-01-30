<?php

    session_start();
    require_once('DbHandler.php');

    $nome = htmlspecialchars($_POST["casellaNome"]);
    $cognome = htmlspecialchars($_POST["casellaCognome"]);
    $data = htmlspecialchars($_POST["casellaData"]);

    $sth = DBHandler::getPDO()->prepare("INSERT INTO allenatori(nome, cognome, dataTessera) VALUES (:nome, :cognome, :dataTessera)");
    $sth->bindParam(":nome", $nome);
    $sth->bindParam(":cognome", $cognome);
    $sth->bindParam(":dataTessera", $data);
    $sth->execute();

    header('Location: loggedForm.php');

?>