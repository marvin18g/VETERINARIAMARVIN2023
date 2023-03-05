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
    $raza = $_POST['raza'];
    $color = $_POST['color'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $sexo = $_POST['sexo'];
    $fecha = $_POST['fecha_nac'];
    $cliente = $_POST['id_cliente'];

    // Preparar la consulta SQL INSERT con marcadores de posición
    $sql = "INSERT INTO mascotas (nombre, raza, color, peso, altura, sexo , fecha_nac, id_cliente)
            VALUES (:nombre, :raza, :color, :peso, :altura, :sexo, :fecha_nac,:id_cliente)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':raza', $raza);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':fecha_nac', $fecha);
    $stmt->bindParam(':id_cliente', $cliente);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo "<script>alert('Los datos fueron guardados correctamente.'); window.location = 'mascotas.php';</script>";
    } else {
        echo "Hubo un error al guardar los datos.";
    }
} catch(PDOException $e) {
    echo "La conexión falló: " . $e->getMessage();
}

// Cerrar la conexión con la base de datos
$conexion = null;
?>



