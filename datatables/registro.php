<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php");?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Sistemas Web</a>
            </div>
        </div>
    </div><br />

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                    <?php
                    if(isset($_POST['input'])){
                        $nombres = mysqli_real_escape_string($conn, strip_tags($_POST['nombres'], ENT_QUOTES));
                        $apellidos = mysqli_real_escape_string($conn, strip_tags($_POST['apellidos'], ENT_QUOTES));
                        $especialidad = mysqli_real_escape_string($conn, strip_tags($_POST['especialidad'], ENT_QUOTES));
                        $correo_electronico = mysqli_real_escape_string($conn, strip_tags($_POST['correo_electronico'], ENT_QUOTES));
                        $telefono = intval($_POST['telefono']);
                        $descripcion = mysqli_real_escape_string($conn, strip_tags($_POST['descripcion'], ENT_QUOTES));
                        $area = mysqli_real_escape_string($conn, strip_tags($_POST['area'], ENT_QUOTES));
                        $competencias = mysqli_real_escape_string($conn, strip_tags($_POST['competencias'], ENT_QUOTES));
                        $jornada = mysqli_real_escape_string($conn, strip_tags($_POST['jornada'], ENT_QUOTES));
                        $registrado = date("Y-m-d H:i:s");

                        $insert = mysqli_query($conn, "INSERT INTO tinstructores (nombres, apellidos, especialidad, correo_electronico, telefono, descripcion, area, competencias, jornada) 
                        VALUES ('$nombres', '$apellidos', '$especialidad', '$correo_electronico', $telefono, '$descripcion', '$area', '$competencias', '$jornada')") or die(mysqli_error($conn));

                        if($insert){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
                        }
                    }
                    ?>
            
                    <blockquote>
                        Agregar instructor
                    </blockquote>
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
                        <div class="control-group">
                            <label class="control-label" for="nombres">Nombres</label>
                            <div class="controls">
                                <input type="text" name="nombres" id="nombres" placeholder="Nombres" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="apellidos">Apellidos</label>
                            <div class="controls">
                                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="especialidad">Especialidad</label>
                            <div class="controls">
                                <input type="text" name="especialidad" id="especialidad" placeholder="Especialidad" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="correo_electronico">Correo Electrónico</label>
                            <div class="controls">
                                <input type="email" name="correo_electronico" id="correo_electronico" placeholder="Correo Electrónico" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="telefono">Teléfono</label>
                            <div class="controls">
                                <input type="text" name="telefono" id="telefono" placeholder="Teléfono" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="descripcion">Descripción</label>
                            <div class="controls">
                                <textarea name="descripcion" id="descripcion" class="form-control span8 tip" placeholder="Descripción" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="area">Área</label>
                            <div class="controls">
                                <textarea name="area" id="area" class="form-control span8 tip" placeholder="Área" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="competencias">Competencias</label>
                            <div class="controls">
                                <textarea name="competencias" id="competencias" class="form-control span8 tip" placeholder="Competencias" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="jornada">Jornada</label>
                            <div class="controls">
                                <input type="text" name="jornada" id="jornada" placeholder="Jornada" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer span-12">
        <div class="container">
            <center> <b class="copyright"><a href="http://obedalvarado.pw/"> Sistemas Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b></center>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
