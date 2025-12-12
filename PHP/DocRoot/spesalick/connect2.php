<?php

    $host = 'localhost';
    $user = 'root';
    $dbname = 'market';
    $password = '';

    try{
        
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

    }

?>