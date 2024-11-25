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