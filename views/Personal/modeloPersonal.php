<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Personal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
 /* Estilo para los botones de "Editar" */
.btn-edit {
    padding: 5px 10px;
    border: 1px solid #007bff;
    background-color: #007bff;
    color: #fff;
    margin-right: 5px; /* Añade un margen derecho para separar los botones */
}

/* Estilo para los botones de "Borrar" */
.btn-delete {
    padding: 5px 10px;
    border: 1px solid #dc3545;
    background-color: #dc3545;
    color: #fff;
    margin-right: 5px; /* Añade un margen derecho para separar los botones */
}


    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                var searchText = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'post',
                    data: {query: searchText},
                    success: function(response){
                        $('#Personal').html(response);
                    }
                });
            });

            $('.btn-delete').click(function(e){
                e.preventDefault();
                var deleteUrl = $(this).attr('href');
                if (confirm("¿Estás seguro de eliminar este Personal?")) {
                    window.location.href = deleteUrl;
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Gestión de Personal</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="search" class="form-control" placeholder="Buscar Medicamento">
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a href="insert.php" class="btn btn-primary">Ingresar Personal</a>
            </div>
        </div>

        <div id="Personal">
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

            // Borrar Personal
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];

                $sql = "DELETE FROM Personal WHERE idPersonal = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">El Personal ha sido borrado correctamente.</div>';
                } else {
                    echo '<div class="alert alert-danger">Error al borrar el Personal: ' . $conn->error . '</div>';
                }

                $stmt->close();
            }

            // Mostrar la tabla de Personal
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

            $sql = "SELECT * FROM Personal";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
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


                        <td style="white-space: nowrap;">
                        <a href="edit.php?id=' . $row['idPersonal'] . '" class="btn btn-edit">Editar</a>
                        <a href="index.php?delete=' . $row['idPersonal'] . '" class="btn btn-delete">Borrar</a>
                        </td>
                    
                    </tr>';
                }
            } else {
                echo '<tr><td colspan="5">No se encontraron medicamentos.</td></tr>';
            }

            echo '</tbody></table>';

            // Cerrar la conexión a la base de datos
            $conn->close();
            ?>
        </div>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>