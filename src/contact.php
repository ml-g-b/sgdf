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
          <div class="search-container">
            <form action="parcourir.php" method="get">
              <button type="submit"><i class="fa fa-search"></i></button>
              <input type="text" placeholder="Rechercher..." name="search">
            </form>
          </div>
        </div>
      </div>
      <div id="content_container">
        <h1>Contact</h1>
        <p>
          <form id="contact" method="post" action="send.php">
            <input type="text" name="name" placeholder="Entrez votre nom et prénom" required><br>
            <input type="mail" name="mail" placeholder="Entrez votre email" required><br>
            <input type="text" name="subject" placeholder="Sujet" required><br>
            <input type="text" name="content" placeholder="Contenu" required><br>
            <button type="submit">Envoyer</button>
          </form>
        </p>
      </div>
    </div>
  </body>
<html>
