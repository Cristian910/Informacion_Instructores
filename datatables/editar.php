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
                    $id = intval($_GET['id']);
                    $sql = mysqli_query($conn, "SELECT * FROM tinstructores WHERE ID='$id'");
                    if(mysqli_num_rows($sql) == 0){
                        header("Location: index.php");
                    } else {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>

                    <blockquote>
                        Actualizar datos del instructor
                    </blockquote>
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                        <div class="control-group">
                            <label class="control-label" for="nombres">Nombres</label>
                            <div class="controls">
                                <input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="apellidos">Apellidos</label>
                            <div class="controls">
                                <input type="text" name="apellidos" id="apellidos" value="<?php echo $row['apellidos']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="especialidad">Especialidad</label>
                            <div class="controls">
                                <input type="text" name="especialidad" id="especialidad" value="<?php echo $row['especialidad']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="correo_electronico">Correo Electrónico</label>
                            <div class="controls">
                                <input type="email" name="correo_electronico" id="correo_electronico" value="<?php echo $row['correo_electronico']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="imagen">Imagen</label>
                            <div class="controls">
                                <input type="text" name="imagen" id="imagen" value="<?php echo $row['imagen']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="telefono">Teléfono</label>
                            <div class="controls">
                                <input type="tel" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="descripcion">Descripción</label>
                            <div class="controls">
                                <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $row['descripcion']; ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="area">Área</label>
                            <div class="controls">
                                <textarea name="area" id="area" class="form-control" required><?php echo $row['area']; ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="competencias">Competencias</label>
                            <div class="controls">
                                <input type="text" name="competencias" id="competencias" value="<?php echo $row['competencias']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="jornada">Jornada</label>
                            <div class="controls">
                                <input type="text" name="jornada" id="jornada" value="<?php echo $row['jornada']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
