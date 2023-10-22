<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Pedidos</title>
    <!-- Incluye las hojas de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Pedidos</h1>
        <form method="post">
    <div class="form-group">
        <label for="fecha">Filtrar por fecha:</label>
        <input type="date" name="fecha" class="form-control">
    </div>
    <div class="form-group">
        <label for="estado">Filtrar por estado:</label>
        <select name="estado" class="form-control">
            <option value="Pendiente">Pendiente</option>
            <option value="Entregado">Entregado</option>
        </select>
    </div>
    <input type="submit" value="Filtrar" class="btn btn-primary">
</form>

        <?php
        $host = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
        $database = "bqbddtdn7lwusut3wzoi";
        $username = "ulncvazrxpnaveuu";
        $password = "3TzSsgZRxOYZC9YIB1dz";

        // Crear una conexión a la base de datos
        $conexion = new mysqli($host, $username, $password, $database);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        if (isset($_POST['entregar'])) {
            // Cambiar el estado del pedido a "Entregado"
            $idPedido = $_POST['idPedido'];
            $updateQuery = "UPDATE Pedidos SET EstadoPedido = 'Entregado' WHERE idPedido = $idPedido";
            if ($conexion->query($updateQuery) === TRUE) {
                echo "Pedido entregado correctamente.";
            } else {
                echo "Error al entregar el pedido: " . $conexion->error;
            }
        }

        if (isset($_POST['revertir'])) {
            // Revertir el estado del pedido a "Pendiente"
            $idPedido = $_POST['idPedido'];
            $updateQuery = "UPDATE Pedidos SET EstadoPedido = 'Pendiente' WHERE idPedido = $idPedido";
            if ($conexion->query($updateQuery) === TRUE) {
                echo "Pedido revertido a Pendiente correctamente.";
            } else {
                echo "Error al revertir el pedido: " . $conexion->error;
            }
        }

        // Consulta SQL para obtener los datos de la tabla Pedidos con filtros
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
        $estado = isset($_POST['estado']) ? $_POST['estado'] : "";

        $query = "SELECT idPedido, fecha, IdMedicamentos, Cantidad, NotasAdicionales, EstadoPedido FROM Pedidos WHERE 1";

        if (!empty($fecha)) {
            $query .= " AND fecha = '$fecha'";
        }

        if (!empty($estado)) {
            $query .= " AND EstadoPedido = '$estado'";
        }

        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID Pedido</th>';
            echo '<th>Fecha</th>';
            echo '<th>ID Medicamento</th>';
            echo '<th>Cantidad</th>';
            echo '<th>Notas Adicionales</th>';
            echo '<th>Estado del Pedido</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['idPedido'] . '</td>';
                echo '<td>' . $row['fecha'] . '</td>';
                echo '<td>' . $row['IdMedicamentos'] . '</td>';
                echo '<td>' . $row['Cantidad'] . '</td>';
                echo '<td>' . $row['NotasAdicionales'] . '</td>';
                echo '<td><span style="color: ' . ($row['EstadoPedido'] == 'Pendiente' ? 'red' : 'green') . ';">' . $row['EstadoPedido'] . '</span></td>';
                echo '<td>';
                if ($row['EstadoPedido'] == 'Pendiente') {
                    echo '<form method="post">';
                    echo '<input type="hidden" name="idPedido" value="' . $row['idPedido'] . '">';
                    echo '<input type="submit" name="entregar" value="Entregar" class="btn btn-success">';
                    echo '</form>';
                } elseif ($row['EstadoPedido'] == 'Entregado') {
                    echo '<form method="post">';
                    echo '<input type="hidden" name="idPedido" value="' . $row['idPedido'] . '">';
                    echo '<input type="submit" name="revertir" value="Revertir" class="btn btn-warning">';
                    echo '</form>';
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No se encontraron pedidos con los filtros seleccionados.";
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </div>

    <!-- Incluye los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
