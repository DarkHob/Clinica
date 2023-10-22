<?php
$host = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$database = "bqbddtdn7lwusut3wzoi";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
