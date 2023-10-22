<?php
$servername = "bqbddtdn7lwusut3wzoi-mysql.services.clever-cloud.com";
$username = "ulncvazrxpnaveuu";
$password = "3TzSsgZRxOYZC9YIB1dz";
$dbname = "bqbddtdn7lwusut3wzoi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT Nombre FROM Proveedor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/StyleAdqui.php">
</head>

<body>
<div class="container">
    <div class="header">
        <h1>Adquisiciones</h1>
    </div>
    <form method="post" class="form-container">
        <!-- Mostrar los nombres de los proveedores -->
        <div id="resultados">
            <label for="proveedores">Selecciona un proveedor:</label>
            <select name="proveedores" id="proveedores">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["Nombre"] . '">' . $row["Nombre"] . '</option>';
                    }
                }
                ?>
            </select>
            <!-- Reemplaza este botón "Agregar Fila" -->
            <button type="button" onclick="agregarFila()" style="float:left;">Guardar Fila</button>
        </div>

        <ul id="medicamentos" class="styled-list">
            <li class="styled-list-item">
                <div class="list-item-content">
                    <span class="list-item-id">ID</span>
                    <span class="list-item-field">Nombre del Medicamento</span>
                    <span class="list-item-field">Volumen</span>
                    <span class="list-item-field">Cantidad</span>
                </div>
            </li>
        </ul>

        <div class="btn-container">
            <button type="button" onclick="generarArchivoTexto()" style="float: right;">Generar Archivo de Texto</button>
        </div>
    </form>
</div>

</body>

<script>
    let nextID = 1; // ID inicial

    function agregarFila() {
        const lista = document.getElementById('medicamentos');
        const listItem = document.createElement('li');
        listItem.className = 'styled-list-item';
        listItem.innerHTML = `
            <div class="list-item-content">
                <span class="list-item-id">${nextID}</span>
                <span class="list-item-field" contenteditable="true"></span>
                <span class="list-item-field" contenteditable="true"></span>
                <span class="list-item-field" contenteditable="true"></span>
            </div>
        `;
        lista.appendChild(listItem);
        nextID++; // Incrementar el ID

        // Hacer scroll hacia la nueva fila
        listItem.scrollIntoView({ behavior: 'smooth' });
    }

    function generarArchivoTexto() {
    // Obtener el valor del proveedor seleccionado
    const proveedor = document.getElementById('proveedores').value;

    // Obtener los valores de los medicamentos
    const medicamentoItems = document.querySelectorAll('#medicamentos .list-item-field');
    const medicamentos = [];

    medicamentoItems.forEach(item => {
        medicamentos.push(item.textContent);
    });

    // Crear una tabla con los datos
    let contenido = `Proveedor\tNombre del Medicamento\tVolumen\tCantidad\n`;
    medicamentos.forEach(medicamento => {
        const [nombre, volumen, cantidad] = medicamento.split('\t');

        // Validar y reemplazar campos en blanco con un valor predeterminado
        const nombreMedicamento = nombre || 'Sin Nombre';
        const volumenMedicamento = volumen || 'Sin Volumen';
        const cantidadMedicamento = cantidad || 'Sin Cantidad';

        contenido += `${proveedor}\t${nombreMedicamento}\t${volumenMedicamento}\t${cantidadMedicamento}\n`;
    });

    // Crear un Blob (objeto binario) con el contenido
    const blob = new Blob([contenido], { type: "text/plain" });

    // Crear una URL para el Blob
    const url = URL.createObjectURL(blob);

    // Crear un elemento de enlace para la descarga
    const a = document.createElement('a');
    a.href = url;
    a.download = "datos.txt"; // Nombre del archivo de texto
    a.click();

    // Liberar la URL del Blob
    URL.revokeObjectURL(url);
}


</script>

