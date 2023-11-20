<?php
include '../Modelo/conexionPDO.php';

$conexion = new Conexion();

// Procesar la eliminación cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se enviaron productos para eliminar
    if (isset($_POST['productos_eliminar'])) {
        $productosAEliminar = $_POST['productos_eliminar'];

        foreach ($productosAEliminar as $idProducto) {
            // Realizar la eliminación de cada producto
            $query = $conexion->prepare("DELETE FROM t_productos WHERE idProducto = :id");
            $query->bindParam(':id', $idProducto);
            $query->execute();
        }

        // Redirigir o mostrar un mensaje de éxito
        header('Location: ../../index.php'); // Cambia 'lista_productos.php' con la página a la que deseas redirigir
        exit();
    }
}

// Obtener la lista de productos
$query = $conexion->query("SELECT * FROM t_productos");
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        button {
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
            margin-right: 10px;
        }

        button:hover {
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
    <title>Eliminar Productos</title>
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
    <h2>Eliminar Productos</h2>
    
    <form method="post" action="">
        <?php foreach ($productos as $producto): ?>
            <label>
                <input type="checkbox" name="productos_eliminar[]" value="<?= $producto['idProducto']; ?>">
                <?= $producto['nombreProducto']; ?>
            </label>
            <br>
        <?php endforeach; ?>
        
        <button type="submit">Eliminar Seleccionados</button>
        <a href="../vista/tablaProductos.php"><button type="button">Cancelar</button></a>
    </form>
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



