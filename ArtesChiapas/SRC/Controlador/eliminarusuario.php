<?php
$idUsuario=$_GET['id'];
echo $idUsuario;
include_once 'administrarUsuarios.php';
$usuario=new Usuario();
$resultado=$usuario->EliminarUsuario($idUsuario);
if ($resultado==true){
    header("Location: ../Vista/verUsuarios.php");
}

?>