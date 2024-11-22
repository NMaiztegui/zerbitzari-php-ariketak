<?php
function bTaula($n){
    if ($n== 0){
        echo" 0 zenbakia beti izango da 0 edozerrekin biderkatuta <br>";
       
    }else{
        for ($i=1; $i <=10; $i++){
            $emaitza=$n *$i;
            echo "<p>".$n."x" .$i. "=".$emaitza."</p>";
       }
    }
  
      
}    


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   bTaula($_POST['zenbakia']);
}
echo '<a href="index.html"><button>Volver al formulario</button></a>';
?>
  