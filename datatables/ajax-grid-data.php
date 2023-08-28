<?php
include "conn.php";

$requestData = $_REQUEST;

$columns = array( 
    0 => 'ID',
    1 => 'nombres', 
    2 => 'apellidos',
    3 => 'especialidad',
    4 => 'correo_electronico',
    5 => 'telefono',
    6 => 'descripcion',
    7 => 'area',
    8 => 'competencias',
    9 => 'jornada'
);

$sql = "SELECT ID, nombres, apellidos, especialidad, correo_electronico, telefono, descripcion, area, competencias, jornada ";
$sql .= " FROM tinstructores";
$query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

if (!empty($requestData['search']['value'])) {
    $sql = "SELECT ID, nombres, apellidos, especialidad, correo_electronico, telefono, descripcion, area, competencias, jornada ";
    $sql .= " FROM tinstructores";
    $sql .= " WHERE nombres LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR apellidos LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR especialidad LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR correo_electronico LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR telefono LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR descripcion LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR area LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR competencias LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR jornada LIKE '".$requestData['search']['value']."%' ";
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
    $totalFiltered = mysqli_num_rows($query);
    
    $sql .= " ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length'];
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
} else {
    $sql = "SELECT ID, nombres, apellidos, especialidad, correo_electronico, telefono, descripcion, area, competencias, jornada ";
    $sql .= " FROM tinstructores";
    $sql .= " ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length'];
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
}

$data = array();
while ($row = mysqli_fetch_array($query)) {
    $nestedData = array(); 

    $nestedData[] = $row["ID"];
    $nestedData[] = $row["nombres"];
    $nestedData[] = $row["apellidos"];
    $nestedData[] = $row["especialidad"];
    $nestedData[] = $row["correo_electronico"];
    $nestedData[] = $row["telefono"];
    $nestedData[] = $row["area"];
    $nestedData[] = '<td><center>
                     <a href="editar.php?id='.$row['ID'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="index.php?action=delete&id='.$row['ID'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
				     </center></td>';      
    
    $data[] = $nestedData;
}

$json_data = array(
    "draw"            => intval($requestData['draw']),
    "recordsTotal"    => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"            => $data
);

echo json_encode($json_data);
?>
