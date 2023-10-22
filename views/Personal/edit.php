<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Personal - Editar Personal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <a href="index.php" class="btn btn-primary float-right">Atrás</a>

        <?php
        // Establecer la conexión a la base de datos (mismo código que en la página de ingreso)
        $servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
        $username = "ulncvazrxpnaveuu";
        $password = "3TzSsgZRxOYZC9YIB1dz";
        $dbname = "bqbddtdn7lwusut3wzoi";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Verificar si se recibió un ID válido para editar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Obtener los datos actuales del personal
            $sql = "SELECT * FROM Personal WHERE idPersonal = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                // Mostrar el formulario de edición con los datos actuales
                echo '
                <h2>Editar Personal</h2>
                <form method="post" action="">
                    <input type="hidden" name="id" value="' . $row['idPersonal'] . '">
                    <div class="form-group">
                        <label for="Nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="' . $row['Nombre'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="Usuario">Usuario:</label>
                        <input type="text" class="form-control" name="usuario" value="' . $row['Usuario'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="text" class="form-control" name="password" value="' . $row['Password'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="ApellidoPat">Apellido Paterno:</label>
                        <input type="text" class="form-control" name="apellidopat" value="' . $row['ApellidoPat'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="ApellidoMat">Apellido Materno:</label>
                        <input type="text" class="form-control" name="apellidomat" value="' . $row['ApellidoMat'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="Fecha_Nacimiento">Fecha De Nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" value="' . $row['Fecha_Nacimiento'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono:</label>
                        <input type="text" class="form-control" name="telefono" value="' . $row['Telefono'] . '" required>
                    </div>
                    <div class="form-group">
                        <label for="Area">Área:</label>
                        <select class="form-control" name="idarea" required>
                            <option value="">Seleccionar Área</option>';

                // Obtener las categorías de personal
                $sql = "SELECT * FROM Area";
                $result = $conn->query($sql);
                $categories = array();

                if ($result->num_rows > 0) {
                    while ($category = $result->fetch_assoc()) {
                        $selected = ($category['IdArea'] == $row['IdArea']) ? "selected" : "";
                        echo '<option value="' . $category['IdArea'] . '" ' . $selected . '>' . $category['Nombre'] . '</option>';
                    }
                }

                echo '</select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>';

                // Procesar el formulario de edición
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Obtener datos del formulario
                    $nombre = $_POST['nombre'];
                    $usuario = $_POST['usuario'];
                    $password = $_POST['password'];
                    $apellidopat = $_POST['apellidopat'];
                    $apellidomat = $_POST['apellidomat'];
                    $fecha_nacimiento = $_POST['fecha_nacimiento'];
                    $telefono = $_POST['telefono'];
                    $idarea = $_POST['idarea'];
                    $id = $_POST['id'];

                    // Realizar la actualización en la base de datos
                    $sql = "UPDATE Personal SET Nombre = ?, Usuario = ?, Password = ?, ApellidoPat = ?, ApellidoMat = ?, Fecha_Nacimiento = ?, Telefono = ?, IdArea = ? WHERE idPersonal = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssisi", $nombre, $usuario, $password, $apellidopat, $apellidomat, $fecha_nacimiento, $telefono, $idarea, $id);

                    if ($stmt->execute()) {
                        echo '<div class="alert alert-success">El personal ha sido actualizado correctamente.</div>';
                        // Redirigir a la página principal después de 1 segundos (puedes ajustar el tiempo)
                        echo '<script>window.setTimeout(function() { window.location = "index.php"; }, 500);</script>';
                    } else {
                        echo '<div class="alert alert-danger">Error al actualizar el personal: ' . $conn->error . '</div>';
                    }

                    $stmt->close();
                }
            } else {
                echo '<div class="alert alert-danger">ID de personal no válido o no encontrado.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Falta el ID de personal para editar.</div>';
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
