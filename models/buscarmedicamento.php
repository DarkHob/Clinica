<?php
$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";
$database = "bqbddtdn7lwusut3wzoi";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener el texto de búsqueda enviado por AJAX
$searchText = $_POST['query'];

// Realizar la consulta para buscar medicamentos que coincidan con el texto de búsqueda
$sql = "SELECT Nombre, Descripcion FROM Medicamentos WHERE Nombre LIKE '%$searchText%'";
$result = $conn->query($sql);

// Generar el HTML para los resultados de búsqueda
if ($result->num_rows > 0) {
    echo '<div class="resultado titulo">
            <span class="nombre">Nombre</span>
            <span class="descripcion">Descripción</span>
            <span class="accion">Acción</span>
          </div>';

    while ($row = $result->fetch_assoc()) {
        echo '<div class="resultado">';
        echo '<span class="nombre">' . $row['Nombre'] . '</span>';
        echo '<span class="descripcion">' . $row['Descripcion'] . '</span>';
        echo '<button class="btn btn-primary agregar" onclick="agregarMedicamento(this)">Añadir</button>';
        echo '</div>';
    }
} else {
    echo '<div class="resultado">No se encontraron medicamentos.</div>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
