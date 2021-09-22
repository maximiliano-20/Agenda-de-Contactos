<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agenda de Contactos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
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
		
		<form id="formulario" class="formulario"  method="POST">

		   <input type="hidden" name="id" id="id">
			
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
				<button type="submit" class="enviar" id="enviar">Agregar</button>
			</div>

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
      

      <tbody id="contacto-html">
      	 

      </tbody>

  	</table>
  	
  </div>

	
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>