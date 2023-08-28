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
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Instructores del CBA</a>
            </div>
        </div>
    </div><br />

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                    <?php
                    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                        $id_delete = intval($_GET['id']);
                        $query = mysqli_query($conn, "SELECT * FROM tinstructores WHERE ID='$id_delete'");
                        if(mysqli_num_rows($query) == 0){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                        } else {
                            $delete = mysqli_query($conn, "DELETE FROM tinstructores WHERE ID='$id_delete'");
                            if($delete){
                                echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                            }
                        }
                    }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon-user"></i> Aquí encontrarás toda la información personal de los instructores</h3> 
                            <a href="../instructores.php" class="btn btn-sm btn-success">Volver al inicio</a>
                        </div>
                        <div class="panel-body">
                            <div class="pull-right">
                                <a href="registro.php" class="btn btn-sm btn-primary">Nuevo Instructor</a>
                            </div><br>
                            <hr>
                            <table id="lookup" class="table table-bordered table-hover">
                                <thead bgcolor="#eeeeee" align="center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Especialidad</th>
                                        <th>Correo Electrónico</th>
                                        <th>Teléfono</th>
                                        <th>Área</th>
                                        <th>Acciones</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer span-12">
        <div class="container">
            <center><b class="copyright"><a href="http://obedalvarado.pw/"> Sistemas Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b></center>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            var dataTable = $('#lookup').DataTable( {
                "language": {
                    // Configuración de idioma
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "ajax-grid-data.php", // URL del archivo que devuelve los datos
                    type: "post",  // Método HTTP, por defecto es GET
                    error: function() {
                        // Manejo de errores
                    }
                }
            });
        });
    </script>
</body>
</html>
