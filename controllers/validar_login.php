<?php
// Conexión a la base de datos
$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";
$dbname = "bqbddtdn7lwusut3wzoi";

// Recuperar el usuario y la contraseña del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Crear una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para verificar el usuario y contraseña
    $sql = "SELECT * FROM Personal WHERE Usuario = '$usuario' AND Password = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario y contraseña válidos
        // Redirige a la página principal o a donde desees
        header("Location: principal.php");
        exit();
    } else {
        // Usuario y contraseña no válidos
        // Puedes agregar un mensaje de error o redirigir a una página de inicio de sesión fallida
        echo "Usuario o contraseña incorrectos.";
    }

    $conn->close();
}
?>
