<?php


    //$id_session = session_id();

    $dsn = 'mysql:dbname=portfolio;host=localhost';
            $user ='mimi';
            $mdp ='123';
            $conn = new PDO ($dsn, $user, $mdp);

            $name = valid_donnees($_POST["name"]);
            $mdp = valid_donnees($_POST["mdp"]);
            $confmdp = valid_donnees($_POST['confmdp']);

            function valid_donnees($donnees){
                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;
            }

            $password = $mdp;
            $hash = password_hash($password, PASSWORD_DEFAULT);
            //var_dump($hash);

            while($mdp != $confmdp) {
                
                echo("Les mots de passes sont différents,");
                echo <<<html
                <html>
                    <body>
                        <a href="truc.php">réessayer</a>
                    </body>
                </html>
                html;
                exit; 
            }

                $sqlin= "INSERT INTO membres (id, md5)
                VALUES(:name, :mdp)";

                $sth = $conn->prepare($sqlin);
                $sth->bindParam(':name',$name);
                $sth->bindParam(':mdp',$hash);
                $sth->execute();

                if(isset($sth)){

                    header('Location: index1.html');
                    exit();

                }  
            

?>