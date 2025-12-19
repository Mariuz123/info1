<?php
    echo "2";

    require 'config.php';

    try{
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "connessione eseguita";
    } catch (PDOException $e){
        echo $e -> getMessage();
    }
?>