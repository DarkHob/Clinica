<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Interfaz</title>
    
</head>
<body>
<div class="container">
        <div class="header">
        <a href="principal.php">Atras</a>
        <p></p>
        <div style="text-align: center;">
            <img src="https://th.bing.com/th/id/OIG.eZNxmsddMdHKVKmO1NZ3?pid=ImgGn" alt="Logo" width="115px" height="115px">
        </div>
            <h1>Registro de Medicamentos</h1>
        </div>
        <form action="../config/coneccion.php" method="post" class="form-container">


                <label for="idcat">Categoria:</label>
                <select name="idcat" id="idcat">
                <option value="1">TABLETAS</option>
                <option value="2">INYECTABLES</option>
                <option value="3">COMPRIMIDOS</option>
                <option value="4">PASTAS</option>
                <option value="5">GELES</option>
             </select>
               
             
                <label for="idprov">Proveedor:</label>
                <select name="idprov" id="idprov">
                <option value="1">INTI</option>
                <option value="2">LAFAR</option>
                <option value="3">BAYER</option>
                <option value="4">IFA</option>
                <option value="5">TECHNOPHARMA</option>
                <option value="6">BAGO</option>
                </select>


                <label for="idunidad">Unidad:</label>
                <select name="idunidad" id="idunidad">
                <option value="1">Mililitro</option>
                <option value="2">Gramos</option>
                <option value="3">Tabletas</option>
                <option value="4">Litros<option>
                </select>





            <label for="nombre">nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="descripcion">descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" required>

            <label for="precio">precio:</label>
            <input type="number" name="precio" id="precio" required>

            <label for="cantidad_stock">Cantidad inicial en stock:</label>
            <input type="number" name="cantidad_stock" id="cantidad_stock" required>

            <label for="Dosis">Dosis recomendada por unidad</label>
            <input type="text" name="Dosis" id="Dosis">

            <label for="fecha_vencimiento">Fecha de vencimiento:</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" required>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>