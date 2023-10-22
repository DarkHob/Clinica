<?php
// Establecer la conexión a la base de datos
$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";
$dbname = "bqbddtdn7lwusut3wzoi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener el texto de búsqueda enviado por AJAX
$searchText = $_POST['query'];

// Realizar la consulta para buscar medicamentos que coincidan con el texto de búsqueda
$sql = "SELECT * FROM Personal WHERE Nombre LIKE '%$searchText%'";
$result = $conn->query($sql);

// Generar el HTML para los resultados de búsqueda
if ($result->num_rows > 0) {
    echo '<table class="table">
            <thead>
                <tr>
                <th>idPersonal</th>
                <th>Password</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>ApellidoPat</th>
                <th>ApellidoMat</th>
                <th>Fecha_Nacimiento</th>
                <th>Telefono</th>
                <th>IdArea</th>
                <th>Acciones</th>

                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
            <td>' . $row['idPersonal'] . '</td>
            <td>' . $row['Password'] . '</td>
            <td>' . $row['Usuario'] . '</td>
            <td>' . $row['Nombre'] . '</td>
            <td>' . $row['ApellidoPat'] . '</td>
            <td>' . $row['ApellidoMat'] . '</td>
            <td>' . $row['Fecha_Nacimiento'] . '</td>
            <td>' . $row['Telefono'] . '</td>
            <td>' . $row['IdArea'] . '</td>

                <td>
                    <a href="edit.php?id=' . $row['idPersonal'] . '">Editar</a> |
                    <a href="index.php?delete=' . $row['idPersonal'] . '">Borrar</a>
                </td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo '<p>No se encontraron medicamentos.</p>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>