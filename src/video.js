const HEIGHT = window.innerHeight;
const WIDTH = window.innerWidth;
const ESPACE = 50
document.getElementById("body").style.height = String(HEIGHT)+"px";


function redecoupage(){
  var video=document.getElementById("vid");
  video.style.height = String(HEIGHT-3*ESPACE)+"px";
  video.style.width = "auto";
  video.style.marginTop = String(ESPACE/2)+"px";
}

function boutons(){
  var but = document.getElementsByClassName("button");
  var n = but.length, i=0;
  for(i=0 ; i<n ; i++){
    but[i].style.width = String(3*ESPACE)+"px";
    but[i].style.height = String(1.5*ESPACE)+"px";
    but[i].style.margin = '10px 20px';
  }
  but[0].style.float = 'left';
  but[1].style.float = 'right';
  but[0].style.marginLeft = '50px';
  but[1].style.marginRight = '50px';
}

function suivant(){
  var video = document.getElementById("vid");
  if(video.ended)
    window.location = "questionnaire.php";
}
function precedent(){
  window.location = 'accueil.html';
}

document.getElementById("body").style.backgroundImage = 'linear-gradient(to bottom right,#001a3d,#005a7d)';
redecoupage();
boutons();