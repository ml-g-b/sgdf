<?php
  session_start();
  $_SESSION["nb"]++;
  if(isset($_GET["res"])){
      $_SESSION["role"][$_GET["res"]/6]++;
  }
  
if($_SESSION["nb"]>=18){
    $a=$b=$c=0;
    $array=$_SESSION["role"];
    for($i=0 ; $i<6 ; $i++){ 
        if($array[$i] > $a)
            $a=$i;
    }
     for($i=0 ; $i<6 ; $i++){ 
        if($array[$i] > $b && $i!=$a)
            $b=$i;
    }
     for($i=0 ; $i<6 ; $i++){ 
        if($array[$i] > $c && $i!=$a && $i!=$b)
            $c=$i;
    }
     header("Location: resultat.php?a=".$a."&b=".$b."&c=".$c);
}     
  $key1=rand(0,35);
  while($_SESSION["tab"][$key1]>0)
        $key1=rand(0,35);
  $_SESSION["tab"][$key1]=1;
  $key2=rand(0,35);
  while($_SESSION["tab"][$key2]>0)
      $key2=rand(0,35);
  $_SESSION["tab"][$key2]=1;
  
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Tu préfères</title>
    <link rel="stylesheet" href="../css/questionnaire.css">
  </head>
  <body>
    
    <div class="head">
      <img class="image gauche" src='../media/chemin.png' alt="chemin sgdf">
      <h1 id="title">Tu préfères</h1>
      <img class="image droite" src="../media/chemin.png" alt="chemin sgdf">
    </div>
    <div id="choix1" class="block" onclick=<?php echo "window.location=\"questionnaire.php?res=".$key1."\""; ?>>
        <label id="ch1" class="centerg"><?php echo ucfirst($_SESSION["quest"][$key1]) ?></label>
    </div>
    <div id="choix2" class="block" onclick=<?php echo "window.location=\"questionnaire.php?res=".$key2."\""; ?>>
        <label id="ch2" class="centerd"><?php echo ucfirst($_SESSION["quest"][$key2]) ?></label>
    </div>
    <script src="questionnaire.js"></script>
  </body>
</html>
