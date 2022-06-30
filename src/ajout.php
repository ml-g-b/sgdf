<?php
session_start();
if(!isset($_SESSION["statut"]) || !isset($_SESSION["login"])){
    header("Location: chef.php");
}
echo "<h1>".$_SESSION["login"]."</h1>";
error_reporting(E_ALL);
ini_set("display_errors", "1");
try{
    $pdo = new PDO("sqlite:../data/scout.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){}

function add($file,$user,$pdo){
    $stmt=$pdo->prepare("SELECT id FROM user WHERE name=?");
    $stmt->execute([$user]);
    $idU=$stmt->fetchColumn();
    echo "On a : ".$idU;
    $stmt=$pdo->prepare("SELECT idF FROM files WHERE name=?");
    $stmt->execute([$file]);
    $idF=$stmt->fetchColumn();
    echo "On a : ".$idF;
    if(! $idF){
        $stmt=$pdo->prepare("INSERT INTO files (name, visibility) VALUES (?,?)");
        $stmt->execute([$file,$_POST["visibility"]]);
        
        $stmt=$pdo->prepare("SELECT idF FROM files WHERE name=?");
        $stmt->execute([$file]);
        $idF=$stmt->fetchColumn();
        move_uploaded_file($_FILES["input"]["tmp_name"],__DIR__."/files/".$_FILES["input"]["name"]);
    }
    $stmt=$pdo->prepare("SELECT * FROM possess WHERE idU=? AND idF=?");
    $stmt->execute([$idU,$idF]);
    $res=$stmt->fetch();
    
    if(! $res){
        $stmt=$pdo->prepare("INSERT INTO possess VALUES (?,?)");
        $stmt->execute([$idF,$idU]);
    }
    echo "<h1>Ajout du fichier</h1>";
}

if (isset($_FILES["input"])){
    add($_FILES["input"]["name"],$_SESSION["login"],$pdo);
}
header("Location: myfiles.php");
?>