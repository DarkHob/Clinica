<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Personal - Ingresar Personal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <a href="index.php" class="btn btn-primary float-right">Atrás</a>

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

        // Obtener las areas 
        $sql = "SELECT * FROM Area";
        $result = $conn->query($sql);
        $categories = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[$row['IdArea']] = $row['Nombre'];
            }
        }

        // Mostrar formulario de ingreso de Personal
        echo '
        <h2>Ingresar Personal</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="Usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                 <label for="ApellidoPat">Apellido Paterno:</label>
                 <input type="text" class="form-control" id="apellidopat" name="apellidopat" required>
            </div>

            <div class="form-group">
                 <label for="ApellidoMat">Apellido Materno:</label>
                 <input type="text" class="form-control" id="apellidomat" name="apellidomat" required>
            </div>


             <div class="form-group">
                    <label for="Fecha_Nacimiento">Fecha De Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
              </div>

            <div class="form-group">
                 <label for="Telefono">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="Area">Area:</label>
                <select class="form-control" id="idarea" name="idarea" required>
                    <option value="">Seleccionar Area</option>';

        foreach ($categories as $categoryId => $categoryName) {
            echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
        }

        echo '</select>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>';

        // Procesar el formulario de ingreso de personal
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $apellidopat = $_POST['apellidopat'];
            $apellidomat = $_POST['apellidomat'];
            $telefono = $_POST['telefono'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $idarea = $_POST['idarea'];


            // Validar y formatear la fecha de nacimiento (suponiendo que se ingresa en formato "dd/mm/yyyy")
             $fecha_nacimiento = date("Y-m-d", strtotime(str_replace('/', '-', $fecha_nacimiento)));

            $sql = "INSERT INTO Personal (Nombre, Usuario, Password, ApellidoPat, ApellidoMat, Fecha_Nacimiento, Telefono, IdArea) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssis", $nombre, $usuario, $password, $apellidopat, $apellidomat, $fecha_nacimiento, $telefono, $idarea);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">El personal ha sido ingresado correctamente.</div>';

                 // Redirigir a la página principal después de 1 segundos (puedes ajustar el tiempo)
                    echo '<script>window.setTimeout(function() { window.location = "index.php"; }, 500);</script>';

            } else {
                echo '<div class="alert alert-danger">Error al ingresar el medicamento: ' . $conn->error . '</div>';
            }

            $stmt->close();
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>