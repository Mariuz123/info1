<?php

    session_start();
    require_once('DbHandler.php');

    $descript = htmlspecialchars($_POST["casellaDescript"]);
    $costo = htmlspecialchars($_POST["casellaCosto"]);
    $data = htmlspecialchars($_POST["casellaData"]);
    $impianto = htmlspecialchars($_POST["casellaImpianto"]);
    $ora = htmlspecialchars($_POST["casellaOra"]);
    $responsabile = htmlspecialchars($_POST["casellaResponsabile"]);

    $sth = DBHandler::getPDO()->prepare("INSERT INTO corsi(descript, costo, impianto, giorno, ora, responsabile) VALUES(:descript, :costo, :impianto, :dataDiNascita, ora, :responsabile)");
    $sth->bindParam(":descript", $descript);
    $sth->bindParam(":costo", $costo);
    $sth->bindParam(":impianto", $impianto);
    $sth->bindParam(":dataDiNascita", $data);
    $sth->bindParam(":ora", $ora);
    $sth->bindParam(":responsabile", $responsabile);
    $sth->execute();
    

    header('Location: loggedForm.php');

?>