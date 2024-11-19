<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $euro = intval($_POST['kantitatea']);
           $biurtu = htmlspecialchars($_POST['biurtu']);
           $emaitza="";

           if (empty(($euro))){
                echo '<p> el campo de euro se encuentra vacio</p>';
           }
           else{
            switch ($biurtu){
                case "dolar":
                    $emaitza=$euro*1.08;
                    echo"$euro $emaitza $biurtu dira";
                    break;
                case "yen":
                    $emaitza=$euro*164.3;
                    echo"$euro $emaitza $biurtu dira";
                    break;
                case "libera":
                    $emaitza=$euro*0.83;
                    echo"$euro $emaitza $biurtu dira";
                   
                    break;
                case "franko":
                    $emaitza=$euro*0.94;
                    echo"$euro $emaitza $biurtu dira";
                   
                    break;
    
               }
           }
          
           
           echo '<br><br>';
           echo '<a href="txanpon-biurgailua.html"><button>Volver al formulario</button></a>';
        }
    ?>
  