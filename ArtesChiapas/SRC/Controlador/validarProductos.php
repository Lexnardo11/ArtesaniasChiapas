<?php
    session_start();
    require("../modelo/conexionPDO.php");
    try {
        $conn = new Conexion(); // Crear una instancia de la clase Conexion
        $inserta = $conn->prepare("INSERT INTO t_productos(nombreProducto,descripcion,fechaCaducidad,existencia,precioProducto) VALUES (:nombreProducto, :descripcion, :fechaCaducidad, :existencia, :precioProducto)");
        $inserta -> bindParam(':nombreProducto', strtoupper($_POST['nombreProducto']));
        $inserta -> bindParam(':descripcion', strtoupper($_POST['descripcion']));
        $inserta -> bindParam(':fechaCaducidad', strtoupper($_POST['fechaCaducidad']));
        $inserta -> bindParam(':existencia', $_POST['existencia']);
        $inserta -> bindParam(':precioProducto', strtoupper($_POST['precioProducto']));

       
        
        $inserta -> execute();

        $conn = null;
        header('Location: ../vista/productos.php');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>