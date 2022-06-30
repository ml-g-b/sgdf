<?php

$array=array("Reporter","Gastronome","Artisan","Cartographe","Panseur","Alchimiste");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Document</title>
    <link rel="stylesheet" href="../css/newrole.css">
  </head>
  <body><!--
    <form action="role.php" method="post">
      <label>Gastronome<input value="Gastronome" type="radio" name="role" checked></label><br>
      <label>Artisan<input value="Artisan" type="radio" name="role"></label><br>
      <label>Alchimiste<input value="Alchimiste" type="radio" name="role"></label><br>
      <label>Cartographe<input value="Cartographe" type="radio" name="role"></label><br>
      <label>Reporter<input value="Reporter" type="radio" name="role"></label><br>
      <label>Panseur<input value="Panseur_Panseuse" type="radio" name="role"></label><br>
      <button type="submit">Envoyer</button>
    </form>
    <?php
          foreach($array as $role){
              echo "<h1 style=\"color : #fff\">".$role."</h1>";
          }
    ?>-->
    <div id="graph">
      <div id="const">
        <ul class='circle-container liste'>
          <?php
                 $i=1;
                 foreach($array as $role){
                     echo "<li class=\"tooltip\">";
                     echo "<a href=\"role.php?role=".$role."\">";
                     echo "<img class=\"white\" src='../media/icon/".$role.".png' alt=\"".$role."\"/></a>";
                     echo "<div class=\"tooltiptext tool".$i."\">";
                     echo "<h1>".$role."</h1>";
                     echo "</div>";
                     echo "</li>";
                     $i++;
                 }
          ?>
        </ul>
      </div>
    </div>
  </body>
</html>