<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "senacba";
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);
//EDITAR

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // ACTUALIZAR FICHA
  if (isset($_POST['envio_editar'])) {
    // Obtener los datos enviados por el formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $especialidad = $_POST['especialidad'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $area = $_POST['area'];
    $competencias = $_POST['competencias'];
    $jornada = $_POST['jornada'];

    $file_name = $_FILES["imagen"]["name"];
    $file_tmp = $_FILES["imagen"]["tmp_name"];

    // Ruta donde se guardará la imagen
    $ruta_imagen = "img/guardada/" . $file_name;

    // Mover la imagen cargada a la ruta especificada
    if (move_uploaded_file($file_tmp, $ruta_imagen)) {
      $actualizar_ficha = "UPDATE tinstructores SET imagen ='$ruta_imagen' WHERE id = $id";
      $resultado_actualizar = mysqli_query($conexion, $actualizar_ficha);
    }
      // Actualizar los datos en la base de datos
      $actualizar_ficha = "UPDATE tinstructores SET nombres = '$nombres',  apellidos = '$apellidos', especialidad = '$especialidad',correo_electronico = '$correo_electronico',telefono = '$telefono',descripcion = '$descripcion',area = '$area',competencias = '$competencias',jornada = '$jornada' WHERE id = $id";
      $resultado_actualizar = mysqli_query($conexion, $actualizar_ficha);

      // Verificar si la actualización fue exitosa
      if ($resultado_actualizar) {
        echo "<div class='mensaje'><h2 class='envio'>Información editada correctamente</h2></div>";
      } else {
        echo "<div class='mensaje'><h2 class='error'>Se ha producido un error </div> " . "<br>" . mysqli_error($conexion);
      }
  }
$consulta_ficha = "SELECT * FROM tinstructores WHERE id = $id";
$resultado_ficha = mysqli_query($conexion, $consulta_ficha);
if ($resultado_ficha && mysqli_num_rows($resultado_ficha) > 0) {
  $fila_profesor = mysqli_fetch_assoc($resultado_ficha);
}
} 
//CREAR NUEVO 
if (isset($_POST['envio'])) {
    // Obtener los datos enviados por el formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $especialidad = $_POST['especialidad'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $area = $_POST['area'];
    $competencias = $_POST['competencias'];
    $jornada = $_POST['jornada'];

    $file_name = $_FILES["imagen"]["name"];
    $file_tmp = $_FILES["imagen"]["tmp_name"];
    
    // Ruta donde se guardará la imagen
    $ruta_imagen = "img/guardada/" . $file_name;
    
    // Verificar si se ha seleccionado una imagen
    if (move_uploaded_file($file_tmp, $ruta_imagen)) {   
    }    
    // Insertar los datos en la tabla profesor
    $insertar_instructor = "INSERT INTO tinstructores (nombres, apellidos, especialidad, correo_electronico, imagen, telefono,descripcion,area,competencias,jornada) VALUES ('$nombres', '$apellidos', '$especialidad', '$correo_electronico', '$ruta_imagen', '$telefono', '$descripcion','$area','$competencias','$jornada')";
    $resultado_instructor = mysqli_query($conexion, $insertar_instructor);
    // Verificar si la actualización fue exitosa
    if ($resultado_instructor) {
      echo "<div class='mensaje'><h2 class='envio'>Información guardada correctamente</h2></div>";
    } else {
      echo "<div class='mensaje'><h2 class='error'>Se ha producido un error </h2></div> ". mysqli_error($conexion);
    }
}
//ELIMINAR
// Función para eliminar un registro por ID
if (isset($_GET['eliminar'])) {
  $id = $_GET['eliminar'];
  // Preparar la consulta con una sentencia preparada
  $eliminar_registro = mysqli_prepare($conexion, "DELETE FROM tinstructores WHERE id = ?");
  mysqli_stmt_bind_param($eliminar_registro, "i", $id);
  
  // Ejecutar la consulta
  $resultado_eliminar = mysqli_stmt_execute($eliminar_registro);
  
  // Verificar si la eliminación fue exitosa
  if ($resultado_eliminar) {
    echo "<div class='mensaje'><h2 class='envio'>El registro se ha eliminado correctamente.</h2></div>";
  } else {
    echo "<div class='mensaje'><h2 class='error'>Error al eliminar el registro:</h2></div>" . mysqli_error($conexion);
  }
  
  // Cerrar la consulta
  mysqli_stmt_close($eliminar_registro);
}
// Obtener el valor del filtro de carrera (si se seleccionó)
$filtroCarrera = isset($_GET['area']) ? $_GET['area'] : '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Instructores</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/instructor.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container__header">
            <div class="logo">
                <a href="#inicio">
                    <img src="img/logosena.png" alt="">
                </a>
            </div>

            <div class="menu">
                <nav>
                    <ul>
                    <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#buscar">Buscar</a></li>
                        <li><a href="#areas">Areas</a></li>
                        <li><a href="#swipe">Instructores</a></li>
                    </ul>
                </nav>
                </div>
                <div class="boton-agregar">
                <a class="agregar" id="agregar" href="#form_nuevo">Agregar Instructor</a><br>
                </div>
      </div>
  <header id="inicio" class="container__cover div__offset">
            <div class="cover">
                <section class="text__cover">
                    <h1>Instructores del CBA</h1>
                    <p>Bienvenido a la página de instructores del SENA CBA</p>
                </section>
                <section class="image__cover">
                    <img src="img/portada.jpg" alt="">
                </section>
            </div>
