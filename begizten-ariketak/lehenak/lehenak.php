<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //recoger numero 
  $zenbaki1=$_POST['zenbaki1'];
  $zenbaki2=$_POST['zenbaki2'];

  echo"Emaitza:";
    //fot pantairatuar los numeros que hay entre esos dos numeros
    for ($tarteko =$zenbaki1; $tarteko < $zenbaki2; $tarteko++){
        if ($tarteko %2!= 0) {
            echo"$tarteko ";
        }
    }
    
}
echo '<a href="index.html"><button>Volver al formulario</button></a>';

?>