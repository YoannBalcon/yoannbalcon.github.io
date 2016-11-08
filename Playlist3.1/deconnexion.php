<?php
session_start();
session_destroy (); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Deconnexion</title>
  </head>
  <body>
    <script type="text/javascript">

    alert("Vous avez été deconnecté avec succès");
    window.location = "index.php";

  </script>
  </body>
</html>
