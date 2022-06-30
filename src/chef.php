<?php
  session_start();
  if(!isset($_SESSION["statut"]) || !isset($_SESSION["login"])){
      $_SESSION["statut"]="null";
      $_SESSION["login"]="null";
  }
    
      
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
    <div id="main">
      <div id="main_menu_container">
        <div class="title">
          <h1>Le site des chefs et cheftaines pour les chefs et cheftaines</h1>
        </div>
        <div class="main_menu_item">
          <a class="active" href="chef.php">Home</a>
          <a href="parcourir.php">Parcourir</a>
          <a href="contact.php">Contact</a>
          <a href="about.php">About</a>
          <a href="ressources.php">Ressources</a>
          <?php
                 if($_SESSION["login"]!="null"){
                     echo "<a href=\"profil.php\">Profil</a>";
                 }
                 else{
                     echo "<a href=\"password.php\">Se connecter</a>";
                     echo "<a href=\"register.php\">S'inscrire</a>";
                 }
          ?>
          <div class="search-container">
            <form action="parcourir.php" method="get">
              <button type="submit"><i class="fa fa-search"></i></button>
              <input type="text" placeholder="Rechercher..." name="search">
            </form>
          </div>
        </div>
      </div>
      <div id="content_container">
        <h1>Les dernières activités</h1>
        <p>
          <iframe src="../media/fiche_mission_aumonier_fiches-mission_0c64ea434f.pdf" width="75%" height="500px">
          </iframe>
        </p>
      </div>
    </div>
  </body>
<html>
