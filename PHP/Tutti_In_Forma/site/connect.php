<?php

    $host = 'localhost';
    $user = 'root';
    $dbname = 'market';
    $password = '';

    try{

        $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $nome = $_POST["casellaNome"];
        $cognome = $_POST["casellaCognome"];
        $data = $_POST["casellaData"];
        $indirizzo = $_POST["casellaIndirizzo"];
        $mail = $_POST["casellaUser"];
        $pwd = $_POST["pws1"];
        $professione = $_POST["menu_tendina"];

        $statement = $conn->prepare("SELECT NTessera FROM loginForm WHERE mail = :mail AND pwd = :pwd");
        $statement->bindParam(":mail", $mail);
        $statement->bindParam(":pwd", $pwd);
        $statement->execute();

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(!count($result) > 0){
            $statement = $conn->prepare("INSERT INTO soci(nome, cognome, indirizzo, dataDiNascita, professione) VALUES (:nome, :cognome, :indirizzo, :dataDiNascita, :professione");
            $statement->bindParam(":nome", $nome);
            $statement->bindParam(":cognome", $cognome);
            $statement->bindParam(":indirizzo", $indirizzo);
            $statement->bindParam(":dataDiNascita", $data);
            $statement->bindParam(":professione", $professione);
            $statement->execute();

            $statement = $conn->prepare("SELECT NTessera FROM soci(nome, cognome, indirizzo, dataDiNascita, professione) WHERE nome = :nome AND cognome = :cognome AND indirizzo = :inidirizzo AND dataDiNascita = :dataDiNascita AND professione = :professione");
            $statement->bindParam(":nome", $nome);
            $statement->bindParam(":cognome", $cognome);
            $statement->bindParam(":indirizzo", $indirizzo);
            $statement->bindParam(":dataDiNascita", $data);
            $statement->bindParam(":professione", $professione);
            $statement->execute();

            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $statement = $conn->prepare("INSERT INTO loginForm(nome, cognome, pwd, mail, NTessera) VALUES (:nome, :cognome, :pwd, :mail, :ntessera");
            $statement->bindParam(":nome", $nome);
            $statement->bindParam(":cognome", $cognome);
            $statement->bindParam(":mail", $mail);
            $statement->bindParam(":pwd", $pwd);
            $statement->bindParam(":NTessera", $result[0]);
            $statement->execute();
        } else {
            session_start();
            $_SESSION["Tessera"] = $result[0];
            header('Location: ');
        }
    
    } catch (PDOException $e){
        echo $e -> getMessage();
    }

?>