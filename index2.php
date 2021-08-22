<?php
session_start();

if(empty($_SESSION['name'])){

    header('location: truc2.php');
          exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <h1>Vous etes connecté(e) !!!</h1>
    <button><a href="info.php">se deconnecter</a></button>

</body>
</html>
