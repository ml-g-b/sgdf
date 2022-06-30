const HEIGHT = window.innerHeight;
var WIDTH = window.innerWidth/2;

var largeur = String(WIDTH/2)+'px';

function dejaRole(){
  window.location = 'liste.php';
}

function pasRole(){
  window.location = 'video.php';
}

function chg(){
  document.getElementById("jai").style.height= String(HEIGHT)+'px';
  document.getElementById("jai").style.width= String(WIDTH)+'px';
  document.getElementById("jpas").style.height= String(HEIGHT)+'px';
  document.getElementById("jpas").style.width= String(WIDTH)+'px';
}

/*
document.getElementById("body").style.height = String(HEIGHT)+"px";
document.getElementById("body").style.width = String(WIDTH)+"px";
*/

chg();