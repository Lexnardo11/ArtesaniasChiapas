<?php
    $nombre=$_POST['nombre'];
    echo $nombre;
    $apaterno=$_POST['apaterno'];
    echo $apaterno;
    $amaterno=$_POST['amaterno'];
    echo $amaterno;
    $correo=$_POST['correo'];
    echo $correo;
    $password=$_POST['pass'];
    echo $password;
    $direccion=$_POST['direccion'];
    echo $direccion;
    $tipo=$_POST['tipo'];
    echo $tipo;
    if(isset($nombre) && isset($apaterno) && isset($amaterno) && isset($correo) && isset($password) && isset($direccion) && isset($tipo)){
        include_once 'administrarUsuarios.php';
        $usuario=new Usuario();
        $resultado=$usuario->InsertarUsuario($nombre,$apaterno,$amaterno,$correo,MD5($password),$direccion,$tipo);
        if($resultado==1){
            header("Location: ../Vista/iniciarSesion.php");
        }
        else{
            header("Location: ../Vista/iniciarSesion.php");
        }
    }
    else{
        header("Location: ../Vista/registrarusuario.php");
    }
?>