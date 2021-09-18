<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agenda de Contactos</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>




<header class="header">

	<nav class="menu">
		<div class="logo">
			<p>Agenda de Contactos</p>
		</div>

		<ul class="menu-link">
			<li id="cantidad-contactos">Contactos</li>
			
		</ul>
		
	</nav>

	<div class="boton-menu">
		<i class="fas fa-bars"></i>
	</div>
	
</header>



	<div class="formulario-contenedor">
		
		<form id="formulario" class="formulario"  method="POST"  action="php/agregar-contacto.php">
			
			<div class="input-caja">
				<label>Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingrese un Nombre">
			</div>

			<div class="input-caja">
				<label>Apellido</label>
				<input type="text" name="apellido" id="apellido" placeholder="Ingrese un apellido">
			</div>

			<div class="input-caja">
				<label>Telefono</label>
				<input type="text" name="telefono" id="telefono" placeholder="Ingrese un telefono">
			</div>

		<div class="boton-caja"> 
				<input type="submit" value="Agregar">
 		</form>

	</div>
	


   


  <div class="tabla-container">

  	<table class="tabla">
  	  <thead>
  		<th class="tablas-item">Nombre</th>
  		<th class="tablas-item">Apellido</th>
  		<th class="tablas-item">Telefono</th>
  		<th class="tablas-item">Acciones</th>
  	  </thead>


  	</table>
  	
  </div>

	

</body>
</html>