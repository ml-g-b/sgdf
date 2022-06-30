<?php
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  try{
      $pdo = new PDO("sqlite:../data/scout.db");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $pdo->query("SELECT * FROM constellations");
  }
  catch(PDOException $e){}
  
$title="h2";
$role = $_GET["role"];
$array=array();
$stmt=$pdo->query("SELECT nom FROM constellations");
foreach($stmt as $row){
    array_push($array,$row["nom"]);
}
$stmt=$pdo->prepare("SELECT * FROM roles WHERE nom = ?");
$stmt->execute([$role]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(! $row){
    header("Location: 404.php");
}

?>
<!DOCTYPE html>
<!--

-->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $role ?></title>
    <link rel="stylesheet" href="../css/newrole.css">
    <link rel="icon" href=<?php echo "\"../media/icon/".$role.".png\""?> type="image/x-icon">
  </head>
  <body id="body">
    <!--
    <div id="prop1" class="item">
    </div>
    <div id="prop2" class="item">
    </div>
    <div id="prop3" class="item">
    </div>
    <div id="prop4" class="item">
    </div>
    <div id="prop5" class="item">
    </div>
    <div id="prop6" class="item">
    </div> -->
    <div id="graph">
      <div id="role">
        <img id="imgRole" src=<?php echo "\"../media/icon/".$role.".png\"" ?> alt=<?php echo "\"".$role."\""?>>
        <h1 id="title"><?php echo $role ?></h1>
      </div>
      <div id="const">
        <ul class='circle-container'>
          <?php
                $i=1;
                foreach($array as $cons){
                    echo "<li class=\"tooltip\"><a href=\"constellation.php?role=".$role."&constellation=".$cons."\"><img src=\"../media/".strtolower($cons).".png\" alt=\"".$cons."\"/>";
                    echo "<div class=\"tooltiptext tool".$i."\">";
                    echo "<".$title.">".$cons."</".$title.">";
                    $i++;
                }
           ?>
          <!--
          <li class="tooltip"><img src='../media/cooperation.png' alt="..." onclick="constellation(1)"/>
            <div class="tooltiptext tool1">
              <?php
                    echo "<".$title.">Coopération</".$title.">";
              ?>
          </div>
        </li>
        
        <li class="tooltip"><img src='../media/esperance.png' alt="..." onclick="constellation(2)"/>
          <div class="tooltiptext tool2">
            <?php
                    echo "<".$title.">Espérance</".$title.">";
            ?>
          </div>
        </li>
        <li class="tooltip"><img src='../media/humanite.png' alt="..." onclick="constellation(3)"/>
          <div class="tooltiptext tool3">
            <?php
                    echo "<".$title.">Humanité</".$title.">";
            ?>
          </div>
        </li>
        <li class="tooltip"><img src='../media/esprit.png' alt="..." onclick="constellation(4)"/>
          <div class="tooltiptext tool4">
            <?php
                    echo "<".$title.">Esprit</".$title.">";
            ?>
          </div>
        </li>
        <li class="tooltip"><img src='../media/energie.png' alt="..." onclick="constellation(5)"/>
          <div class="tooltiptext tool5">
             <?php
                    echo "<".$title.">Energie</".$title.">";
            ?>
          </div>
        </li>
        <li class="tooltip"><img src='../media/sagesse.png' alt="..."/>
          <div class="tooltiptext tool6">
            <?php
                    echo "<".$title.">Sagesse</".$title.">";
            ?>
          </div>
        </li>-->
      </ul>
      </div>
    </div>
  </body>
</html>
