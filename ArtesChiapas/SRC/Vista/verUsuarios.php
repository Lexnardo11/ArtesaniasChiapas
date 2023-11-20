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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtesChiapas</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        *{
    margin:0;
    padding:0;
}
.container{
    width: 100%;
    max-width: 2000px;
    margin: 0 auto;
    overflow: hidden;
}
#logo{
    height:60px;
    width: 60px;
}
header{
    background: url('Imagenes/index4.jpg');
	background-repeat: no-repeat;
    height: auto;
    width: 250%;     
    color: white;
}
#titulo{
    margin: 20px;
    font-family: 'italic';
    font-weight: normal;
}
.cartas p{
    font-family: 'italic';
    font-size: 20px;
}
/*productos hogar*/
#hogar{
    height: 200px;
    width: 286px; 
}
/*carrusel*/
table tr th h5{
    font-family: 'italic';
    font-size: 40px;
    color: white;
}
table tr th p{
    font-family: 'italic';
    font-size: 20px;
    color: white;
}
/*productos de ropa*/
#ropa{
    height: 320px;
    width: 286px; 
}
/*pie de pagina*/
footer{
    float: left;
    position: relative;
    bottom: 0;
    width: 100%;
    height: 150%;
    box-sizing: border-box;
    background-color: #adadad;
    padding-top: 10px;
}
    </style>
</head>
<body>
    <div class="container">
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
                               echo '<li class="nav-item" style="margin-right: 20px;">
                                          <a class="nav-link active" aria-current="page" href="SRC/Vista/iniciarSesion.php">Iniciar Sesión</a>
                                      </li>';
                               echo '<li class="nav-item">
                                      <a class="nav-link active" aria-current="page" href="SRC/Vista/registrarUsuario.php">Registrarse</a>
                                  </li>';
                            }
                            else{
                                echo '<li class="nav-item" style="margin-right: 20px;">
                                        <a class="nav-link active" aria-current="page" href="">'.$usuarioSesion.'</a>
                                        </li>';
                                echo '<li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="SRC/Controlador/cerrarSesion.php">Cerrar Sesión</a>
                                        </li>';
                            }
                        ?>
                </ul>
            </div>
          </div>
        </nav>
      <br><br>
     <h1>Administración de las cuentas de usuario</h1><br>
     <a href="nuevousuario.php" class="btn btn-primary">Nuevo</a><br><br>
     <table class="table table-light">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Correo</th>
            <th scope="col">Direccion</th>
            <th scope="col">Tipo de Usuario</th>
            <th scope="col">Borrar</th>
            <th scope="col">Editar</th>
        </tr>
       </thead>
        <tbody>
            <?php
                include_once '../Controlador/administrarUsuarios.php';
                $usuario=new Usuario();
                $resultado=$usuario->ObtenerUsuarios();
                foreach ($resultado as $item) {
                    echo "<tr>";
                    echo "<td>".$item['id']."</td>";
                    echo "<td>".$item['Nombre']."</td>";
                    echo "<td>".$item['Apaterno']."</td>";
                    echo "<td>".$item['Amaterno']."</td>";
                    echo "<td>".$item['Correo']."</td>";
                    echo "<td>".$item['Direccion']."</td>";
                    switch ($item['tipoUsuario']) {
                        case 1:      
                            echo "<td>Administrador</td>";
                            break;
                        case 2:
                            echo "<td>Cliente</td>"; 
                            break;
                        }
                    echo '<td><a href="../Controlador/eliminarusuario.php?id='.$item["id"].'"><img src="Imagenes/Cancelar.png"/></a></td>';
                    echo '<td><a href="editarusuario.php?id='.$item["id"].'"><img src="Imagenes/Editar.png"/></a></td>';
                }
            ?>
        </tbody>
      </table><br><br>
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
    </div>
    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>