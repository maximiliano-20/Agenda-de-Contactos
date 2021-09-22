<?php

include 'conexion.php';

$id = isset($_POST['id']) ? $_POST['id'] : false;

$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']):false;
$apellido = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
$telefono=isset($_POST['telefono']) ? mysqli_real_escape_string($conexion,$_POST['telefono']):false;


if ($nombre === '' || $apellido === '' || $telefono === '' ) {
   return;
}


$sql= "UPDATE contactos SET  nombre = '$nombre', apellido = '$apellido', telefono = '$telefono'  WHERE id = $id";

$actualizar = $conexion -> query($sql);

echo json_encode($actualizar);