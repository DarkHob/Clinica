<?php


$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";  
$username = "ulncvazrxpnaveuu";            
$password = "3TzSsgZRxOYZC9YIB1dz";          
$database = "bqbddtdn7lwusut3wzoi"; 


$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idcat= $_POST["idcat"];
    $idprov= $_POST["idprov"];
    $idunidad= $_POST["idunidad"];
    $nombre= $_POST["nombre"];
    $descripcion= $_POST["descripcion"];
    $precio= $_POST["precio"];
    $cantidad_stock= $_POST["cantidad_stock"];
    $fecha_vencimiento= $_POST["fecha_vencimiento"];
    $Dosis= $_POST["Dosis"];


    
    $sql = "INSERT INTO Medicamentos (idcat, idprov, idunidad, nombre, descripcion, precio, cantidad_stock, fecha_vencimiento, Dosis) 
        VALUES ('$idcat', '$idprov', '$idunidad', '$nombre', '$descripcion', '$precio', '$cantidad_stock','$fecha_vencimiento','$Dosis')";

    if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error al registrar: " . $conn->error;
}
}


$conn->close();
?>