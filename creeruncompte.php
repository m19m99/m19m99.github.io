<!DOCTYPE html>
<html>
    <head>
        <title>Creer un compte</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
    </head>
    
    <body>

        <section id="contact">

            <h1>Creer un compte</h1>
            <div id="contact2">
                <form action="creer_compte.php" method="post">
                    <label for="name">Votre nom :</label>
                    <input id="name" name="name" type="text" placeholder="Votre nom">

                    <label for="name">Mot de passe :</label>
                    <input id="mdp" name="mdp" type="text" placeholder="mot de passe">

                    <label for="name">Confirmation mot de passe :</label>
                    <input id="confmdp" name="confmdp" type="text" placeholder="confirmation mot de passe">

                    <input type="submit" name="creer" value="creer mon compte"/>

                </form>
            </div>
            <a href="seconnecter.php">Se connecter</a>

        </section>
        
    </body>
</html>