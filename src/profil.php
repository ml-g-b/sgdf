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
    <title>Profil</title>
    <link rel="stylesheet" href="../css/chef.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="sgdf.ico" type="image/x-icon">
  </head>
  <body>
    <div id="main">
      <div id="main_menu_container">
        <div class="title">
          <h1>Bienvenue <?php echo $_SESSION["login"] ?></h1>
        </div>
        <div class="main_menu_item">
          <a class="active" href="chef.php">Home</a>
          <a href="myfiles.php">Mes fichiers</a>
          <?php if($_SESSION["statut"]=="admin")
                 echo "<a href=\"user_browser.php\">Admin</a>";
echo "<a href=\"allfiles.php\">Tous les fichiers</a>";
?>
          <a href="logout.php">Se déconnecter</a>
        </div>
      </div>
      <div id="content_container">
      </div>
    </div>
  </body>
<html>
