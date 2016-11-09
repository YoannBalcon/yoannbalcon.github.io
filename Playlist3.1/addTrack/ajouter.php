<!--Ajouter une piste dans la base de données  -->
<?php
require '../connectBdd.php';

$prep =$pdo->prepare("INSERT INTO tracks VALUES( 0,
                                                  :title,
                                                  :artist,
                                                  :duration,
                                                  :year)");
$prep->bindValue("title",$_POST['title']);
$prep->bindValue("artist", $_POST['artist']);
$prep->bindValue("duration", $_POST['duration']);
$prep->bindValue("year", $_POST['year']);
$prep->execute();

header('Location: ../index.php');
?>