</header>
  
  <div class="container__about div__offset">
            <div class="about" id="buscar">
                <div class="text__about">
                    <h1>Buscar Instructor</h1>
                    <p> Nuestra función de búsqueda rápida te ayudará a encontrar fácilmente a los instructores del SENA que se ajusten a tus necesidades y preferencias.</p><br>
                    <form action="#swipe" method="GET" class="filtro-form">
                        <input type="text" name="instructor" placeholder="Nombre del instructor">
                        <button type="submit">Buscar</button>
                      </form>
                </div>   
                <div class="image__about">
                    <img src="img/buscar.jpg" alt="">
                </div>
            </div>
        </div>
    <div class="container__trust container__card-primary" id="areas">
            <div class="trust card__primary">
                <div class="text__trust text__card-primary">
                    
                    <h1>Áreas de Estudio </h1>
                    <p>Explora nuestras diversas áreas de estudio.Utiliza nuestros filtros por área de estudio para encontrar instructores especializados en el campo que te interese.</p>
                </div>
                <div class="container__trust container__box-cardPrimary">
                <div class='card__trust box__card-primary'><img src='img/user.png' alt><br><a href="?area=#swipe">Todas las carreras</a></div>
                <?php
        // Consulta para obtener las carreras disponibles
        $consultaCarreras = "SELECT DISTINCT area FROM tinstructores";
        $resultadoCarreras = mysqli_query($conexion, $consultaCarreras);

        while ($filaCarrera = mysqli_fetch_assoc($resultadoCarreras)) {
          $carrera = $filaCarrera["area"];
          $selected = ($carrera == $filtroCarrera) ? "selected" : "";
          echo "<div class='card__trust box__card-primary'>
          <img src='img/user.png' alt=''>
          <br>
          <a href='?area=$carrera#swipe' $selected>$carrera</a>
      </div>";
        }
        ?>
    </div>
    </div>
  
  <section id="swipe" class="swiper mySwiper">
    <h2>Listado de instructores</h2>
    <div class="swiper-wrapper">
      <?php
      // Consulta SQL con filtro de carrera y búsqueda rápida
      $consulta = "SELECT * FROM tinstructores";
      if (!empty($filtroCarrera)) {
        $consulta .= " WHERE area = '$filtroCarrera'";
      }
      
      if (isset($_GET['instructor'])) {
        $instructor = $_GET['instructor'];
        $consulta .= " WHERE (nombres LIKE '$instructor' OR apellidos LIKE '$instructor')";
      }
      
      $resultado = mysqli_query($conexion, $consulta);

      while ($fila = mysqli_fetch_assoc($resultado)) {
        $id = $fila["ID"];
        $nombres = $fila["nombres"];
        $apellidos = $fila["apellidos"];
        $area = $fila["area"];
        $imagen = $fila["imagen"];
        echo "
        <div class='card swiper-slide'>
          <div class='card__image'>
            <img src='$imagen' alt='card image'>
          </div>
          <div class='card__content'>
            <span class='card__title'>$nombres $apellidos</span>
            <span class='card__instructor'>$area</span>
            <a href='info_instructor.php?id=$id'>Ver Información</a>
            <a  href='?id=$id#form_editar' id='btn-editar'>Editar</a>
            <a href='?eliminar=$id'>Eliminar</a><br>
          </div>
        </div>";
      }
      // Verificar si se ha enviado el ID del registro a eliminar
      ?>
    </div>
  </section>
  <?php
