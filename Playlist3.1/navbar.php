<?php session_start();
require ('connectBdd.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>

  </body>
</html>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/index.php">Yolu's Ultimate Playlist</a>
    </div>
    <?php
    if (isset($_SESSION['pseudo'])) {
  ?>

    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Mes playlists
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php
          $playlists = $pdo->prepare("SELECT name, id FROM playlists WHERE user_id = :userid");
          $playlists->bindValue('userid', $_SESSION['id']);
          $playlists->execute();

          while ($playlist = $playlists->fetch()) {
            ?>
            <li><a href="/myPlaylists/createSESSION_playlistId.php?playlistId=<?php echo $playlist['id']?>"> <?php echo $playlist['name'] ?></a></li>
            <?php
          }
          ?>
        </ul>
      </li>
      <li><a href="/createPlaylist/playlistForm.php">Créer une nouvelle playlist</a>
      </li>
      <li><a href="/addTrack/addForm.php">Ajouter un nouveau titre</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo ' Bonjour ' .$_SESSION['pseudo']; ?></a></li>
      <li><a href="/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      <?php
    }
    else{
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="connectionForm.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="/inscription/inscription.php"> S'inscrire</a></li>
      </ul>
      <?php
    }
    ?>
    </ul>
  </div>
</nav>
