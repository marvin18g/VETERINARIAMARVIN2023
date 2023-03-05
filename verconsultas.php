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
    $examen = $_POST['Examen'];
    $diano = $_POST['diagnostico'];
    $medicamento = $_POST['medicamento'];
    $cita = $_POST['cita'];
    $costos = $_POST['costo'];
    $mascotas = $_POST['id_mascotas'];
    $usuario = $_POST['id_usuario'];
    

    // Preparar la consulta SQL INSERT con marcadores de posición
    $sql = "INSERT INTO consultas (examen_fisico, diagnostico, medicamento, proxima_cita, costo, id_mascotas, id_usuario)
            VALUES (:examen_fisico, :diagnostico, :medicamento, :proxima_cita, :costo, :id_mascotas, :id_usuario)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':examen_fisico', $examen);
    $stmt->bindParam(':diagnostico', $diano);
    $stmt->bindParam(':medicamento', $medicamento);
    $stmt->bindParam(':proxima_cita', $cita);
    $stmt->bindParam(':costo', $costos);
    $stmt->bindParam(':id_mascotas', $mascotas);
    $stmt->bindParam(':id_usuario', $usuario);
    

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo "<script>alert('Los datos fueron guardados correctamente.'); window.location = 'consultas.php';</script>";
    } else {
        echo "Hubo un error al guardar los datos.";
    }
} catch(PDOException $e) {
    echo "La conexión falló: " . $e->getMessage();
}

// Cerrar la conexión con la base de datos
$conexion = null;
?>



