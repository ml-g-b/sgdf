<?php
session_start();
$_SESSION["statut"]="null";
if(isset($_POST["login"]) && isset($_POST["password"])){
    $password=$_POST["password"];
    $login=$_POST["login"];
    $_SESSION["statut"]="restricted_user";
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
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/chef.css">
    <link rel="stylesheet" href="../css/log.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="sgdf.ico" type="image/x-icon">
  </head>
  <body>
    <div id="main">
      <div id="main_menu_container">
        <div class="title">
          <h1>Page de connexion</h1>
        </div>
        <div class="main_menu_item">
          <a class="active" href="chef.php">Home</a>
        </div>
      </div>
      <div id="content_container">
    <?php
      error_reporting(E_ALL);
      ini_set("display_errors", "1");
      try{
          $pdo = new PDO("sqlite:../data/scout.db");
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          // $stmt=$pdo->prepare("INSERT INTO user (name,password,statut) VALUES(?,?,?)");
          // $pass=password_hash("", PASSWORD_DEFAULT);
          // $name="jean";
          // $stmt->execute([$name,$pass,"user"]);
          
          //$stmt = $pdo->query("SELECT * FROM user");
          // echo "<ul>";
      //     foreach ($stmt as $row){
      //         echo "<li><ul><li>".$row["id"]."</li><li>".$row["name"]."</li><li>".$row["password"]."</li><li>".$row["statut"]."</li></ul></li>";
      //     }
      //     echo "</ul>";
      }
      catch(PDOException $e){}
      echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">
      <input type=\"text\" name=\"login\" placeholder=\"Entrez votre pseudo\" required><br><input type=\"password\" name=\"password\" placeholder=\"Entrez votre mot de passe\" required><br><button type=\"submit\">Envoyer</button></form>";
      if($_SESSION["statut"]!="null"){
          
          $stmt = $pdo->query("SELECT * FROM user");
          $flag=false;
          foreach ($stmt as $row){
              if($row["name"]==$login && password_verify($password,$row["password"])){
                  $_SESSION["statut"]=$row["statut"];
                  $_SESSION["login"]=$login;
                  $flag=true;
              }
          }
          if($flag){
              header("Location: chef.php");
          }
          else{
              echo "<h1>Erreur mauvais mot de passe ou mauvais identifiant</h1>";
          }
      }
          ?>
      </div>
  </body>
<html>
