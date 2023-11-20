<!DOCTYPE html>
<html lang="en">
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
        <img src="Imagenes/logo.PNG" width="48" alt="">  
</div>
         <h2 class="fw-bold text-center py-5 " ><b>Registrate</b></h2>
         <form name="formulario_fmt" action="../Controlador/crearUsuario.php" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="mb-3">
                <label for="inputnombre" class="form-label">Nombre</label>
                <input type="text" class="form-control text-uppercase" id="inputnombre" name="nombre">
             </div>
             <div class="mb-3 ">
                <label for="inputapaterno" class="form-label">Apellido Paterno</label>
                <input type="text"class= "form-control text-uppercase" id="inputapaterno" name="apaterno">
             </div>
             <div class="mb-3">
                <label for="inputamaterno" class="form-label">Apellido Materno</label>
                <input type="text"class="form-control text-uppercase" id="inputamaterno" name="amaterno">
             </div>
             <div class="mb-3">
                <label for="inputemail" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo"  required>
             </div>
             <div class="mb-3">
                <label for="inputpassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="pass" id="inputpassword" required>
             </div>
             <div class="mb-3">
                <label for="inputdireccion" class="form-label">Dirección</label>
                <input type="text" class="form-control text-uppercase" name="direccion" id="inputdireccion">
             </div>
             <div class="mb-3">
                <input type="hidden" name="tipo" value=2>
             </div>
             <div class="d-grid">
                <input type="submit" class="btn btn-danger" value="Enviar">
             </div>         
            </form>
           
                    
                    </div>
                </div>
          </div>
     </div> 
</div>
</div>