<?php
function faktorial($n){
    if ($n== 0){
        return 1;
    }
    $factoial=1; //siempre empieza por 1 para ir multiplicando  
    //seguir hasta llegar al num metido
    for ($i=1;$i<=$n; $i++){
        $factoial *=$i; //multiplicar su cabeza por i
    }
    return $factoial;
}    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zenbaki= faktorial($_POST['faktoriala']);
    
    echo"<p> Sartutako zenbakiaren faktorialia $zenbaki da </p>";
}
echo '<a href="index.html"><button>Volver al formulario</button></a>';
?>
  