<?php

$dsn = 'mysql:dbname=portfolio;host=localhost';
$user = 'mimi';
$password = '123';
$conn = new PDO($dsn, $user, $password);

$name = valid_donnees($_POST["name"]);
$mdp = valid_donnees($_POST["mdp"]);

            function valid_donnees($donnees){
                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;
            }


if(isset($_POST['seco'])) {

    if(!empty($name) AND !empty($mdp)) {

       $requser = $conn->prepare("SELECT id , md5 FROM membres where id = '".$name."'"); /* and md5 = '".$mdp."'"*/
       $requser->execute();
       //$userexist = $requser->rowCount();
       //$userinfo = $requser->fetch();
       //$userinfo = $name;

       if($userinfo = $requser->fetch()) {
         
               $hash = $userinfo["md5"];
               if(!password_verify($mdp, $hash)){

                  $erreur = 'Mauvais mail ou mot de passe !';
                     echo ($erreur);
                     echo <<<html
                              <html>
                                 <body>
                                       <a href="truc2.php">Retour à la page de connexion</a>
                                 </body>
                              </html>
                              html;
               }else{

                  session_start();  
                  $_SESSION['name'] = $userinfo;
                  header('Location: index2.php');
                  exit();

               }
            
            
         
                        
         }else {
       $erreur = 'veuillez inserer une mot de passe ou un nom d\'utilisateur valide !!!';
       echo($erreur);
    }
  }else{
    echo ("Veuillez remplir tout les champs !");
 }
}
