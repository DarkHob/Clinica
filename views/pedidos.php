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
                <label for="fecha">Filtrar por Fecha:</label>
                <input type="date" name="fecha" class="form-control">
            </div>
            <div class="form-group">
                <label for="estado">Filtrar por Estado:</label>
                <select name="estado" class="form-control">
                    <option value="">Todos</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Entregado">Entregado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
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

        $whereClause = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fecha = $_POST['fecha'];
            $estado = $_POST['estado'];

            if (!empty($fecha)) {
                $whereClause = "WHERE fecha = '$fecha'";
            }

            if (!empty($estado)) {
                if (empty($whereClause)) {
                    $whereClause = "WHERE EstadoPedido = '$estado'";
                } else {
                    $whereClause .= " AND EstadoPedido = '$estado'";
                }
            }
        }

        // Consulta SQL para obtener los datos de la tabla Pedidos con filtro
        $query = "SELECT idPedido, fecha, IdMedicamentos, Cantidad, NotasAdicionales, EstadoPedido FROM Pedidos $whereClause";

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
            echo "No se encontraron pedidos que cumplan con los criterios de filtro.";
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
