<?php
  session_start();
  unset($_SESSION["nb"]);
  unset($_SESSION["role"]);
  unset($_SESSION["tab"]);
  unset($_SESSION["quest"]);
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Not found</title>
    <link rel="stylesheet" href="../css/newrole.css">
    <link rel="icon" href="sgdf.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/resultat.css">
    <title>Not found</title>
  </head>
  <body>
    <div id="head">
      <h1>Le rôle qui te correspond le plus</h1>
    </div>
    <div id="contain">
      <div class="nb1">
        <?php
$stmt=$pdo->prepare("SELECT * FROM roles WHERE idRole=?");
          $stmt->execute([$_GET["a"]]);
          $role=$stmt->fetch(PDO::FETCH_ASSOC);
?>
        <h1 id="1"><?php echo $role["nom"] ?></h1>
        <?php
          echo "<a href=\"role.php?role=".$role["nom"]."\"><img src=\"../media/icon/".$role["nom"].".png\" alt=\"".$role["nom"]."\"></a>";
        ?>
      </div>
      <div class="nb2">
<?php
$stmt=$pdo->prepare("SELECT * FROM roles WHERE idRole=?");
          $stmt->execute([$_GET["b"]]);
          $role=$stmt->fetch(PDO::FETCH_ASSOC);
?>
        <h1 id="2"><?php echo $role["nom"] ?></h1>
        <?php
          echo "<a href=\"role.php?role=".$role["nom"]."\"><img src=\"../media/icon/".$role["nom"].".png\" alt=\"".$role["nom"]."\"></a>";
        ?>
      </div>
      <div class="nb3">
<?php
$stmt=$pdo->prepare("SELECT * FROM roles WHERE idRole=?");
          $stmt->execute([$_GET["c"]]);
          $role=$stmt->fetch(PDO::FETCH_ASSOC);
?>
        <h1 id="3"><?php echo $role["nom"] ?></h1>
        <?php
          echo "<a href=\"role.php?role=".$role["nom"]."\"><img src=\"../media/icon/".$role["nom"].".png\" alt=\"".$role["nom"]."\"></a>";
        ?>
      </div>
    </div>
  </body>
<html>
