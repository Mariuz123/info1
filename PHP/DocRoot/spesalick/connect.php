<?php
    require 'config.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connessione al database riuscita";
    } catch (PDOException $e){
        echo $e -> getMessage();
    }
?>