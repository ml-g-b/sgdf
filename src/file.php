<?php
  session_start();
  if(!isset($_SESSION["statut"]) || !isset($_SESSION["login"])){
      $_SESSION["statut"]="null";
      $_SESSION["login"]="null";
      header("Location: chef.php");
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
    <title><?php echo $_GET["file"]?></title>
     <link rel="stylesheet" href="../css/chef.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="icon" href="sgdf.ico" type="image/x-icon">
  </head>
  <body>
    <div id="main">
      <div id="main_menu_container">
        <div class="title">
          <h1><?php echo $_GET["file"] ?></h1>
        </div>
        <div class="main_menu_item">
          <a class="active" href="chef.php">Home</a>
          <?php
          if($_SESSION["login"]!="null"){
                     echo "<a href=\"profil.php\">Profil</a>";
                     echo "<a href=\"logout.php\">Se déconnecter</a>";
          }
else{
echo "<a href=\"password.php\">Se connecter</a>";
                     echo "<a href=\"register.php\">S'inscrire</a>";
}
?>
        </div>
      </div>
      <div id="content_container">
    <?php
echo "
         <p>
          <iframe src=\"../files/".$_GET["file"]."\" width=\"75%\" height=\"650px\">
          </iframe>
        </p>"
     ?>
      </div>
    </div>
  </body>
<html>
