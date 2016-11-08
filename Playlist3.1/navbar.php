<?php session_start();
require ('connectBdd.php');
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Yolu's Ultimate Playlist</a>
    </div>

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
    </ul>
  </div>
</nav>
