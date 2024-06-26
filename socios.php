<?php 
include("config/config.php");

?>


<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <title>ACDyCCC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3.3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logoACDyCCC.png" />
</head>
<body>
<header>
    <!-- foto superior -->
    <div id="encabezado">
    <img src="img/tormenta.jpg" id="imgsup" alt="Imagen de encabezado">
    <img id="logo" src="img/logoACDyCCC.png" alt="">
    <h1 id="acdyccc">Asociación de Caza Deportiva y Conservacionismo Curuzú Cuatiá</h1>
    </div>
    <!-- La navbar -->

    

    <div class="menu">
      <nav class="navbar navbar-expand-lg navbar-light " id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><img src="img/iconologo.png" width="60" height="60" alt=""></a>
                        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse h5" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="novedades.php">Novedades</a></li>
                    <li class="nav-item"><a class="nav-link" href="normativa.php">Normativa</a></li>
                    <li class="nav-item"><a class="activo nav-link" href="socios.php">Socios</a></li>
                    <li class="nav-item"><a class="nav-link" href="tienda.php">Tienda</a></li>
                </ul>
            </div>
        </div>
    </nav>
  </div>



<!-- Socios -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $sexo = $_POST["sexo"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $celular = $_POST["numero_celular"];
    $telefono = $_POST["numero_telefono"];
    $provincia = $_POST["provincia"];
    $ciudad = $_POST["ciudad"];
    $localidad = $_POST["localidad"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];

    $sql = "SELECT * FROM socios WHERE dni = '$dni'";
$result = $conexion->query($sql);

// Si el resultado tiene al menos un registro, el DNI ya existe
if ($result->num_rows > 0) {
  echo "El DNI ingresado ya se encuentra registrado.";
} else {
  

    $sql = "INSERT INTO socios (nombre, apellido, dni, sexo, fecha_nacimiento, numero_celular, numero_telefono, provincia, ciudad, localidad, direccion, correo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    
    $stmt = $conexion->prepare($sql);

    
    $stmt->bind_param("ssssssssssss", $nombre, $apellido, $dni, $sexo, $fechaNacimiento, $celular, $telefono, $provincia, $ciudad, $localidad, $direccion, $correo);

    
    if ($stmt->execute()) {
        echo "Registro exitoso!";
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
    $conexion->close();
}
} 
?>

<div id="socios" class="container-fluid mt-5 text-center  ">
    <h5 class="py-4"><strong>Formulario de Registro de Socios</strong></h5>
    <form id="sociosForm" action="socios.php" method="post">
        <div class="row">
            <div class="col-md-6 px-5">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group pt-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group pt-3">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="form-group pt-3">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="form-group pt-3">
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="form-group pt-3">
                    <label for="telefono">Número de celular</label>
                    <input type="tel" class="form-control" id="numero_celular" name="numero_celular" required>
                </div>
            </div>
            <div class="col-md-6 px-5">
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" required>
                </div>
                <div class="form-group pt-3">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                </div>
                <div class="form-group pt-3">
                    <label for="localidad">Localidad</label>
                    <input type="text" class="form-control" id="localidad" name="localidad" required>
                </div>
                <div class="form-group pt-3">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="form-group pt-3">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" >
                </div>
                <div class="form-group pt-3">
                    <label for="telefono">Número de Teléfono </label>
                    <input type="tel" class="form-control" id="numero_telefono" name="numero_telefono" >
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-4">Registrar</button>
    </form>
</div>

  

<!-- footer -->
<div class="py-4 shadow-sm"></div>

    <footer class="footer bg-dark text-light">
    <div class="footer-card container-fluid">
        <div class="row justify-content-center">
            <!-- contacto -->
            <div class="col-md-4">
                <section id="contacto" class="mt-5">
                    <img id= "logoFooter" src="img/logoACDyCCC.png" alt="Logo ACDyCCC" width="100" height="100">
                    <h2 class="text-center">Contacto</h2>
                    <p class="text">Ponte en contacto con nosotros.</p>
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingrese su email">
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="3" placeholder="Escriba su mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Enviar Mensaje</button>
                    </form>
                </section>
            </div>

            <!-- Socios -->
           <div id="footer" class="col-md-4 mt-5 text-center">
    <h5>Hazte Socio</h5>
    <p>Haz <a href="socios.php">click aquí</a> para más información.</p>
    

    <h5 class="mt-5">Redes Sociales</h5>
    <ul class="list-inline mx-4">
        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
    </ul>
</div>

            <!-- noticias -->
            <div id="footer" class="col-md-4 mt-5 px-4 text-center">
                <h5>Noticias Recientes</h5>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="#">Título de la noticia 1</a></li>
                    <li class="mb-3"><a href="#">Título de la noticia 2</a></li>
                    <li class="mb-3"><a href="#">Título de la noticia 3</a></li>
                    
                </ul>
            </div>
        </div>

       
        <div class="pb-4 container text-center">
            <span class="text-muted pb-4">© 2024 LaEsquinaTeam. Todos los derechos reservados.</span>
        </div>
    </div>
</footer>


<!-- Bootstrap JavaScript Libraries -->
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
 
</body>
</body>
</html>
