<?php

include 'conexion.php';



$consulta = "SELECT * FROM contactos";
$sql = $conexion -> query($consulta);
$resultado = array();



while ($fila = mysqli_fetch_array($sql) ) {
	   $resultado[] = $fila;
}


echo json_encode($resultado);





