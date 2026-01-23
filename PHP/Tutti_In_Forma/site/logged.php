<?php 

    session_start();
    if(!isset($_SESSION['idLogin'])){
        header('Location: login.php')
    }

    exit;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGGED</title>
</head>
<body>
    
</body>
</html>