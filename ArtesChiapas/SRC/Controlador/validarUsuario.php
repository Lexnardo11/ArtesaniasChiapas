<?php
    $correo=$_POST['correo'];
    $password=$_POST['clave'];
    if(isset($correo)&& isset($password)){
        require_once 'administrarUsuarios.php';
        $usuario=new Usuario();
        $resultado=$usuario->AutentificarUsuario($correo,MD5($password));
        if(count($resultado)>0){
            foreach ($resultado as $item) {
                session_start();
                $_SESSION['idUsuario']=$item['id'];
                $_SESSION['correoUsuario']=$item['Correo'];    
                $_SESSION['tipoUsuario']=$item['tipoUsuario'];    
                header("Location: ../../index.php");   # code...
            }
        }
        else{
            header("Location: ../Vista/iniciarSesion.php"); 
        }
    }
    else{
        header("Location: ../Vista/iniciarSesion.php");
        exit();
    }
?>