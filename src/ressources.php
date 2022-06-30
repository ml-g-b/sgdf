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
          <div class="search-container">
            <form action="parcourir.php" method="get">
              <button type="submit"><i class="fa fa-search"></i></button>
              <input type="text" placeholder="Rechercher..." name="search">
            </form>
          </div>
        </div>
      </div>
      <div id="content_container">
        <div class="res">
          <a href="liste.php"><span class="el">Rôles</span></a>
          <a href="accueil.html"><span class="el">Accueil</span></a>
          <a href="../media/peda_ap_sg/01-La_vie_en_unité_et_en_équipe.pdf" target="_blank"><span class="le">Vie en unité et en équipe</span></a>
          <a href="../media/peda_ap_sg/02-Le_projet.pdf" target="_blank"><span class="le">Le projet</span></a>
          <a href="../media/peda_ap_sg/03-Rôle_et_progression_personnelle.pdf" target="_blank"><span class="le">Rôles et progression personnelle</span></a>
          <a href="../media/peda_ap_sg/04-3ème_année.pdf" target="_blank"><span class="le">3ème année</span></a>
          <a href="../media/peda_ap_sg/05-Relation_éducative.pdf" target="_blank"><span class="le">Relation éducative</span></a>
          <a href="../media/peda_ap_sg/06-Loi_et_promesse.pdf" target="_blank"><span class="le">Loi et promesse</span></a>
          <a href="../media/peda_ap_sg/07-Participation_des_jeunes.pdf" target="_blank"><span class="le">Participation des jeunes</span></a>
          <a href="../media/peda_ap_sg/08-Vie_dans_la_nature.pdf" target="_blank"><span class="le">Vie dans la nature</span></a>
          <a href="../media/peda_ap_sg/09-Accueil_et_inclusion.pdf" target="_blank"><span class="le">Accueil & Inclusion</span></a>
          <a href="../media/peda_ap_sg/10-Vie_spirituelle.pdf" target="_blank"><span class="le">Vie spirituelle</span></a>
          <a href="../media/peda_ap_sg/11-Frise_Année.pdf" target="_blank"><span class="le">Frise d'année</span></a>
        </div>
      </div>
    </div>
  </body>
<html>
