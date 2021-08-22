<?php        
session_start();  
//session_destroy sert à detruire la session  
session_unset();
session_destroy();  
echo" Vous êtes  déconnecté";    

echo <<<html
<html>
<body><a href="truc2.php">se reconnecter </a></body>
</html>
html;

?>  