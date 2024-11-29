<?php
$conexion = new mysqli("localhost", "root", "Admin123", "php");
// si la conexion falla que salga este error
if ($conexion->connect_errno) {
    die("Errorea: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
}

$query = "SELECT mota,zonaldea, helbidea,logelak, prezioa, tamaina,extrak, irudia, oharrak  FROM etxe_bizitzak order by prezioa";
//ejecuta en la seleccion en la base de datos
$result = $conexion->query($query);

if (!$result) {
    die("Errorea kontsultan: " . $conn->error);
}

$conexion->close();
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
</style>
<body>
<?php
 
 $numregistros=$result ->num_rows;

 echo"Se han encontrado $numregistros casas";

?>
    <table>
        <thead>
            <tr>
                <th>Mota</th>
                <th>Zonaldea</th>
                <th>Helbidea</th>
                <th>Logelak</th>
                <th>Prezioa (€)</th>
                <th>Tamaina (m²)</th>
                <th>Extrak</th>
                <th>Irudia</th>
                <th>Oharrak</th>
                <th>Ezabatu</th>
            </tr>
        </thead>
        <tbody>
  
    <?php
        //ejecutar el while mientras se encuentren casas
        while ($registro = $result ->fetch_assoc()) {
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
        echo "</tbody><br>  </table>";


    ?>
    <a href="form.php"><button>Sartu Berria</button></a>
</body>
</html>