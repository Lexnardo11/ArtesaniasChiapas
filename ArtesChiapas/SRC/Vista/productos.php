<?php
     session_start();
     if(isset($_SESSION['correoUsuario'])){
        $usuarioSesion= $_SESSION['correoUsuario'];
        $tipoUsuario= $_SESSION['tipoUsuario'];
     }
     else{
        $usuarioSesion= '';
        $tipoUsuario= '';
     }   
?>
<?php
include '../Modelo/conexionPDO.php';

$conexion = new Conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos en Tarjetas</title>
    <!-- Incluir Font Awesome para los iconos -->
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

        .carrito-icon {
            color: black;
            text-decoration: none;
            font-size: 24px;
        }

        .pro {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px;
            width: 200px;
            text-align: center;
            display: inline-block;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            border-radius: 10px;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 10px;
            color: #666;
        }

        .comprar-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .comprar-button:hover {
            background-color: #45a049;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        .boton {
        background-color: #3498db;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        margin-right: 15px; /* Espaciado entre los botones */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .boton:hover {
        background-color: #2980b9;
    }
        footer {
            width: 100%;
            box-sizing: border-box;
            background-color: #adadad;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <!--logo (imagen que esta en la barra)-->
            <a class="navbar-brand" href="#">
              <img src="Imagenes/logo.PNG" alt="" width= 50px>
            </a>
            <!--opciones de la barra-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="nosotros.php">Conocenos</a>
                </li>
                <?php
                        if($tipoUsuario=='1'){
                           echo '<li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="registrarProductos.php">Agregar Productos</a>
                                </li>';
                           echo '<li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="verUsuarios.php">Ver Usuarios</a>
                                </li>';
                        } 
                ?></ul>
                <ul style="list-style: none; margin: 0; display: flex; justify-content: flex-end; align-items: center;">
                        <?php
                            if($usuarioSesion==''){
                               echo '<li class="nav-item" style="margin-right: 20px;>
                                          <a class="nav-link active" aria-current="page" href="iniciarSesion.php">Iniciar Sesión</a>
                                      </li>';
                               echo '<li class="nav-item">
                                      <a class="nav-link active" aria-current="page" href="registrarUsuario.php">Registrarse</a>
                                  </li>';
                            }
                            else{
                                echo '<li class="nav-item" style="margin-right: 20px;">
                                        <a class="nav-link active" aria-current="page" href="">'.$usuarioSesion.'</a>
                                        </li>';
                                echo '<li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="../Controlador/cerrarSesion.php">Cerrar Sesión</a>
                                        </li>';
                            }
                        ?>
                </ul>
            </div>
          </div>
        </nav>
<header>
        <div id="titulo">
            <p style="font-size: 40px;">Arte Chiapaneca</p>
        </div>
        <!-- El icono del carrito está alineado a la derecha del todo -->
        <a href="carritoCompra.php" class="carrito-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </header><br><br>
    <h2 class="pro">Productos</h2>
    <?php
    // Consulta SQL para obtener los productos de la base de datos
    $query = "SELECT * FROM t_productos";
    $result = $conexion->query($query);

    // Muestra los productos como tarjetas
    while ($producto = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='card'>";
        
        // Comprueba si hay una imagen y muestra la etiqueta <img> correspondiente
        if (!empty($producto['imagenProducto'])) {
            $imagenPath = /*'Productos/' .*/ $producto['imagenProducto'];
            echo "<img src='{$imagenPath}' alt='Imagen del producto'>";
        }

        // Muestra otros detalles del producto
        echo "<h3>{$producto['nombreProducto']}</h3>";
        echo "<p>Descripción: {$producto['descripcion']}</p>";
        echo "<p>Cantidad: {$producto['existenciasProducto']}</p>";
        echo "<p>Precio: {$producto['precioProducto']}</p>";

        // Otros campos según tu estructura de base de datos

        // Agrega un botón para comprar que lleva a comprar.php
        echo "<a href='./src/vista/comprar.php?id={$producto['idProducto']}' class='comprar-button'>Comprar</a><br>";

        // Enlace para ir al carritoCompra.php
        echo "<br><a href='carritoCompra.php'>Agregar al Carrito</a>";

        echo "</div>";
    }
    ?>
    <br>
    <br>
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