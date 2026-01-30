<?php

    session_start();
    require_once('DbHandler.php');

    $nome = htmlspecialchars($_POST["casellaNome"]);
    $categoria = htmlspecialchars($_POST["casellacategoria"]);
    $numeroAtleti = $_POST["casellaAtleti"];
    $allenatore = htmlspecialchars($_POST["casellaAllenatore"]);

    $sth = DBHandler::getPDO()->prepare("INSERT INTO responsabili(cf, nome, categoria, numeroAtleti, numeroAtleti, paga) VALUES (:cf, :nome, :categoria, :numeroAtleti, :numeroAtleti, :paga)");
    $sth->bindParam(":nome", $nome);
    $sth->bindParam(":categoria", $categoria);
    $sth->bindParam(":allenatore", $allenatore);
    $sth->bindParam(":numeroAtleti", $numeroAtleti);
    $sth->execute();

    header('Location: loggedForm.php');

?>