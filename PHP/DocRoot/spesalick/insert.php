<?php 

$pdo = require_once 'connect.php';

$name = $_POST['name'];
$sname = $_POST['sname'];
$eMail = $_POST['eMail'];
$pwd = $_POST['pwd'];


$statement = $conn->prepare("INSERT INTO utenti(nome, sname, eMail, pwd) VALUES (:NOME, :sname, :eMail, :pwd)");
$statement->bindParam(':nome', $name);
$statement->bindParam(':sname', $sname);
$statement->bindParam(':eMail', $eMail);
$statement->bindParam(':pwd', $pwd);
$statement->execute();

$publisher_id = $pdo->lastInsertId();

echo 'the publisher id ' . $publisher_id . ' was inserted';
?>