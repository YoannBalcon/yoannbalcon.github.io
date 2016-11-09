<?php
$playlistSan = filter_var($_POST['playlistName'], FILTER_SANITIZE_STRING);

if (strlen($playlistSan)>0) {
// envoie des données en bdd
session_start();
require ('../connectBdd.php');

$insertPlaylist = $pdo->prepare("INSERT INTO playlists VALUES (0, :name, :userid)");
$insertPlaylist->bindValue('name', $playlistSan);
$insertPlaylist->bindValue('userid', $_SESSION['id']);
$insertPlaylist->execute();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Playlist <?php echo $playlistSan; ?> crée</title>
   <meta http-equiv="refresh" content="2; URL=/index.php">
  </head>
  <body>
Playlist <?php echo $playlistSan; ?> crée !
  </body>
  <style media="screen">
    body{
      text-align: center;
      font-size: 36px;
    }
  </style>
</html>

<?php
}
else {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>champs de saisie vide !</title>
     <meta http-equiv="refresh" content="2; URL=playlistForm.php">
    </head>
    <body>
Veuillez entrer un nom de playlist.
    </body>
    <style media="screen">
      body{
        text-align: center;
        font-size: 36px;
      }
    </style>
  </html> <?php
}
?>
