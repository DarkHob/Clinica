<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
     <link rel="shortcut icon" href="https://th.bing.com/th/id/OIG.eZNxmsddMdHKVKmO1NZ3?pid=ImgGn" />
    <title>Login</title>
    <?php
    require "../assets/css/StylePrincipal.php";
    ?>
</head>
<body>
    <div style="position: relative; background: linear-gradient(180deg, #19A7CE 0%, #19A7CE 29%, #146C94 100%); height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div style="width: 400px; height: 400px; position: relative; background: linear-gradient(0deg, white 0%, white 100%), linear-gradient(0deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%); box-shadow: 0px 6px 6px 7px rgba(0, 0, 0, 0.25); border-radius: 40px; display: flex; flex-direction: column; align-items: center;">
            <div style="width: 100px; height: 100px; margin-top: 25px;">
                <img style="width: 100%; height: 100%; border-radius: 50%;" src="https://th.bing.com/th/id/OIG.eZNxmsddMdHKVKmO1NZ3?pid=ImgGn" />
            </div>
            <div style="width: 334px; margin-top: 30px; display: flex; flex-direction: column; align-items: center;">
                <h2 style="color: #088395; font-size: 24px; font-weight: 500; margin-bottom: 20px;">Inicio de Sesión</h2>
                <div style="width: 80%; margin-bottom: 15px;">
                    <input type="text" name="Usuario" placeholder="Usuario" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                </div>
                <div style="width: 80%; margin-bottom: 15px;">
                    <input type="password" name="contrasena" placeholder="Contrasena" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                </div>
                <!--<form action="../controllers/validar_login.php" method="post" class="form-container">  Metodo por hacer funcionar--> 
                
                <button onclick="window.location.href = 'principal.php'" style="background-color: #0A4D68; color: #FFF; padding: 10px 20px; border: none; border-radius: 15px; cursor: pointer;">INGRESAR</button>
            </div>
        </div>
    </div>
</body>
</html>
