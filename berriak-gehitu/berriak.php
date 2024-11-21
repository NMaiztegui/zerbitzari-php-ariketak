<?php
    //definir una clase para los datos del formulario

    class busqueda{
        public $izenburu;
        public $info;
        public $kat;
        public $img;

        public function __construct($izenburu, $info, $kat, $img=null){
            $this->izenburu = $izenburu;
            $this->info = $info;
            $this->kat = $kat;
            $this->img = $img;
        }

        public function erakutsi(){
            echo "<ul><li><strong>Izenburua:</strong>$this->izenburu </li>";
            echo "<li><strong>Testua:</strong>$this->info </li>";
            echo "<li><strong>Mota:</strong>$this->kat </li>";
            if ($this->img){
                echo "<li><strong>Irudia:</strong>$this->img </li></ul>";
            }else{
                echo "<li><strong>Irudia:</strong>ez dago irudirik </li></ul>";
            }
           
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $upload="uploads/";

        // aunque se haya usado required en el html, comprobamos que los campos han sido si o si rellenados
        if (!empty($_POST['izenburu']) && !empty($_POST['textua']) ) { //comprobar que al hacer el envio los campos no esten vacios
            // Todos los campos tienen valores no vacíos
            $izenbu = htmlspecialchars($_POST['izenburu']);
            $info = htmlspecialchars($_POST['textua']);
            $kat = htmlspecialchars($_POST['kategoria']);
            
            //COMPROBAR QUE SE HA SUBIDO UN ARCHIVO EN EL CAMPO DE IMAGEN SIN PROBLEMAS
            // ISSET COMPRUBA QUE HAYA ALGO APARTE DE NULL
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK ){
                if (exif_imagetype( ($_FILES['image']['tmp_name'])) == IMAGETYPE_JPEG || exif_imagetype( ($_FILES['image']['tmp_name'])) == IMAGETYPE_PNG ){
                    // IRUDIARI IZEN BERRI BAT EMAN ALDI GUSTIETAN ARAZAOAK EKIDETZEKO
                    $targetFile = $upload . uniqid() . '-' . basename($_FILES['image']['name']); 
                    //IRUDIA TEMPORALIAN GORDE BAHRREAN FICHERO BATEAN GORDE DENBORA LUZEZ MANTENTZEKO ETA KUDEATU AHAL IZATEKO
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                        echo "El archivo ha sido subido y guardado correctamente.<br>";
                    } else {
                        echo "Hubo un error al mover el archivo.<br>";
                    }
                    $img=basename($targetFile);

               
                }else{
                    
                    echo 'no se ha enviado ninguna imagen png o jpg <br>';
                }
            }else{
                $img=null;
            }


            
            echo 'los campos obligatorios han sido rellenados<br>';

            $liburu= new busqueda($izenbu,$info,$kat,$img);
            $liburu->erakutsi();


            
        }else{
              echo 'los campos izenburu y testua no han sido rellenados<br>';
        }
           
          
           
           echo '<br><br>';
           echo '<a href="berriak-index.html"><button>Volver al formulario</button></a>';
    }
 ?>
  