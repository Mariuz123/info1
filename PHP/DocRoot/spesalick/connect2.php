<?php

    $host = 'localhost';
    $user = 'root';
    $dbname = 'market';
    $password = '';

    try{
        
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $qt = $_POST['quantity'];
        $prz = $_POST['price'];

        $statement = $conn->prepare("SELECT * FROM utenti WHERE nome = :nome AND sname = :sname AND eMail = :eMail");
        $statement->bindParam(':nome', $name);
        $statement->bindParam(':qt', $qt);
        $statement->bindParam(':prz', $prz);
        $statement->execute();

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(!count($result) > 0){
            $statement = $conn->prepare("INSERT INTO prodotti VALUES (:nome, :sname, :eMail, :pwd)");//ARRIVATO QUA
            $statement->bindParam(':nome', $name);
            $statement->bindParam(':qt', $qt);
            $statement->bindParam(':prz', $prz);

            $statement->execute();
        }
        
    }

?>