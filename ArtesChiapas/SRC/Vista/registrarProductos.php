<?php
include '../Modelo/conexionPDO.php';
include '../Controlador/subirImagen.php';

$conexion = new Conexion();

$rutaImagen = ''; // Inicializa la variable

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Lógica para procesar y subir la imagen
    if (isset($_FILES['imagen'])) {
        // Llama a la función subirImagen y obtén la ruta de la imagen
        $rutaImagen = subirImagen($conexion, $nombre, $descripcion, $precio, $cantidad, $_FILES['imagen']);
    }

    // Verificar si se subió la imagen correctamente
    if ($rutaImagen) {
        // Insertar en la base de datos
        $query = $conexion->prepare("INSERT INTO t_productos (nombreProducto,descripcion,existenciasProducto,precioProducto,imagenProducto) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$nombre, $descripcion, $precio, $cantidad, $rutaImagen]);

        header("Location: ../../index.php");
        exit();
    } else {
        echo "Error al subir la imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            background: url();
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 5px;
            height: 235px;
            width: 100%;
            box-sizing: border-box;
        }

        #titulo {
            margin: 20px;
            font-family: 'italic';
            font-weight: normal;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input,
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #45a049;
        }

        footer {
            float: left;
            position: relative;
            bottom: 0;
            width: 100%;
            box-sizing: border-box;
            background-color: #adadad;
            padding-top: 10px;
            text-align: center;
        }
    </style>
    <title>Agregar Producto</title>
</head>
<body>
<header>
        <div id="titulo">
            <p style="font-size: 100px;">Arte Chiapaneca</p>
        </div>
        <!-- El icono del carrito está alineado a la derecha del todo -->
        <a href="./src/vista/carritoCompra.php" class="carrito-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </header>
    <h2>Agregar Producto</h2>

    <form method="post" action="registrarProductos.php" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="agregar">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" step="0.01" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required><br>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" accept="image/*" required><br>
    <button type="submit">Agregar</button>
</form><br><br>
    <a href="verProductos.php">Ir al Catálogo</a><br>
    <a href="productos.php">Volver a Productos</a><br><br>
<footer>    <!--pie de pagina-->
        <div class=row>
            <div class="col">    
                <p>Boulevard Belisario Dominguez, Kilómetro 1081, Sin Número, Teran Tuxtla Gutierrez, Chiapas.</p>
                <p>&copy; 2020 Derechos reservado <p></p>
            </div>
            <div class="col">
                <p>Contactanos</p>
                <p>telefono: 555-555 <br> Correo: artechiapaneca@gmail.com</p>
            </div>
        </div>
    </footer>

</body>
</html>
