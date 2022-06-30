const HEIGHT = window.innerHeight;
const WIDTH = window.innerWidth;

const ROLE = document.title;
console.log(ROLE);

function sizeItem(){
  var listItem = document.getElementsByClassName("item");
  for(i=0 ; i<listItem.length ; i++){
    listItem[i].style.height = "100px";
    listItem[i].style.width = "100px";
  }
}

function resizeBody(){
  var body = document.getElementById("body");
  body.style.height = String(HEIGHT)+"px";
  body.style.width = String(WIDTH)+"px";
}

function constellation(id){
  /*var identifiant = "ul"+String(id);*/
  console.log(identifiant);/*
  var ul = document.getElementById(identifiant);
  var li = document.createElement("li");
  ul.style.display = 'initial';
  li.appendChild(document.createTextNode("Element "+String(id)));
  ul.appendChild(li);
  console.log("Element : ",id);*/
}

/*
sizeItem();*/
//resizeBody();