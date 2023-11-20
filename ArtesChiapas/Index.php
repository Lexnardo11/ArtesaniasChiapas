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
    background: url('SRC/Vista/Imagenes/index4.jpg');
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
              <img src="SRC/Vista/Imagenes/logo.PNG" alt="" width= 50px>
            </a>
            <!--opciones de la barra-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="SRC/Vista/productos.php">Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="SRC/Vista/nosotros.php">Conocenos</a>
                </li>
                <?php
                        if($tipoUsuario=='1'){
                           echo '<li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="SRC/Vista/registrarProductos.php">Agregar Productos</a>
                                </li>';
                           echo '<li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="SRC/Vista/verUsuarios.php">Ver Usuarios</a>
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
        <header>
        <!--la imagen debajo de las opciones-->
        <div id="titulo">
          <p style="font-size: 100px;">Arte Chiapaneca</p><br><br>
          <p style="font-size: 25px;">¿Quieres conseguir algún producto hecho en chiapas? <br> 
            Has encontrado el lugar correcto!!!  Ven y conoce nuestros Productos</p><br>
        </div>
      </header>
      <br><br>
      <p style="font-size: 60px; font-family: 'italic'; text-align: center; color: black;">
        Algunos de nuestros productos para el hogar </p>
      <br><br><br><br>
      <center>
      <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="SRC/Vista/Imagenes/platosBarro.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Platos de Barro</h5>
                        <p class="card-text">Platos de barro para todo tipo de commida, de 25cm.</p>
                    </div>
            </div>               
        </div>
        <div class="col">
        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="SRC/Vista/Imagenes/ollaBarro.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ollas de Barro</h5>
                        <p class="card-text">Olla de barro de 40cm de altura para cocinar.</p>
                    </div>
            </div>
        </div>
        <div class="col">
        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="SRC/Vista/Imagenes/jarraBarro.webp" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Jarras de Barro</h5>
                        <p class="card-text">Jarra de 2 litros de barro para el hogar</p>
                    </div>
            </div>
        </div>
        <div class="col">
        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="SRC/Vista/Imagenes/alcanciasBarro.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Alcancias de Barro</h5>
                        <p class="card-text">Alcancias con diseño chiapaneco, perfecta para el ahorro.</p>
                    </div>
            </div>
        </div>
      </div></center>
      <br><br><br><br><br>
    <p style="font-size: 60px; font-family: 'italic'; text-align: center; color: black;">
      Nuestros juguetes más vendidos</p>
      <br><br>
        <!--carrusel de juguetes-->
      <article>
        <section>
          <center><table>
            <tr>
              <th style="width:50px"></th>
              <th style="width: 800px;" >      
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="SRC/Vista/Imagenes/juguetesChiapas.jpg" class="d-block w-100" alt="..." style="width: 100px;">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="SRC/Vista/Imagenes/juguetesChiapas2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="SRC/Vista/Imagenes/juguetesChiapas3.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div></th>
              <th style="width:50px"></th>
            </tr>
          </table>
        </center>
        </section>
      </article>
      <br><br><br><br>
  
      <p style="font-size: 60px; font-family: 'italic'; text-align: center; color: black;">
        Ropa para damas y caballeros con estilo chiapaneco </p>
      <br><br>
  
        <!--ropa estilo chiapaneco-->
      <article class="cartas">
        <center>
          <div class="row">
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="SRC/Vista/Imagenes/ropa1.png" class="card-img-top" alt="..." id="ropa">
                <div class="card-body">
                  <p class="card-text"><b>Playera blanca estilo chiapaneco para caballero</b></p><br>
                </div>
              </div>
  
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="SRC/Vista/Imagenes/ropa2.jpg" class="card-img-top" alt="..." id="ropa">
                <div class="card-body">
                  <p class="card-text"><b>Vestido con flores de colores para dama</b></p><br>
                </div>
              </div>
            </div>
  
            <div class="col">
              <div class="card" style="width: 18rem;" >
                <img src="SRC/Vista/Imagenes/ropa3.jpg" class="card-img-top" alt="..." id="ropa">
                <div class="card-body">
                  <p class="card-text"><b>Vestido negro para con bordes de flores</b></p><br>
                </div>
              </div>
            </div>
  
            <div class="col">
              <div class="card" style="width: 18rem;" >
                <img src="SRC/Vista/Imagenes/ropa4.jpg" class="card-img-top" alt="..." id="ropa">
                <div class="card-body">
                  <p class="card-text"><b>Blusa amarilla con florecitas para dama</b></p><br>
                </div>
              </div>
            </div>
        </div></center>
      </article>
  
      <br><br><br><br>
  
  
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