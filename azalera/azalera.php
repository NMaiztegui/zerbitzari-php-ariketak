<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $radioa = intval($_POST['radio']);
           $irudia = htmlspecialchars($_POST['irudia']);
           $azalera="";

           if (empty(($radioa))){
                echo '<p> el valor metido no es un numero</p>';
           }
           else{
            switch ($irudia){
                case "karratua":
                    $azalera=pow($radioa,2);
                    echo"$radioa-ko alde daukan $irudia baten azalera $azalera-koa da";
                    break;
                case "borobila":
                    $azalera= M_PI * pow($radioa,2);
    
                    echo"$radioa-ko alde daukan $irudia baten azalera $azalera-koa da";
                    break;
    
               }
           }
          
           
           echo '<br><br>';
           echo '<a href="i-geometriko.html"><button>Volver al formulario</button></a>';
        }
    ?>
  