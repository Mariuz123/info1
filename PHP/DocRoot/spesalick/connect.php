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
        $product = $_POST['prduct'];

        $statement = $conn->prepare("SELECT * FROM utenti WHERE nome = :nome AND sname = :sname AND eMail = :eMail");
        $statement->bindParam(':nome', $name);
        $statement->bindParam(':sname', $sname);
        $statement->bindParam(':eMail', $eMail);
        $statement->execute();

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(!count($result) > 0){
            $statement = $conn->prepare("INSERT INTO utenti(nome, sname, eMail, pwd, product) VALUES (:nome, :sname, :eMail, :pwd, :product)");
            $statement->bindParam(':nome', $name);
            $statement->bindParam(':sname', $sname);
            $statement->bindParam(':eMail', $eMail);
            $statement->bindParam(':pwd', $pwd);
            $statement->bindParam(':product', $product);

            $statement->execute();
        }   

        include 'common/store.html';

    } catch (PDOException $e){
        echo $e -> getMessage();
    }

?>