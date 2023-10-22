<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIG.eZNxmsddMdHKVKmO1NZ3?pid=ImgGn" />
    <title>Pedidos</title>
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
                <button class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/home.svg" alt="Icono Página Principal">
                    Página Principal
                </button>
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
                <button class="menu-button">
                    <img class="menu-icon" src="../libraries/icons/Order.svg" alt="Icono Entregas">
                    Pedidos
                </button>
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
                    Personal
                </button>
            </div>
        </div>
        <!-- Icono de Cerrar Sesión en la parte inferior -->
        <div class="logout-button">
            <a href="index.php">
            <img class="logout-icon" src="../libraries/icons/logout.png" alt="Icono Cerrar Sesión">
            <span>Cerrar Sesión</span>
            </a>
        </div>
    </div>
    <div style="margin-left: 10px;">
        <div class="divider"></div>
        <div class="container" style="margin-left: 380px; margin-right: 70px;">
        <?php
    require "ped.php";
    ?>
        </div>
        
    </div>
</body>
</html>
