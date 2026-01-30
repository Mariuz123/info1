<?php

    session_start();
    require_once('DbHandler.php');

    $nome = htmlspecialchars($_POST["casellaNome"]);
    $cognome = htmlspecialchars($_POST["casellaCognome"]);
    $indirizzo = htmlspecialchars($_POST["casellaIndirizzo"]);
    $tell = htmlspecialchars($_POST["casellaTel"])
    $paga = $_POST["casellaPaga"];
    $cf = $_POST["casellaCF"];


    $sth = DBHandler::getPDO()->prepare("INSERT INTO responsabili(cf, nome, cognome, telefono, inidirzzo, paga) VALUES (:cf, :nome, :cognome, :telefono, :inidirzzo, :paga)");
    $sth->bindParam(":nome", $nome);
    $sth->bindParam(":cognome", $cognome);
    $sth->bindParam(":cf", $cf);
    $sth->bindParam(":telefono", $tell);
    $sth->bindParam(":inidirzzo", $indirizzo);
    $sth->bindParam(":dataTessera", $paga);
    $sth->execute();

    header('Location: loggedForm.php');

?>