<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="./login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c9f5871d83.js"crossorigin="anonymous"></script>
    <title>ArtesChiapas</title>
<style>
     body{
      background:#87CEEB;
      background:linear-gradient(to right, #ffa751,#87CEEB)
     }
     .bg{
      background-image:url(https://thejigsawpuzzles.com/img-puzzle-6863396-1024/Mexican-Pottery);
      background-position:center;
     }
     h2{
      color:#CE3344;
      
     }
  </style>
   
</head>
<body>


<div class ="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row align-items-stretch"> 
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">

      </div>
      <div class="col bg-white p-5 rounded-end">
       <div class="text-end">
        <img src="img/logo.jpeg"width="48"alt="">  
</div>

        
         <h2 class="fw-bold text-center py-5 " ><b>Bienvenido</b></h2>
       
         <form action="../Controlador/validarUsuario.php" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="correo">
                <label for="floatingInput">Usuario</label>
             </div>
             <div class="form-floating">
                <input type="password" class="form-control"id="floatingPassword" name="clave">
                <label for="floatingPassword">Contraseña</label>    
            </div><br><br>
            <div class="d-grid">
                <input type="submit"class="btn btn-danger"value="enviar">
            </div>
             <div class="my-3">
                <span>No tienes cuenta? <a href='registrarUsuario.php'>Registrate</a></span>

               
            </form>
           
                    
                    </div>
                </div>
          </div>
     </div> 
</div>
</div>
</body>

</html> 
