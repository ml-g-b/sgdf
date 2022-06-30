<?php
  session_start();
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){}
?>
<!DOCTYPE html>
<!--

 CREATION : 

 SUBJECT : 

-->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Chefs</title>
    <link rel="stylesheet" href="../css/chef.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="sgdf.ico" type="image/x-icon">
  </head>
  <body>
    <?php
      if(!isset($_SESSION["statut"]) || $_SESSION["statut"]!="admin"){
          header("Location: 403.php");
      }
      else {
     ?>
      <div id="main">
      <div id="main_menu_container">
        <div class="title">
          <h1>Le site des chefs et cheftaines pour les chefs et cheftaines</h1>
        </div>
        <div class="main_menu_item">
          <a class="active" href="chef.php">Home</a>
          <a href="profil.php">Profil</a>
        </div>
      </div>
      <div id="content_container">
        <h1>Liste des utilisateurs</h1>
        <table><tr><th>Pseudo</th><th>Statut</th><th>Supprimer</th></tr>
          <?php
            $stmt=$pdo->query("SELECT name, statut FROM user");
            foreach($stmt as $row){
                if($row["name"]!=$_SESSION["login"])
                    echo "<tr><td>".$row["name"]."</td><td>".$row["statut"]."</td><td><a href=\"supprimer.php?pseudo=".$row["name"]."\">Supprimer</a></td></tr>";
            }
            ?>
        </table>
      </div>
      </div>
      <?php } ?>
  </body>
<html>
