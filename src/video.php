<?php
  session_start();
  $_SESSION["nb"]=0;
  $_SESSION["quest"]=array();
  $_SESSION["role"]=array(0,0,0,0,0,0);
  $_SESSION["tab"]=array_fill(0,35,0);
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
catch(PDOException $e){}
  $stmt=$pdo->query("SELECT description FROM lien");
foreach($stmt as $row){
    array_push($_SESSION["quest"],$row["description"]);
}
?>
<!DOCTYPE html>
<!--

-->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Vidéo sur les rôles</title>
    <link rel="stylesheet" href="../css/video.css">
  </head>
  <body id="body">
    <center>
      <video id="vid" controls>
        <source src="../media/Night Sky - 31569.mp4" type="video/mp4">
          Your browser does not support the video tag.
      </video>
    </center>
    <button type="button" class="button" id="back" onclick="precedent()">Précedent</button>
    <button type="button" class="button" id="next" onclick="suivant()">Suivant</button>
    <script src="video.js"></script>
  </body>
</html>
