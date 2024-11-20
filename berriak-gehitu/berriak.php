<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
        // aunque se haya usado required en el html, comprobamos que los campos han sido si o si rellenados
        if (!empty($_POST['izenburu']) && !empty($_POST['textua']) ) { //comprobar que al hacer el envio los campos no esten vacios
            // Todos los campos tienen valores no vacíos
            $izenbu = htmlspecialchars($_POST['izenburu']);
            $info = htmlspecialchars($_POST['textua']);
            $kat = htmlspecialchars($_POST['kategoria']);
            
            if (!empty($_FILES['image']['name'])){
                $img= $_FILES['image']['name'];
               
            }else{
                echo 'no se ha enviado ninguna imagen <br>';
            }
            
            echo 'los campos obligatorios han sido rellenados<br>';

            echo'<ul><li><p><strong>Izenburua</strong></p></li></ul>';
        }else{
              echo 'los campos izenburu y testua no han sido rellenados<br>';
        }
           
          
           
           echo '<br><br>';
           echo '<a href="berriak-index.html"><button>Volver al formulario</button></a>';
    }
 ?>
  