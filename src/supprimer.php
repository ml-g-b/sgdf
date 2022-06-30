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
$login=$_GET["pseudo"];
$stmt=$pdo->query("SELECT name FROM user");
$del=$pdo->prepare("DELETE FROM possess WHERE idU IN(SELECT idU FROM user WHERE name=?)")->execute([$login]);
foreach($stmt as $row){
    if($row["name"]==$login){
        $del=$pdo->prepare("DELETE FROM user WHERE name=?")->execute([$login]);
        break;
    }
}
header("Location: user_browser.php");
?>
