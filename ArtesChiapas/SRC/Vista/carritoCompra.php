<?php
session_start();
include '../Modelo/conexionPDO.php';

$conexion = new Conexion();

// Verificar si se actualizó la cantidad de algún producto en el carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizarCantidad'])) {
    foreach ($_POST['cantidad'] as $productoId => $nuevaCantidad) {
        // Validar que la nueva cantidad sea un número positivo
        if (is_numeric($nuevaCantidad) && $nuevaCantidad >= 0) {
            // Actualizar la cantidad en el carrito
            $_SESSION['carrito'][$productoId]['cantidad'] = $nuevaCantidad;

            // Si la cantidad es 0, eliminar el producto del carrito
            if ($nuevaCantidad == 0) {
                unset($_SESSION['carrito'][$productoId]);
            }
        }
    }
}

// Verificar si se agregó algo al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregarAlCarrito'])) {
    $nombreProducto = isset($_POST['nombreProducto']) ? $_POST['nombreProducto'] : null;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;

    if ($nombreProducto !== null && $cantidad !== null && is_numeric($cantidad) && $cantidad > 0) {
        $query = $conexion->prepare("SELECT * FROM t_productos WHERE nombreProducto = :nombre");
        $query->bindParam(':nombre', $nombreProducto);
        $query->execute();

        $producto = $query->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            if (isset($_SESSION['carrito'][$producto['idProducto']])) {
                $_SESSION['carrito'][$producto['idProducto']]['cantidad'] += $cantidad;
            } else {
                $_SESSION['carrito'][$producto['idProducto']] = [
                    'id' => $producto['idProducto'],
                    'nombre' => $producto['nombreProducto'],
                    'precio' => $producto['precioProducto'],
                    'cantidad' => $cantidad,
                    'imagen' => $producto['imagenProducto']
                ];
            }
        } else {
            echo "Nombre de producto no válido. Introduce un nombre de producto existente.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

$carritoVacio = empty($_SESSION['carrito']);
$totalCarrito = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Resto del código... -->
</head>
<body>
    <!-- Resto del código... -->
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> 

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

        .carrito {
            max-width: 600px;
            width: 100%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .producto {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .producto img {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }

        .total {
            font-weight: bold;
            margin-top: 10px;
            text-align: right;
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

        .carrito-icon {
            color: white;
            font-size: 24px;
            margin-right: 20px; /* Espacio entre el icono y el texto del título */
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

    <?php if (!$carritoVacio): ?>
        <div class="carrito">
            <form method="post" action="">
                <?php foreach ($_SESSION['carrito'] as $producto): ?>
                    <?php
                    $totalProducto = $producto['precio'] * $producto['cantidad'];
                    $totalCarrito += $totalProducto;
                    ?>

                    <div class="producto">
                        <img src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
                        <div>
                            <h3><?= $producto['nombre'] ?></h3>
                            <p>Cantidad: <?= $producto['cantidad'] ?></p>
                        </div>
                        <div>
                            <p>Precio unitario: $<?= number_format($producto['precio'], 2) ?></p>
                            <p>Total: $<?= number_format($totalProducto, 2) ?></p>
                        </div>
                        <div>
                            <label for="cantidad[<?= $producto['id'] ?>]">Nueva cantidad:</label>
                            <input type="number" name="cantidad[<?= $producto['id'] ?>]" value="<?= $producto['cantidad'] ?>" min="0">
                            <button type="submit" name="actualizarCantidad">Actualizar</button>
                            <a href="?eliminar=<?= $producto['id'] ?>">Eliminar</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="total">
                    <p>Total del carrito: $<?= number_format($totalCarrito, 2) ?></p>
                </div>
            </form>
        </div>
    <?php else: ?>
        <br><p>El carrito está vacío.</p>
    <?php endif; ?>

    <!-- Formulario para agregar productos al carrito -->
    <form method="post" action="">
        <label for="nombreProducto">Nombre del producto:</label>
        <input type="text" name="nombreProducto" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" value="1" required>

        <input type="submit" name="agregarAlCarrito" value="Agregar al carrito">
    </form><br><br>
    <a href="productos.php">Volver al Catálogo</a><br>
    
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
    
    <!--BootStrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>








