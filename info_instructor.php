<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "senacba";
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

// Obtener el id del profesor seleccionado
$id = $_GET["id"];

// Consulta para recuperar información del profesor seleccionado
$consulta = "SELECT * FROM tinstructores WHERE id = " . $id;
$resultado = mysqli_query($conexion, $consulta);
$fila_profesor = mysqli_fetch_assoc($resultado);

// Mostrar la información del profesor seleccionado
if ($fila_profesor) {
  $nombre = $fila_profesor["nombres"] . " " . $fila_profesor["apellidos"];
  $especialidad = $fila_profesor["especialidad"];
  $correo_electronico = $fila_profesor["correo_electronico"];
  $imagen = $fila_profesor["imagen"];
  $telefono = $fila_profesor["telefono"];
  $descripcion = $fila_profesor["descripcion"];
  $area = $fila_profesor["area"];
  $competencias = $fila_profesor["competencias"];
  $jornada = $fila_profesor["jornada"];

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Nombre del Instructor - Información</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/info_instructor.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</head>
<body>
  <nav>
    <a class="boton-volver"  href="instructores.php#swipe">Volver</a>
    <img src="img/logosena.png" alt="">
  </nav>

  <?php    
  if ($fila_profesor) {
    echo "
    <section class='presentacion'>
      <img src='$imagen'>
      <h1>$nombre</h1>
      <h3>Especialidad</h3>
      <p>$especialidad</p>
      <h3>Correo Electrónico</h3>
      <p class='correo'>$correo_electronico</p>
      <h3>Teléfono</h3>
      <p>$telefono</p>
      <a  href='instructores.php?id=$id#form_editar' id='btn-editar'>Editar</a>
      <a href='instructores.php?eliminar=$id'>Eliminar</a><br>
      </section>";



echo'  <main>
      <section class="">
        <h2>Descripción personal</h2>
        <div class="card-horizontal">
          <div class="card-content">
            <p>'.$descripcion.'</p>
          </div>
          <a  href="instructores.php?id='.$id.'#form_editar" id="btn-editar">Editar</a>
          <a href="instructores.php?eliminar='.$id.'">Eliminar</a><br>
          </div>
      </section>';

      // ...
echo '
<section class="enlainsti">
  <h2>Funciones en la institución</h2>
  <div class="card-horizontal">
    <div class="card-content">
      <h3>Área</h3>
      <p>'.$area.'</p>
      <h3>Competencias</h3>
      <ul>';

// Dividir las competencias por el separador "-" y crear elementos de lista
$competencias_array = explode("-", $competencias);
foreach ($competencias_array as $competencia) {
  // Validar que la competencia no esté vacía
  $competencia = trim($competencia); // Eliminar espacios en blanco al inicio y al final de la competencia
  if (!empty($competencia)) {
    echo '<li>'.$competencia.'</li>';
  }
}

echo '
      </ul>
      <h3>Jornada</h3>
      <p>'.$jornada.'</p>
    </div>
    <a href="instructores.php?id='.$id.'#form_editar" id="btn-editar">Editar</a>
    <a href="instructores.php?eliminar='.$id.'">Eliminar</a><br>
  </div>
</section>';
    }
    ?>
  </main>
</body>
</html>
