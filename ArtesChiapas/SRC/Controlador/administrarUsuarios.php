<?php
class Usuario{
    //atributos

    //Metodos
    public function AutentificarUsuario($correo,$password){
        include '../Modelo/conexionPDO.php';
        $conectar=new Conexion();
        $consulta=$conectar->prepare("SELECT * FROM t_usuarios
        WHERE Correo = :correo && clave = :clave");
        $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
        $consulta->bindParam(":clave",$password,PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function InsertarUsuario($nombre,$apaterno,$amaterno,$correo,$password,$direccion,$tipo){
        include "../Modelo/conexionPDO.php";
        $conectar=new Conexion();
        $consulta=$conectar->prepare("INSERT INTO t_usuarios(
            Nombre,Apaterno,Amaterno,Correo,clave,Direccion,tipoUsuario) VALUES(:nombre,:apaterno,:amaterno,:correo,:pass,:direccion,:tipo)");
        $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $consulta->bindParam(":apaterno",$apaterno,PDO::PARAM_STR);
        $consulta->bindParam(":amaterno",$amaterno,PDO::PARAM_STR);
        $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
        $consulta->bindParam(":pass",$password,PDO::PARAM_STR);
        $consulta->bindParam(":direccion",$direccion,PDO::PARAM_STR);
        $consulta->bindParam(":tipo",$tipo,PDO::PARAM_INT);
        $consulta->execute();
        return true;
    }
    public function ModificarUsuario($id,$nombre,$correo){
        include "../Modelo/conexionPDO.php";
        $conectar=new Conexion();
        $consulta=$conectar->prepare("UPDATE t_usuarios
        SET Nombre=:nombre,Correo=:correo
        WHERE id=:id");
        $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
        $consulta->bindParam(":id",$id,PDO::PARAM_INT);
        $consulta->execute();
        return true;
    }
    public function EliminarUsuario($id){
        try {
            include "../Modelo/conexionPDO.php";
            $conectar=new Conexion();
            $consulta=$conectar->prepare("DELETE FROM t_usuarios
            WHERE Id=:id");
            $consulta->bindParam(":id",$id,PDO::PARAM_INT);
            $consulta->execute();
            return true;   
        } catch (Exception $e) {
            return false;
        }       
    }
    public function ObtenerUsuarios(){
        include '../Modelo/conexionPDO.php';
        $conectar=new Conexion();
        $consulta=$conectar->prepare("SELECT * FROM t_usuarios");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function ObtenerUsuarioPorNombre($nombre){
        include '../Modelo/conexionPDO.php';
        $conectar=new Conexion();
        $consulta=$conectar->prepare("SELECT * FROM t_usuarios
        WHERE NombreCompleto LIKE :nombre");
        $consulta->bindParam(":nombre","%$nombre%",PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function ObtenerUsuariosId($id){
        include '../Modelo/conexionPDO.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM t_usuarios
        WHERE Id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetch();
    }
}
?>