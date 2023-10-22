<?php
// Establecer la conexión a la base de datos
$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";
$database = "bqbddtdn7lwusut3wzoi";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$medicamentos = $_POST['medicamento'];  // Ahora es un array
$cantidades = $_POST['cantidad'];
$notasAdicionales = $_POST['notas'];
$estadoPedido = "Pendiente";  // Estado del pedido

// Preparar una consulta para insertar datos en la tabla Pedidos
$sql = "INSERT INTO Pedidos (IdMedicamentos, Cantidad, NotasAdicionales, EstadoPedido) VALUES (?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Vincular parámetros
    $stmt->bind_param("siss", $medicamento, $cantidad, $notas, $estado);

    // Insertar datos en la tabla
    foreach ($medicamentos as $key => $medicamento) {
        $cantidad = $cantidades[$key];
        $notas = $notasAdicionales[$key];
        $estado = $estadoPedido;
        $stmt->execute();
    }

    // Cerrar la consulta
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}
// Función para obtener el ID de un medicamento en función del nombre
function obtenerIdMedicamento($nombreMedicamento) {
    // Realizar una consulta para obtener el ID del medicamento en función del nombre
    global $conn;

    $sql = "SELECT IdMedicamento FROM Medicamentos WHERE Nombre = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nombreMedicamento);
        $stmt->execute();
        $stmt->bind_result($idMedicamentos);

        // Obtener el resultado de la consulta
        $stmt->fetch();
        $stmt->close();

        return $idMedicamento;
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
        return null;
    }
}

?>
