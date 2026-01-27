<?php 

    session_start();
    require_once('DbHandler.php');

    $descrip = htmlspecialchars($_POST["casellaDescrizione"]);
    $indirizzo = htmlspecialchars($_POST["casellaIndirizzo"]);
    $telefono = htmlspecialchars($_POST["casellaTelefono"]);
    $ente = htmlspecialchars($_POST["casellaEnte"]);

    $sth = DBHandler::getPDO()->prepare("INSERT INTO impianti(descript, indirizzo, telefono, ente) VALUES (:descript, :indirizzo, :telefono, :ente)");
    $sth->bindParam(":descript", $descrip);
    $sth->bindParam(":indirizzo", $indirizzo);
    $sth->bindParam(":telefono", $telefono);
    $sth->bindParam(":ente", $ente);
    $sth->execute();

?>