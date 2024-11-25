<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //recoger numero 
  $zenbakia=$_POST['zenbaki'];

  //zenbakia stirng batean bihurtu eta buelta eman
  $zenbakiAlrebes=strrev((string)$zenbakia);

  for ($i=0; $i<strlen($zenbakiAlrebes); $i++){
    echo"$zenbakiAlrebes[$i]" ;//inprime cada numero de la posicion del string

  }
    echo"<br>";
    
}
echo '<a href="idex.html"><button>Volver al formulario</button></a>';
?>