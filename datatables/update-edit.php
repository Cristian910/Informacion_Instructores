<?php
include "conn.php";

if(isset($_POST['update'])){
    $nombres = mysqli_real_escape_string($conn, strip_tags($_POST['nombres'], ENT_QUOTES));
    $apellidos = mysqli_real_escape_string($conn, strip_tags($_POST['apellidos'], ENT_QUOTES));
    $especialidad = mysqli_real_escape_string($conn, strip_tags($_POST['especialidad'], ENT_QUOTES));
    $correo_electronico = mysqli_real_escape_string($conn, strip_tags($_POST['correo_electronico'], ENT_QUOTES));
    $imagen = ""; // Debes manejar la carga y almacenamiento de imágenes adecuadamente
    $telefono = intval($_POST['telefono']);
    $descripcion = mysqli_real_escape_string($conn, strip_tags($_POST['descripcion'], ENT_QUOTES));
    $area = mysqli_real_escape_string($conn, strip_tags($_POST['area'], ENT_QUOTES));
    $competencias = mysqli_real_escape_string($conn, strip_tags($_POST['competencias'], ENT_QUOTES));
    $jornada = mysqli_real_escape_string($conn, strip_tags($_POST['jornada'], ENT_QUOTES));

    $update = mysqli_query($conn, "UPDATE tinstructores SET nombres='$nombres', apellidos='$apellidos', especialidad='$especialidad', correo_electronico='$correo_electronico', imagen='$imagen', telefono=$telefono, descripcion='$descripcion', area='$area', competencias='$competencias', jornada='$jornada' WHERE ID = ".$_POST['id']) or die(mysqli_error($conn));

    if($update){
        echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
    }
}
?>