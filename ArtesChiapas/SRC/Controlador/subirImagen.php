<?php
function subirImagen($conexion, $nombre, $descripcion, $cantidad, $precio, $imagen)
{
    // Procesa la imagen
    $imagenNombre = $imagen['name'];
    $imagenTempPath = $imagen['tmp_name'];

    // Define la ruta donde se almacenarán las imágenes (dentro de la carpeta "imagen")
    $rutaImagen = '../Vista/Productos/' . $imagenNombre;

    // Mueve la imagen a la carpeta de destino
    move_uploaded_file($imagenTempPath, $rutaImagen);

    // Devuelve la ruta de la imagen
    return $rutaImagen;
}
?>