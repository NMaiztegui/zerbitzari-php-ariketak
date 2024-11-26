<?php 

    $hostname='localhost';
    $usuario='root';
    $password='Admin123';
    $basededatos='php';

    $mysqli = new mysqli($hostname, $usuario, $password,$basededatos);
    if ( mysqli_connect_errno() ) {
    echo "Error de conexión a la BD: ".mysqli_connect_error();
    exit();
    }


    $query="SELECT * FROM etxe_bizitzak";
    $resultado=$mysqli->query($query)
          or die ($mysqli ->error. " en la línea ".(__LINE__‐1));

    $numregistros=$resultado ->num_rows;
    echo "<p>El número de pisos es: ",$numregistros,".</p>";
    echo "<table border=2><tr><th>mota</th> <th>zonaldea</th> <th>helbidea</th>
    <th>logelak</th> <th>prezioa</th> <th>tamaina</th> <th>extrak</th> <th>irudia</th> <th>oharrak</th></tr>";
    while ($registro = $resultado ->fetch_assoc()) {
        echo "<tr>";
        foreach ($registro as $campo)
        echo "<td>",$campo, "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $resultado ->free();
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Irudi geometrikoen azalera</title>
</head>
<body>
   
    <p>Sartu zenbaki bat, zenbaki horri buelta emateko</p>
    <form action="alderantzikatu.php" method="post">
        <label for="zenbaki">Zenbakia</label>
        <input type="number" id="zenbaki" name="zenbaki" >
      
       
        <button type="submit">Erantzun</button>
    </form>
</body>
</html>