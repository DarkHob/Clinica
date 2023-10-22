<?php
// Actualiza las credenciales de la base de datos aquí
$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";
$database = "bqbddtdn7lwusut3wzoi";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$searchText = $_POST['medicamento'];

$sql = "SELECT Nombre FROM Medicamentos WHERE Nombre LIKE '%$searchText%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $medicamentos = array();
    while ($row = $result->fetch_assoc()) {
        $medicamentos[] = $row['Nombre'];
    }
    echo json_encode($medicamentos);
} else {
    echo "No se encontraron medicamentos.";
}

$conn->close();
?>
