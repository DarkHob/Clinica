<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIG.eZNxmsddMdHKVKmO1NZ3?pid=ImgGn" />
    <title>Adquisiciones</title>
    <?php
    require "../assets/css/StylePrincipal.php";

?>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="https://th.bing.com/th/id/OIG.eZNxmsddMdHKVKmO1NZ3?pid=ImgGn" alt="Logo">
        </div>
        <div class="hospital-name">
            CENTRO MEDICO INTEGRAL COCHABAMBA
        </div>
        <div class="sidebar-menu">
            <div class="menu-item">
            <a href="principal.php" class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/home.svg" alt="Icono Página Principal">
                    Página Principal
            </a>
            </div>
            <div class="menu-item">
                <button class="menu-button"><a href="insertarMedicamento.php">
                    <img class="menu-icon" src="../libraries/icons/Stock.svg" alt="Icono Stock">
                    Stock
                    </a>
                </button>
            </div>
            <div class="menu-item">
                <a href="Adquisiciones.php" class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/Adquisiciones.svg" alt="Icono Adquisiciones">
                    Adquisiciones
                </a>
            </div>
            <div class="menu-item">
            <a href="vistaPedidos.php" class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/Order.svg" alt="Icono Ordenes">
                    Pedidos
                </a>
            </div>
            <div class="menu-item">
                <button class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/Historial.svg" alt="Icono Historial de Entregas">
                    Historial de Entregas
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/Folder.svg" alt="Icono Documentos">
                    Documentos
                </button>
            </div>
        </div>
    </div>
    <div style="margin-left: 280px;">

    <div class="container">
    <div class="header">
        <?php
        require "../assets/css/StyleAdqui.php";
        ?>
</div>
<?php
require '../controllers/proveedores.php';
?>

<script>
    const selectedMedicamentos = [];

    function searchMedicamentos() {
        const searchTerm = document.getElementById('searchMedicamento').value;
        // Realiza la búsqueda de medicamentos y muestra los resultados en "resultados"
        // Debes implementar la lógica para cargar los resultados aquí
    }

    function agregarMedicamento(medicamento) {
        selectedMedicamentos.push(medicamento);
        updateSelectedMedicamentos();
    }

    function updateSelectedMedicamentos() {
        const selectedMedicamentosList = document.getElementById('selectedMedicamentos');
        selectedMedicamentosList.innerHTML = '';

        selectedMedicamentos.forEach((medicamento) => {
            const listItem = document.createElement('li');
            listItem.textContent = medicamento;
            selectedMedicamentosList.appendChild(listItem);
        });
    }
</script>


    </div>

  
</body>
</html>
