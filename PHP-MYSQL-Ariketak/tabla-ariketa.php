<?php 

    $hostname='localhost';
    $usuario='root';
    $password='Admin123';
    $basededatos='php';
//conexion
    $mysqli = new mysqli($hostname, $usuario, $password,$basededatos);
    if ( mysqli_connect_errno() ) {
    echo "Error de conexión a la BD: ".mysqli_connect_error();
    exit();
    }

    class etxeak{
        public $mota;
        public $zonaldea;
        public $helbidea;
        public $logelak;
        public $prezioa;
        public $tamaina;
        public $extrak;
        public $irudia;
        public $oharra;

        public function __construct($mota,$zonalde,$helbidea,$logelak,$prezioa,$tamaina,$extrak=null,$irudia=null,$oharra=null){
            $this->mota=$mota;
            $this->zonaldea=$zonalde;
            $this ->helbidea=$helbidea;
            $this->logelak=$logelak;
            $this->prezioa=$prezioa;
            $this->tamaina=$tamaina;
            $this->extrak=$extrak;
            $this->irudia=$irudia;
            $this->oharra=$oharra;
        }
        public function sartutakoa(): void{
            echo "<ul><li><strong>Mota:</strong>$this->mota </li>
            <li><strong>Zonaldea:</strong>$this->zonaldea </li>
            <li><strong>Helbidea:</strong>$this->helbidea </li>
            <li><strong>Logelak:</strong>$this->logelak </li>
            <li><strong>Prezioa:</strong>$this->prezioa </li>
            <li><strong>Tamaina:</strong>$this->tamaina </li>
            <li><strong>Extrak:</strong>$this->extrak </li>
            <li><strong>Irudia:</strong>$this->irudia </li>
             <li><strong>Oharra:</strong>$this->oharra </li>";
            
        }

        public function sartu_datuak() {
            $query = "INSERT INTO etxe_bizitzak (mota, zonaldea, helbidea,  logelak, prezioa, tamaina, extrak, irudia, oharrak) 
              VALUES ('$this->mota', '$this->zonaldea ', '$this->helbidea', '$this->logelak', '$this->prezioa', '$this->tamaina', '$this->extrak', $this->irudia', '$this->oharra')";

              return $query;

            
        }

    }

// comprobar si se han enviado datos primero 
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

        $newhouse = new etxeak($mota,  $zonalde,$helbide,$logela,$prezio,$tamaina,$extra,$img,$oharra );
        
        
        $querry=$newhouse->sartu_datuak();
        // si los adatos se han subido
        if ($mysqli->query($query) === TRUE) {
            echo "<p>¡Casa agregada correctamente!</p>";
            //pantailaratu datuak 
            $newhouse->sartutakoa();
            //tablara bueltatzeko botoira
            echo "[ <a href='".$_SERVER['PHP_SELF']."'><button>Tablara bueltatu</button></a> ]";
        }else{
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }



    }else{
        //contsulta
    $query="SELECT  mota,zonaldea, helbidea,logelak, prezioa, tamaina,extrak, irudia, oharrak  FROM etxe_bizitzak order by prezioa";
    $resultado=$mysqli->query($query)
          or die ($mysqli ->error. " en la línea ".(__LINE__‐1));
// cuantos elementos  hay en la tabal ahora mismo
    $numregistros=$resultado ->num_rows;
    echo "<p>El número de pisos es: ",$numregistros,".</p>";

    echo "<table border=2><tr><th>mota</th> <th>zonaldea</th> <th>helbidea</th>
    <th>logelak</th> <th>prezioa</th> <th>tamaina</th> <th>extrak</th> <th>irudia</th> <th>oharrak</th></tr>";

    //toma una fila de resultado(un objeto con todos los elementos en la tabla) y lo guarda en registro como un arrai asociativo
    while ($registro = $resultado ->fetch_assoc()) {
        echo "<tr>";
        // coger el valor de cada key del array
        foreach ($registro as $campo=>$valor)
        // comprobar si el key es irudi, si lo es convertirlo en una url
        if ($campo == "irudia"){
            // coger  la imagen desde la carpeta img en lokal
            $url="img/$valor";
            echo"<td><a href='$url' target='_blank'>$valor</a></td>";
        }else{
            echo "<td>",$valor, "</td>";
        }
     
        echo "</tr>";
    }
    echo "</table>";

    $resultado ->free();

    echo "<a href='".$_SERVER['PHP_SELF']."?action=add'><button>Sartu etxe berria</button></a>";

    }

    $mysqli->close();
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> etxebiziten tabla</title>
</head>
<style>
   table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
</style>
<body>
    <?php
    if ($_GET['action'] == 'add') {
    ?>
    <p>Sartu etxe berri bat</p>
    <form  method="post">
        <label for="mota">Mota:</label>
        <select name="mota">
            <option value="Pisua" selected>Pisua</option>
            <option value="Txaleta" selected>Txalet</option>
            <option value="Etxea" selected>Etxea</option>
        </select>
        <label for="zonaldea">Zonaldea:</label>
        <select name="zonaldea">
            <option value="Alde zaharra" selected>Alde zaharra</option>
            <option value="Deustu" selected>Deustu</option>
            <option value="Atxuri" selected>Atxuri</option>
            <option value="Miribilla" selected>Miribilla</option>
        </select>
        <label for="helbidea">Helbiea:</label>
        <input type="text" id="helbidea" name="helbidea" >
        <label for="logelak">Logelak:</label>
        <input type="number" id="logelak" name="logelak" >
        <label for="prezioa">Prezioa:</label>
        <input type="number" id="prezioa" name="prezioa" >
        <label for="tamaina">Tamaina:</label>
        <input type="number" id="tamaina" name="tamaina" >
        <label for="zonaldea">Zonaldea:</label>
        <select name="extrak">
            <option value="Igerilekua" selected>Igerilekua</option>
            <option value="Lorategia" selected>Lorategia</option>
            <option value="Garajea" selected>Garajea</option>
        </select>
        <label for="irudia">Irudia:</label>
        <input type="file" id="irudia" name="irudia" accept="image/jpeg, image/png">
        <label for="helbidea">Oharra:</label>
        <input type="text" id="helbidea" name="helbidea" >
       
        <button type="submit">Erantzun</button>
    </form>
    <?php
    }
    ?>
</body>
</html>