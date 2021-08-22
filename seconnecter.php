<?php 

    session_start();
    if(isset($_SESSION['name'])){
        header('Location: index2.php');
        exit();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Se connecter</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">

    </head>
    
    <body>
        <section id = "contact">
            <h1>Se connecter</h1>
            <div id="contact2">
                <form action="se_connecter.php" method="post">

                    <label for="name">Votre nom :</label>
                    <input id="name" name="name" type="text" placeholder="Votre nom">

                    <label for="mdp">Mot de passe :</label>
                    <input id="mdp" name="mdp" type="text" placeholder="mot de passe">

                    <input type="submit" name="seco" value="Se connecter"/>

                </form>
            </div>
            <p><a href="creeruncompte.php">Creer un compte</a></p>

        </section>
        
    </body>
</html>