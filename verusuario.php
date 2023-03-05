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
    $nombre = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estatus = $_POST['status'];
    $rol = $_POST['id_roles'];
 
  

    // Preparar la consulta SQL INSERT con marcadores de posición
    $sql = "INSERT INTO usuarios (usuario, password, email, telefono, status, id_roles)
            VALUES (:usuario, :password, :email, :telefono, :status , :id_roles)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario', $nombre);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':status', $estatus);
    $stmt->bindParam(':id_roles', $rol);
   

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo "<script>alert('Los datos fueron guardados correctamente.'); window.location = 'usuario.php';</script>";
    } else {
        echo "Hubo un error al guardar los datos.";
    }
} catch(PDOException $e) {
    echo "La conexión falló: " . $e->getMessage();
}

// Cerrar la conexión con la base de datos
$conexion = null;
?>


