<?php
  session_start();
  if(!isset($_SESSION["statut"]) || !isset($_SESSION["login"])){
      $_SESSION["statut"]="null";
      $_SESSION["login"]="null";
  }
  $flag=false;
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){}
  
  
  if(isset($_GET["search"])) {
      $search=$_GET["search"];
      $flag=true;
  }
  else {
      $search="";
  }
$couleur=array("purple","red","violet","blue","green","orange","lime","yellow");
?>
<!DOCTYPE html>
<!--

 CREATION : 

 SUBJECT : 

-->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Parcourir</title>
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
          <a href="contact.php">Contact</a>
          <a href="about.php">About</a>
          <?php
                 if($_SESSION["login"]!="null"){
                     echo "<a href=\"profil.php\">Profil</a>";
                 }
            
          ?>
          <div class="search-container">
            <form action="parcourir.php" method="get">
              <button type="submit"><i class="fa fa-search"></i></button>
              <input type="text" placeholder="Rechercher..." name="search">
            </form>
          </div>
        </div>
        <div id="content_container">
          <?php
               if($search==""){
                   echo "<h1>Rechercher</h1>";
                   echo "<div class=\"search_bar\"><form action=\"parcourir.php\" method=\"get\"><input type\"text\" placeholder=\"Rechercher...\" name=\"search\"><button type=\"submit\"><i class=\"fa fa-search\"></i></button></form></div>";
                   echo "<div class=\"category_container\">";
                   $stmt=$pdo->query("SELECT name FROM files WHERE visibility>0");
                   foreach($stmt as $row){
                       $n=rand(0,count($couleur)-1);
                       $i=(strlen($row["name"])+10)*10;
                       echo "<span class=\"".$couleur[$n]."\" onclick=\"window.location='file.php?file=".$row["name"]."'\" style=\"width : ".$i."px\"><label>".$row["name"]."</label></span>";
                   }
               }
               else{
                   $stmt=$pdo->prepare("SELECT name FROM files WHERE name LIKE ? AND visibility > 0");
                   $stmt->execute(["%".$search."%"]);
                   if(empty($stmt)){
                       echo "<h2>Non trouvé</h2>";
                   }
                   else{
                       echo "<h1>Résultats de recherche</h1>";
                       echo "<div class=\"category_container\">";
                       foreach($stmt as $row){
                           $n=rand(0,count($couleur)-1);
                           $i=(strlen($row["name"])+10)*10;
                           echo "<span class=\"".$couleur[$n]."\" onclick=\"window.location='file.php?file=".$row["name"]."'\" style=\"width : ".$i."px\"><label>".$row["name"]."</label></span>";
                       }
                   }
               }
                   ?>
          </div>
        </div>
      </div>
  </body>
<html>
