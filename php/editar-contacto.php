<?php 

include 'conexion.php';

$id = isset($_POST['id']) ? $_POST['id'] : false;
$consulta = "SELECT * FROM contactos WHERE id = $id";
$sql = $conexion -> query($consulta);
$resultado = array();

while ($fila = mysqli_fetch_array($sql)) {
	   
	   $resultado[] = $fila;
}

echo json_encode($resultado);



