
<!DOCTYPE html>
<html lang="pt-br">



<head>
    <meta charset="UTF-8">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="http://localhost/MARVINVETERINARIA/VETERINARIAMARVIN2023/estilos/styles.css" />
    <title>Formulário</title>
</head>

<body>


<?php


include ("menu.php");


?>

      <br>

      <br>
      <br>


      <br>
      
    <div class="container">
        <div class="form-image">
            <img src="img/fg.png" alt="">
        </div>
        <div class="form">
            <form action="vermascotas.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Mascotas</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="#"></a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Nombre</label>
                        <input id="nombre" type="text" name="nombre" placeholder="Digite su nombre" required>
                    </div>

                    <div class="input-box">
                        <label for="raza">Raza</label>
                        <input id="raza" type="text" name="raza" placeholder="Digite su Raza" required>
                    </div>
                    <div class="input-box">
                        <label for="color">Color</label>
                        <input id="color" type="text" name="color" placeholder="Digite su Color" required>
                    </div>

                    <div class="input-box">
                        <label for="peso">Peso</label>
                        <input id="peso" type="text" name="peso" placeholder="Digite su peso" required>
                    </div>

                    <div class="input-box">
                        <label for="fecha_nac">Fecha de nacimiento</label>
                        <input id="fecha_nac" type="date" date_format="aaaa/dd/mm" name="fecha_nac" placeholder="Digite su fecha de nacimiento" required>
                    </div>

                    <div class="input-box">
                        <label for="altura">Altura</label>
                        <input id="altura" type="text" name="altura" placeholder="Digite su Altura" required>
                    </div>

<div class="col-5">
  <div class="input-group mb-3">
    <small class="input-group-text"><i class="fa-solid fa-adress-book"></i></small>
    <select name="id_cliente" id="id_cliente" class="form-select" aria-label="Default select example" require>

    <option selected><label for="floatingInputGroup1">--Id Cliente--</label></option>

    
    <?php
//Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=veterinariaa";
$usuario = "root";
$contrasena = "";
try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
}

//Consulta para obtener los datos de la tabla clientes
$consulta = "SELECT * FROM cliente";
$resultado = $conexion->query($consulta);


while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

    echo "<option value='" . $fila['id_cliente'] . "'>" . $fila['id_cliente'] . "</option>";
}
echo "</select>";

//Cierre de la conexión a la base de datos
$conexion = null;
?>
                    


    </select>
  </div>
</div>


                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Sexo</h6>
                    </div>

                    <div class="form-group">
				<label for="sexo">Sexo:</label>
				<select class="form-control" name="sexo">
					<option value="M">M</option>
					<option value="F">F</option>
				</select>
			</div>

      
	</div>

  <br>
  <button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" onclick="window.location.href='regitromasc.php'">Ver Mascota</button>
			<button type="button" class="btn btn-danger" onclick="limpiarFormulario()">Limpiar</button>
           
  
		</form>
     
			
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script>
		function limpiarFormulario() {
			document.getElementById("nombre").value = "";
			document.getElementById("raza").value = "";
			document.getElementById("color").value = "";
			document.getElementById("peso").value = "";
			document.getElementById("altura").value = "";
            document.getElementById("fecha").value = "";
			document.getElementById("sexo").value = "sexo";
		}
	</script>
</body>

</html>