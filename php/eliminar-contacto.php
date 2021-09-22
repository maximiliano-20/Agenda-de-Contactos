<?php

include 'conexion.php';


$id = isset($_POST['id']) ? $_POST['id'] : false;
$sql="DELETE FROM contactos WHERE id = $id ";
$eliminar = $conexion -> query($sql);


echo json_encode($eliminar);