/*form editar*/
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  echo '<section class="form">
  <form action="#swipe" id="form_editar" method="POST" enctype="multipart/form-data">
    <h2>Editar Instructor</h2>
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" value="'.$fila_profesor['nombres'].'" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" value="'.$fila_profesor['apellidos'].'" required><br>

    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" name="correo_electronico" value="'.$fila_profesor['correo_electronico'].'" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="'.$fila_profesor['telefono'].'" required><br>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen"><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required>'.$fila_profesor['descripcion'].'</textarea><br>

    <label for="especialidad">Especialidad:</label>
    <input type="text" name="especialidad" value="'.$fila_profesor['especialidad'].'" required><br>

    <label for="area">Area:</label>
    <input type="text" name="area" value="'.$fila_profesor['area'].'" required><br>

    <label for="competencias">Competencias (separadas por guion "-"):</label>
    <textarea name="competencias" required>'.$fila_profesor['competencias'].'</textarea><br>

    <label for="jornada">Jornada:</label>
    <select name="jornada" required>
      <option value="manana" '.($fila_profesor['jornada'] === 'manana' ? 'selected' : '').'>mañana</option>
      <option value="tarde" '.($fila_profesor['jornada'] === 'tarde' ? 'selected' : '').'>tarde</option>
      <option value="mixta" '.($fila_profesor['jornada'] === 'mixta' ? 'selected' : '').'>mixta</option>
      <option value="nocturna" '.($fila_profesor['jornada'] === 'nocturna' ? 'selected' : '').'>nocturna</option>
    </select><br>

    <input type="submit" name="envio_editar" value="Actualizar Información">
  </form>
  </section>';
}
?>

<section class="form" id="form_nuevo">
  <form action="#swipe" method="POST"  enctype="multipart/form-data">
    <h2>Informacion Basica</h2>
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres"  required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" required><br>

    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" name="correo_electronico" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono"  required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" required><br>

    <label for="especialidad">Especialidad:</label>
    <input type="text" name="especialidad" required><br>

    <label for="area">Area:</label>
    <input type="text" name="area" required><br>

    <label for="competencias">Competencias (separadas por guion "-"):</label>
    <textarea name="competencias" required></textarea><br>

    <label for="jornada">Jornada:</label>
    <select name="jornada" required>
      <option value="manana" >mañana</option>
      <option value="tarde">tarde</option>
      <option value="mixta">mixta</option>
      <option value="nocturna">nocturna</option>
    </select><br>
    <input type="submit" name="envio" value="Ingresar nuevo instructor">
    </form>
    </section>
</body>
<script>
            $(document).ready(function() {
  // Mostrar la alerta modal
  setTimeout(function() {
    $('.mensaje').fadeOut();
  }, 1000);
  // Mostrar el formulario al hacer clic en el botón
  $("#agregar").click(function() {
    $("#form_nuevo").fadeIn("3000");
  });
  $("#btn-editar").click(function() {
    $("#form_nuevo").hide();
  });
});
          </script>
</html>
