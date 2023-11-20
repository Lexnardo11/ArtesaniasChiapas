<?php
include '../Modelo/conexionPDO.php';

$conexion = new Conexion();

// Función para subir la imagen y obtener la ruta
function subirImagen($nombre, $imagen)
{
    // Directorio donde se almacenarán las imágenes (ajusta la ruta según tu estructura)
    $directorioImagenes = '../imagen/';

    // Nombre único para la imagen
    $nombreImagen = $nombre . '_' . time() . '_' . basename($imagen['name']);

    // Ruta completa de la imagen
    $rutaImagen = $directorioImagenes . $nombreImagen;

    // Mover la imagen al directorio de imágenes
    move_uploaded_file($imagen['tmp_name'], $rutaImagen);

    return $nombreImagen; // Devuelve el nombre único de la imagen
}

// Verificar si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'editar') {
    $id = $_POST['idProducto'];
    $nombre = $_POST['nombreProducto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precioProducto'];
    $cantidad = $_POST['ExistenciasProducto'];

    // Manejar la carga de una nueva imagen
    $rutaImagen = $producto['imagenProducto']; // Por defecto, mantén la imagen existente

    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] === UPLOAD_ERR_OK) {
        $rutaImagen = subirImagen($nombre, $_FILES['imagenProducto']);
    }

    // Actualizar la base de datos
    $query = $conexion->prepare("UPDATE t_productos SET nombreProducto=?, descripcion=?, precioProducto=?, existenciasProducto=?, imagenProducto=? WHERE idProducto=?");
    $query->execute([$nombre, $descripcion, $precio, $cantidad, $rutaImagen, $id]);

    header("Location: ../../index.php");
    exit();
}

// Obtener los detalles del producto a editar
$id = isset($_GET['idProducto']) ? $_GET['idProducto'] : null;

if (!$id || !is_numeric($id) || $id <= 0) {
    echo "ID de producto no válido.";
    exit();
}

$query = $conexion->prepare("SELECT * FROM t_productos WHERE idProducto = ?");
$query->execute([$id]);
$producto = $query->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    echo "Producto no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
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
    <h2>Editar Producto</h2>

    <!-- ... -->
<form method="post" action="editar.php" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" name="id" value="<?= $producto['id'] ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required><?= $producto['descripcion'] ?></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" step="0.01" value="<?= $producto['precio'] ?>" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" value="<?= $producto['cantidad'] ?>" required><br>

    <!-- Campo de entrada de archivo para la nueva imagen -->
    <label for="imagen">Cambiar Imagen:</label>
    <input type="file" name="imagen" accept="image/*"><br>

    <button type="submit">Guardar Cambios</button>
</form>
<!-- ... -->

    <a href="../../index.php">Volver al Catálogo</a>
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







