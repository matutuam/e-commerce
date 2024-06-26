<?php
// Incluir el archivo de conexión a la base de datos
include '../bbdd.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
    $id_proveedor = isset($_POST['proveedor']) ? $_POST['proveedor'] : 1;
    $imagen = "imagen.jpg";
    // Verificar que los datos no estén vacíos
    if ($nombre && $cantidad && $precio) {
        try {
            // Insertar el nuevo producto en la base de datos
            $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion,imagen, cantidad, precio,id_proveedor) VALUES (:nombre,  :descripcion, :imagen,:cantidad, :precio,:id_proveedor)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':id_proveedor', $id_proveedor);
            $stmt->execute();
            header("Location: ../../pages/admin/productos.php");
        } catch (PDOException $e) {
            echo "Error al crear el producto: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
} else {
    echo "Acceso no autorizado.";
}
