<?php
  session_start();
  if(!isset($_SESSION["statut"]) || !isset($_SESSION["login"])){
      $_SESSION["statut"]="null";
      $_SESSION["login"]="null";
      header("Location: chef.php");
  }
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
          <a href="profil.php">Profil</a>
          <?php if($_SESSION["statut"]=="admin")
                 echo "<a href=\"user_browser.php\">Admin</a>";
?>
          <a href="logout.php">Se déconnecter</a>
        </div>
      </div>
      <div id="content_container">
        <div>
        <?php
            $stmt=$pdo->query("SELECT * FROM files");
            echo "<table><tr><th>Nom fichier</th><th>Visibilité</th><th>Supprimer</th></tr>";
            foreach($stmt as $row){
                echo "<tr><td><a href=\"file.php?file=/".$row["name"]."\">".$row["name"]."</a></td>";
                if($row["visibility"]>0)
                    echo "<td>public</td>";
                else
                    echo "<td>privé</td>";
                echo "<td><a href=\"delfile.php?id=".$row["idF"]."\",name=\"".$row["name"]."\">Supprimer</a></td></tr>";
            }
            echo "</table>";
        ?>
        </div>
    </div>
  </body>
<html>
