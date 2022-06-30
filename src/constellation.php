<?php
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $pdo->query("SELECT * FROM constellations");
  }
  catch(PDOException $e){}
  
  $liste_constel = array ();
  foreach ($pdo->query("SELECT * FROM constellations") as $row){
      array_push($liste_constel,$row["nom"]);
  }
  
$title="h2";
$role = $_GET["role"];
$constellation=$_GET["constellation"];
$stmt=$pdo->prepare("SELECT * FROM lien WHERE idRole IN (SELECT idRole FROM roles WHERE nom=?) AND idConst IN (SELECT idConst FROM constellations WHERE nom=?)");
$stmt->execute([$role,$constellation]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(! $row){
    header("Location: 404.php");
}
$query=$pdo->prepare("SELECT * FROM constellations WHERE nom = ?");
$query->execute([$constellation]);
$color=$query->fetch(PDO::FETCH_ASSOC);
$idC=$color["idConst"];

?>
<!DOCTYPE html>
<!--

-->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $role ?></title>
    <link rel="stylesheet" href="../css/newrole.css">
    <link rel="stylesheet">
    <link rel="icon" href=<?php echo "\"../media/icon/".$role.".png\""?> type="image/x-icon">
    <style>
      h1 {
      color : #fff;
      padding : 25px;
      width : adapted;
      }
      .colored{
        background-color : <?php echo $color["couleur"]."aa" ?>;
        border : 10px solid <?php echo $color["couleur"]?>;
      }
    </style>
  </head>
  <body id="body">
    <div class="boxed colored">
    <?php
            echo "<h1>".ucfirst($row["description"])."</h1>";
            ?>
    </div>
    <ul class="list">
      <?php
$liste=explode(', ', $row["exemples"]);
foreach($liste as $ex){
    echo "<li><img src=\"../media/SIGNES_COMMUNS_obstacle à franchir.png\" alt=\"...\">".ucfirst($ex)."</li>";
}
?>
    </ul>
  </body>
</html>
