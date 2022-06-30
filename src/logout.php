<?php
  session_start();
  unset($_SESSION["login"]);
  unset($_SESSION["statut"]);
header("Location: chef.php");
?>
