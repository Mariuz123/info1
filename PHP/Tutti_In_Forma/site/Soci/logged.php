<?php

    session_start();
    if (!isset($_SESSION['NTessera'])){
        header('Location: loginForm.php');
    }
    require_once('DbHandler.php');

    $visitaMedica = htmlspecialchars($_POST["casellaVisita"]);
    $nCorsi = htmlspecialchars($_POST["casellaCorsi"]);
    $data = htmlspecialchars($_POST["casellaData"]);
    $ruolo = htmlspecialchars($_POST["casellaRuolo"]);
    $squadra = htmlspecialchars($_POST["casellaSquadre"]);
    $professione = htmlspecialchars($_POST["menu_tendina"]);

    $sql = "SELECT NTessera FROM loginForm WHERE ruolo = NULL AND idLogin = :idLogin";
    $sth = DBHandler::getPDO()->prepare($sql);

    $sth->bindParam(':idLogin', $_SESSION['idLogin'], PDO::PARAM_STR);
    $sth->execute();

    if($sth->rowCount() > 0){

        if($professione == "Atleti"){
            $sth = DBHandler::getPDO()->prepare("INSERT INTO atleti(NTessera, visitaMedica, dataTessera, tipo) VALUES (:NTessera, :visitaMedica, :dataTessera, :tipo)");
            $sth->bindParam(":NTessera", $_SESSION['NTessera']);
            $sth->bindParam(":visitaMedica", $visitaMedica);
            $sth->bindParam(":dataTessera", $data);
            $sth->bindParam(":tipo", $squadra);
            $sth->execute();
        } else if($professione == "Frequentatore"){
            $sth = DBHandler::getPDO()->prepare("INSERT INTO frequentatori(NTessera, NCorsi) VALUES (:NTessera, :NCorsi)");
            $sth->bindParam(":NTessera", $_SESSION['NTessera']);
            $sth->bindParam(":NCorsi", $nCorsi);
            $sth->execute();
        } else if($professione == "Onorari"){
            $sth = DBHandler::getPDO()->prepare("INSERT INTO onorari(NTessera, Ruolo) VALUES (:NTessera, :Ruolo)");
            $sth->bindParam(":NTessera", $_SESSION['NTessera']);
            $sth->bindParam(":Ruolo", $ruolo);
            $sth->execute();
        }


    }

?>