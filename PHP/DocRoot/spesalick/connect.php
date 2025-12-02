<?php
    
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connessione al database riuscita <br>";

        $name = $_POST['name'];
        $sname = $_POST['Surname'];
        $eMail = $_POST['Email'];
        $pwd = $_POST['pwd'];
        $product = $_POST['prduct'];

        echo "Nome: $name, Surname: $sname, eMail: $eMail, pwd: $pwd, product: $product <br>";

        $statement = $conn->prepare("INSERT INTO utenti(nome, sname, eMail, pwd, product) VALUES (:nome, :sname, :eMail, :pwd, :product)");
        $statement->bindParam(':nome', $name);
        $statement->bindParam(':sname', $sname);
        $statement->bindParam(':eMail', $eMail);
        $statement->bindParam(':pwd', $pwd);
        $statement->bindParam(':product', $product);

        $statement->execute();

echo "New line";
    } catch (PDOException $e){
        echo $e -> getMessage();
    }

?>