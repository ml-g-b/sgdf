  <?php
session_start();
if(!isset($_SESSION["statut"]) || $_SESSION["statut"]!="admin"){
    echo "<title>Forbidden</title>";
    header("Location: 403.php");
}
try{
    $pdo = new PDO("sqlite:../data/scout.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){}
$id=$_GET["id"];
$stmt=$pdo->prepare("SELECT idF FROM possess WHERE idF=?");
$stmt->execute([$id]);
$del=$pdo->prepare("DELETE FROM possess WHERE idF=?")->execute([$id]);
$del=$pdo->prepare("DELETE FROM files WHERE idF=?")->execute([$id]);
unlink("files/".$_GET["name"]);
header("Location: myfiles.php");
?>
