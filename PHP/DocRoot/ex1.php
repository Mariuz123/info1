<?php
    
    $host = 'localhost';
    $user = 'root';
    $dbname = 'market';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $sname = $_POST['Surname'];
        $eMail = $_POST['Email'];
        $pwd = $_POST['pwd'];

        $statement = $conn->prepare("SELECT * FROM utenti WHERE nome = :nome AND sname = :sname AND eMail = :eMail");
        $statement->bindParam(':nome', $name);
        $statement->bindParam(':sname', $sname);
        $statement->bindParam(':eMail', $eMail);
        $statement->execute();

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(!count($result) > 0){
            $statement = $conn->prepare("INSERT INTO utenti(nome, sname, eMail, pwd) VALUES (:nome, :sname, :eMail, :pwd)");
            $statement->bindParam(':nome', $name);
            $statement->bindParam(':sname', $sname);
            $statement->bindParam(':eMail', $eMail);
            $statement->bindParam(':pwd', $pwd);

            $statement->execute();
        }   

        $statement = $conn->prepare("SELECT idUtente FROM utenti WHERE nome = :nome AND sname = :sname AND eMail = :eMail");
        $statement->bindParam(':nome', $name);
        $statement->bindParam(':sname', $sname);
        $statement->bindParam(':eMail', $eMail);
        $statement->execute();

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $id = $result[0];

        

        $conn = null;

    } catch (PDOException $e){
        echo $e -> getMessage();
    }

?>