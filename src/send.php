<?php
session_start();

$connect="User not connected";

echo "C'est parti";

$to = "mickael.gault@etu.univ-st-etienne.fr";
$to2="mgbb.42130@gmail.com";
$subject=$_POST["subject"];
$message=$_POST["content"];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if($_SESSION["login"]!="null")
    $connect="User connected";
    
$msg="
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>".$connect."</p>
<table>
<tr>
<th>Name</th><th>From</th>
</tr>
<tr>
<td>".$_POST["name"]."</td><td>".$_POST["mail"]."</td>
</tr>
</table>
<p>".$message."</p>
</body>
</html>";

echo $msg;

echo "Alors ?";

mail($to2,$subject,$msg,$headers);

if(mail($to,$subject,$msg,$headers))
    echo "true";
else
    echo "false";
                   
//header("Location: myfiles.php");
?>