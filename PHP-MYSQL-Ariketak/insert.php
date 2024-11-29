
<?php
$conexion = new mysqli("localhost", "root", "Admin123", "php");
// si la conexion falla que salga este error
if ($conexion->connect_errno) {
    die("Errorea: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $upload="img/";

    $mota=$_POST['mota'];
    $zonalde=$_POST['zonaldea'];
    $helbide=$_POST['helbidea'];
    $logela=$_POST['logelak'];
    $prezio=$_POST['prezioa'];
    $tamaina=$_POST['tamaina'];
    $extra=$_POST['extrak'];
    
    $oharra=$_POST['oharra'];

    // comprobar que se ha enviado imagen 
    if (isset($_FILES['irudia']) && $_FILES['irudia']['error'] === UPLOAD_ERR_OK ){
    
            // IRUDIARI IZEN BERRI BAT EMAN ALDI GUSTIETAN ARAZAOAK EKIDETZEKO
            $targetFile = $upload. basename($_FILES['irudia']['name']); 
            //IRUDIA TEMPORALIAN GORDE BAHRREAN FICHERO BATEAN GORDE DENBORA LUZEZ MANTENTZEKO ETA KUDEATU AHAL IZATEKO
            if (move_uploaded_file($_FILES['irudia']['tmp_name'], $targetFile)) {
                echo "El archivo ha sido subido y guardado correctamente.<br>";
            } else {
                echo "Hubo un error al mover el archivo.<br>";
            }
            $img=basename($targetFile);

    }else{
        $img=null;
    }


    //insert datos
    $query = "INSERT INTO etxe_bizitzak (mota, zonaldea, helbidea,  logelak, prezioa, tamaina, extrak, irudia, oharrak) 
              VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $prepare = $conexion->prepare($query);

    $prepare->bind_param("ssssddsss", $mota, $zonalde, $helbide, $logela, $prezio, $tamaina, $extra, $img, $oharra);

   
 
   

}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> etxebiziten tabla</title>
</head>

<style>
     button{
        border: green solid 1px;
        border-radius: 9rem;
        background-color: green;
        color: white;
        height: 30px;
        width: auto;
        cursor: pointer;
        margin-top: 10px;
    }
    body{
        position: absolute;
        left: 40%;
    }
</style>
<body>
    <?php
    
        if( $prepare->execute()){
            echo "<ul><li><strong>Mota:</strong>$mota </li>
            <li><strong>Zonaldea:</strong>$zonalde </li>
            <li><strong>Helbidea:</strong>$helbide </li>
            <li><strong>Logelak:</strong>$logela </li>
            <li><strong>Prezioa:</strong>$prezio</li>
            <li><strong>Tamaina:</strong>$tamaina </li>
            <li><strong>Extrak:</strong>$extra </li>
            <li><strong>Irudia:</strong>$img </li>
            <li><strong>Oharra:</strong>$oharra </li>";
            
            echo "Etxe bizitza berria sartu da <br>";

            echo '<a href="index.php"><button>ikusi etxeak</button></a><br>';

            echo '<a href="form.php"><button>sartu berria</button></a>';
            $prepare->close();
        }else{
            echo "Errorea: " . $prepare->error;
        }

    ?>
</body>
</html>