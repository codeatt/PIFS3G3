let trocaTema=document.getElementById("trocaTema");
trocaTema.onclick=function(event){
  event.preventDefault();
  if(document.body.classList.contains("tema1")){
    document.body.classList.remove("tema1")
  }else{
    document.body.classList.add("tema1")
  }
}
