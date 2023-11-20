<?php
include '../Modelo/conexionPDO.php';

$conexion = new Conexion();

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
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-height: 50px;
        }

        a, button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover, button:hover {
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
    <title>Lista de Productos</title>
</head>
<body>
<header>
        <div id="titulo">
            <p style="font-size: 100px;">Arte Chiapaneca</p>
        </div>

    </header>
    <h2>Lista de Productos</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['idProducto'] ?></td>
                <td><?= $producto['nombreProducto'] ?></td>
                <td><?= $producto['descripcion'] ?></td>
                <td><?= $producto['precioProducto'] ?></td>
                <td><?= $producto['existenciasProducto'] ?></td>
                <td><img src="<?= $producto['imagenProducto'] ?>" alt="<?= $producto['nombreProducto'] ?>"></td>
                <td>
                    <a href="editarProducto.php?id=<?= $producto['idProducto'] ?>">Editar</a>
                    <form action="eliminarProducto.php" method="post" onsubmit="return confirmarEliminar()">
                        <button type="submit" name="eliminar" value="<?= $producto['idProducto'] ?>">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="registrarProductos.php">Agregar Producto</a><br>
    <a href="productos.php">Regresar a productos</a>
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

