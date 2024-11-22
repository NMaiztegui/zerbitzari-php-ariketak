<?php
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zenbaki= strlen($_POST['zenbaki']);
    
    echo"<p> Sartutako zenbakiaren zifra kopurua $zenbaki da </p>";
}
echo '<a href="index.html"><button>Volver al formulario</button></a>';
?>
  