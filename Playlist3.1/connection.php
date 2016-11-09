<?php
$userNameVerif= filter_input (INPUT_POST, 'username', FILTER_SANITIZE_STRING);

require ('connectBdd.php');
$validConnect= $pdo->prepare("SELECT id FROM Users WHERE pseudo= :pseudo AND password= :password");
$validConnect->bindValue('pseudo', $userNameVerif);
$validConnect->bindValue('password', sha1($_POST['password']));
$validConnect->execute();
$valid=$validConnect->fetch();

if(!$valid){
echo "Pseudo ou mot de passe incorrect";
}

 else {
   session_start();
   $_SESSION['id']=$valid['id'];
   $_SESSION['pseudo']=$userNameVerif;

   header('Location: index.php');
 }
 ?>
