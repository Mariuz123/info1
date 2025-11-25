<?php 

$pdo = require_once 'connect.php';

$name = 'macMillan';
$sql = 'INSERT INTO publisher(name) VALUES(:name)';

$statement = $pdo->prepare($sql);
$statement->execute([':name' => $name]);

$publisher_id = $pdo->lastInsertId();

echo 'the publisher id ' . $publisher_id . ' was inserted';
?>