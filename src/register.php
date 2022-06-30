<?php
  session_start();
  $_SESSION["statut"]="null";
  $flag=false;
  $password="null";
  $login="null";
  if(isset($_POST["login"]) && isset($_POST["password"])){
    $password=$_POST["password"];
    $login=$_POST["login"];
    $_SESSION["statut"]="restricted_user";
    $flag=true;
  }
  $limite_p=4;
  $limite_l=4;
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){}
  function check_p($string){
      $n=0;
      for($i=0 ; $i<strlen($string) ; $i++){
          if($string[$i]==' ')
              return false;
          $n++;
          if($n>strlen($string))
              return true;
      }
      echo strlen($string);
      return true;
  }

  function check_l($string){
      $n=0;
      for($i=0 ; $i<strlen($string) ; $i++){
          if($string[$i]==' ')
              return false;
          $n++;
          if($n>10)
              return true;
      }
      return true;
  }

  function uniq($string){
      $pdo = new PDO("sqlite:./role/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $pdo->query("SELECT * FROM user");
      foreach ($stmt as $row){
          if($row["name"]==$login)
              return false;
      }
      return true;
  }
  
  function verif(){
      return(strlen($_POST["password"])>=4 && strlen($_POST["login"])>=5 && check_p($_POST["password"]) && check_l($_POST["login"]) && uniq($_POST["login"]));
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
    <title>Inscription</title>
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
      if($flag){
          if(verif()){
              $_SESSION["login"]=$_POST["login"];
              $_SESSION["statut"]="user";
              $stmt=$pdo->prepare("INSERT INTO user (name,password,statut) VALUES(?,?,?)");
              $password=password_hash($password, PASSWORD_DEFAULT);
              $stmt->execute([$login,$password,"user"]);
              header("Location: chef.php");
          }
          else{
              echo "<h1>Mauvais mot de passe</h1>";
          }
      }
      echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">
      <input type=\"text\" name=\"login\" placeholder=\"Entrez un pseudo*\" required><br><input type=\"password\" name=\"password\" placeholder=\"Entrez un mot de passe*\" required><br><button type=\"submit\">Envoyer</button></form>";
      
    ?>
      </div>
  </body>
<html>
