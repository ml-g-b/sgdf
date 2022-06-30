<?php
  session_start();      
?>
<!DOCTYPE html>
<!--

 CREATION : 

 SUBJECT : 

-->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Chefs</title>
    <link rel="stylesheet" href="../css/chef.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="sgdf.ico" type="image/x-icon">
    <title>Forbidden</title>
  </head>
  <body>
    <div id="main">
      <div id="main_menu_container">
        <div class="title">
          <h1>Le site des chefs et cheftaines pour les chefs et cheftaines</h1>
        </div>
        <div class="main_menu_item">
          <a class="active" href="chef.php">Home</a>
        </div>
      </div>
      <div id="content_container">
        <h1>Error 403 : Forbidden Access</h1>
      </div>
    </div>
    <script>
      document.addEventListener("keyup",function(event) {
          if(event.code === 'Quote')
              window.location="anim/anim.html";
      });
    </script>
  </body>
<html>
