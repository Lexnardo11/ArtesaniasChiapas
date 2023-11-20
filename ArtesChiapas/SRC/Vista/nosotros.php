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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <title>Conocenos</title>
</head>
<body>
<body>
    <!--barra de opciones-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <!--logo (imagen que esta en la barra)-->
        <a class="navbar-brand" href="">
          <img src="Imagenes/logo.PNG" alt="..."  id="logo" height="60px"width="60px">
        </a>
        <!--opciones de la barra-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
            </li>
            <li class="nav-item">
                        <?php
                            if($usuarioSesion==''){
                               echo '<li class="nav-item">
                                          <a class="nav-link active" aria-current="page" href="SRC/Vista/iniciarSesion.php">Iniciar Sesión</a>
                                      </li>';
                               echo '<li class="nav-item">
                                      <a class="nav-link active" aria-current="page" href="SRC/Vista/registrarUsuario.php">Registrarse</a>
                                  </li>';
                            }
                            else{
                                echo '<li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="">'.$usuarioSesion.'</a>
                                        </li>';
                            }
                        ?>
                        
                    </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Productos.php">Productos</a>
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
                                    <a class="nav-link active" aria-current="page" href="registrarUsuario.php">Usuarios</a>
                                </li>';
                        } 
                ?>
        </div>
      </div>
    </nav>
    <!---historia-->
    <section class="" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://media.istockphoto.com/id/1260966789/es/foto/skull-ceramic-handicraft-ciudad-de-m%C3%A9xico.webp?s=1024x1024&w=is&k=20&c=kiNM9_mWsbHAyXN3FCeRCElA5qh9icBDoU-6Nt6xux8="
              style="border-radius: 1rem 0 0 1rem;" height="510" width="430"/>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Historia</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacng: 1px;"text align="justify">Arte Chiapaneca fue fundada en el corazón de Chiapas en 1995 por un grupo de apasionados artesanos locales con 
                    el objetivo de preservar y promover la rica tradición artesanal de la región. La empresa comenzó como un pequeño taller donde 
                    los artesanos creaban piezas únicas y auténticas que reflejaban la diversidad cultural y la belleza natural de Chiapas. 
                    A lo largo de los años, la empresa ha crecido y se ha convertido en un referente en la comunidad artesanal de la región,
                    brindando oportunidades económicas a cientos de familias y promoviendo la cultura chiapaneca en todo el mundo.</h5>
          
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
<section class="" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://www.chiapasparalelo.com/wp-content/uploads/2020/08/WhatsApp-Image-2020-08-13-at-23.18.12.jpeg"
              style="border-radius: 1rem 0 0 1rem;" height="500" width="430" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Misión</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacng: 1px;"text align="justify">Nuestra misión en Arte Chiapaneca es preservar, promover y compartir la rica tradición artesanal de Chiapas,
              ofreciendo a nuestros clientes productos de alta calidad que reflejan la autenticidad y la diversidad cultural de la región. 
              Trabajamos en estrecha colaboración con artesanos locales para garantizar que sus habilidades se transmitan a las generaciones
              futuras y que sus comunidades se beneficien de manera justa y sostenible. Valoramos la creatividad,
              la innovación y el respeto por el medio ambiente en todo lo que hacemos.</h5>
          
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
<section class="" style="background-color: #9A616D;">
  <div class="container py-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://media.istockphoto.com/id/481588552/es/foto/mu%C3%B1ecas-hechas-a-mano-para-la-venta-en-el-mercado-de-artesan%C3%ADas-mexicana.jpg?s=1024x1024&w=is&k=20&c=2lLSwR3QGIREVgk4EYacsEPuKd9yjf6IbBUv_UnZU_Y="
                style="border-radius: 1rem 0 0 1rem;"height="410" width="430" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Visión</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacng: 1px;"text align="justify">Nuestra visión es convertirnos en una empresa líder en la industria de las artesanías en México, reconocida a nivel nacional e internacional
          por la autenticidad y la calidad de nuestros productos. Buscamos ser un motor de desarrollo económico en las comunidades artesanales de Chiapas, 
          empoderando a los artesanos locales y fomentando la preservación de las tradiciones culturales.</h5>
          
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>

    
    
    

    <!--Boostrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>   
</body>
</html>