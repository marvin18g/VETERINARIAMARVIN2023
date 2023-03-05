

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

  
  <style>

body{
  background-image:url("img/sav.jpg");
  font-family: 'Poppins', sans-serif;
}
</style>

  <body>
    <h1>Hello, world!</h1>

    <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">@Marvin Galeano</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">@Marvin Galeano</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
          
            <a class="nav-link active" aria-current="page" href="principal.php"><i class="bi bi-bell"></i>        Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cliente.php"><i class="bi bi-bug-fill"></i>          Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Dueño.php"><i class="bi bi-person-check"></i>    Dueño</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Medicamento.php"><i class="bi bi-capsule"></i>    Medicamento</a>
          </li>
         
        </form>
      </div>
    </div>
  </div>
</nav>

<br>

<br>

<div class="container-fluid">
    <h2>Datos del Cliente</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th>id</th>
                <th>Nombre</th>
                <th>Roles</th>
                
            </tr>
        </thead>
        <tbody>
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

                // Realizar la consulta SELECT a la base de datos
                $sql = "SELECT id_roles, nombre, status FROM roles";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Recorrer los resultados de la consulta y mostrarlos en una tabla HTML
                foreach ($resultados as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_roles'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal" . $row['nombre'] . "'>Ver detalles</button></td>";
                    echo "</tr>";

                    // Crear un modal para cada fila que muestre los detalles del cliente correspondiente
                    echo "<div class='modal fade' id='myModal" . $row['nombre'] . "'>";
                    echo "<div class='modal-dialog'>";
                    echo "<div class='modal-content'>";

                    // Encabezado del modal
                    echo "<div class='modal-header'>";
                    echo "<h4 class='modal-title'>" . $row['nombre'] . "</h4>";
                    echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                    echo "</div>";
    
                    // Cuerpo del modal
                    echo "<div class='modal-body'>";
                    echo "<p><strong>Teléfono:</strong> " . $row['status'] . "</p>";
                  
            
                    echo "</div>";
    
                    // Pie del modal
                    echo "<div class='modal-footer'>";
                    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            // Cerrar la conexión con la base de datos
            $conexion = null;
            ?>
        </tbody>
        
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>

