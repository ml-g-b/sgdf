var couleur = new Array("#007254","#0077b3","#ff8300","#003a5d","#d03f15","#6e74aa");
var choix1={
  question : "",
  indice : -1
};

function bg(){
  var n=Math.floor(Math.random()*couleur.length), i=Math.floor(Math.random()*couleur.length);
  document.getElementById("choix1").style.backgroundColor = couleur[n];
  while(i==n)
    i=Math.floor(Math.random()*couleur.length);
  document.getElementById("choix2").style.backgroundColor = couleur[i];
}

function size_div(){
  var HAUTEUR = document.getElementsByClassName("head")[0].offsetHeight;
  var EL = document.querySelector('h1');
  var sty = EL.currentStyle || window.getComputedStyle(EL);
  var MARGE = parseFloat(sty.marginTop)*2
  var TAILLE = HAUTEUR + MARGE + 5;
  var ch1 = document.getElementById("choix1"), ch2 = document.getElementById("choix2");
  ch1.style.height = String(window.innerHeight-TAILLE-50)+"px";
  ch2.style.height = String(window.innerHeight-TAILLE-50)+"px";
}

function titre(){
  var COEF=0.03;
  var n=window.innerWidth*COEF;
  if(n<30)
    n=30;
  document.getElementById("title").style.fontSize=String(parseInt(n))+"px";
  console.log("Size : "+String(parseInt(n))+"px");
  var div = document.getElementsByClassName("head");
  div[0].style.height = '100px';
  var img = document.getElementsByClassName("image");
  for(i=0 ; i<2 ; i++){
    img[i].style.height = '80px';
  }
}

titre();
bg();
size_div();