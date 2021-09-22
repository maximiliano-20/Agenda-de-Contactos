<?php

include 'conexion.php';

$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']):false;
$apellido = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
$telefono=isset($_POST['telefono']) ? mysqli_real_escape_string($conexion,$_POST['telefono']):false;


if ($nombre === '' || $apellido === '' || $telefono === '' ) {
   return;
}
	
$consulta = "INSERT INTO contactos VALUES (null,'$nombre','$apellido','$telefono')";
$sql = $conexion -> query($consulta);
echo json_encode($sql);







 