<?php
// Establecer la conexión con la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_de_datos = "veterinariaa";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $password);
    // Manejar errores de PDO en modo de excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $status = $_POST['status'];
 

  

    // Preparar la consulta SQL INSERT con marcadores de posición
    $sql = "INSERT INTO roles (nombre, status)
            VALUES (:nombre, :status)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':status', $status);
   

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo "<script>alert('Los datos fueron guardados correctamente.'); window.location = 'roles.php';</script>";
    } else {
        echo "Hubo un error al guardar los datos.";
    }
} catch(PDOException $e) {
    echo "La conexión falló: " . $e->getMessage();
}

// Cerrar la conexión con la base de datos
$conexion = null;
?>



