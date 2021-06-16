var valor = 0;
function Carrusel(){
  setTimeout(Carrusel, 2500);
  var x;
  const img = document.getElementsByClassName('imagenes');
  for(x = 0; x < img.length; x++){
    img[x].style.display = "none";
  }
  valor++;
  if(valor > img.length){valor = 1}
  img[valor -1].style.display = "block";
}
Carrusel();
