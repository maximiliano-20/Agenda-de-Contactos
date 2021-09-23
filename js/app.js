// Variables
const formulario = document.querySelector('#formulario');
const contactosHTML  = document.querySelector('#contacto-html');
const mensajeAlerta = document.querySelector('#mensaje-alerta');
const btnEnviar = document.querySelector('#enviar');
let editando;



// Eventos
document.addEventListener('DOMContentLoaded', mostrarContactos);
formulario.addEventListener('submit', agregarContacto);
contactosHTML.addEventListener('click', confirmarContacto);
contactosHTML.addEventListener('click', editarContacto);




// Funciones
async function agregarContacto (e) {
	e.preventDefault();
    
    const nombreInput = document.querySelector('#nombre').value;
    const apellidoInput = document.querySelector('#apellido').value;
    const telefonoInput = document.querySelector('#telefono').value;
    


    if (nombreInput === '' || apellidoInput === '' || 
    	telefonoInput === '') {

      	 Swal.fire({
        	icon : 'error',
        	title : 'Campos Vacios',
        	text : 'Debes rellenar todos los campos'
        });

        return;

    }else if (!isNaN(nombreInput)  || !isNaN(apellidoInput)) {

    	 Swal.fire({
        	icon : 'error',
        	title : 'Caracteres no Validos',
        	text : 'El nombre y apellido deben ser caracteres'
        });

    	return;
    } 
    
   

    if (editando) {
    	actualizarContacto();
    	btnEnviar.textContent = 'Agregar';
    	editando = false;
    	formulario.reset();

    }else{
    	guardarContacto();
    }
    
}


async function guardarContacto () {
	try {
		const url = 'php/agregar-contacto.php';
		const datos = new FormData(formulario);
        const resultado = await fetch(url,{              
              method : 'POST',
              body : datos
        });

        const respuesta = await resultado.json();

         Swal.fire({
        	icon : 'success',
        	title : 'Correcto',
        	text : 'Contacto Agregado Correctamente'
        });

        formulario.reset();
        mostrarContactos();

	} catch(e) {
		console.log(e);
	}
	
}




async function mostrarContactos () {
	const url = 'php/mostrar-contacto.php';


	try {
		const respuesta = await fetch(url);
		const resultado = await respuesta.json();
		traerContactos(resultado);
	} catch(e) {
		console.log(e);
	}
	
}


function traerContactos (resultado) {
    
	let html = '';
	
	resultado.forEach( contacto => {
		const { id , nombre, apellido, telefono } = contacto;
        html+=  `            

          <tr>
      	 	<td>${nombre}</td>
      	 	<td>${apellido}</td>
      	 	<td>${telefono}</td>
      	 	<td>
      	 		<a class="boton editar" data-id="${id}" >Editar</a>
      	 		<a class="boton eliminar " data-id="${id}">Borrar</a>
      	 	</td>
      	 </tr>
         `;
	});

	contactosHTML.innerHTML = html;
}


function confirmarContacto (e) {
	if (e.target.classList.contains('eliminar') ) {

		Swal.fire({
			title : 'Estas Seguro de eliminar el contacto',
			text : 'No podras revertir los cambios',
			icon : 'warning',
			showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si Eliminar!'

		}).then((result) => {
		

          if (result.isConfirmed) {

          	const idContacto = parseInt (e.target.dataset.id);
		    eliminarContacto(idContacto);

             Swal.fire(
            'Eliminado!',
            'El contacto se elimino correctamente',
            'success'

           )

         }

      });
		
	}
}


async function eliminarContacto (id) {
	
	try {
	const url = 'php/eliminar-contacto.php';
	const datos = new FormData();
	datos.append('id',id)

	const respuesta = await fetch(url,{
		method : 'POST',
		body : datos
	});

	const resultado = await respuesta.json();
	
	mostrarContactos();

	} catch(e) {
		console.log(e);
	}
}


async function editarContacto (e) {

	if (e.target.classList.contains('editar')) {

        const id = parseInt( e.target.dataset.id);
        
        const url = 'php/editar-contacto.php';
        const datos = new FormData();
        datos.append('id',id);

        const respuesta = await fetch(url,{
            method : 'POST',
            body : datos
        });

        const resultado = await respuesta.json();
       
       
        resultado.forEach(contacto => {
        	
        	const { id , nombre , apellido , telefono } = contacto;

            document.querySelector('#id').value = id;
        	document.querySelector('#nombre').value = nombre;
        	document.querySelector('#apellido').value = apellido;
        	document.querySelector('#telefono').value = telefono;
        	btnEnviar.textContent = 'Editar';
            editando = true;

        });

	}
}


async function actualizarContacto () {
	
	try {
		const url = 'php/actualizar-contacto.php';
		const datos = new FormData(formulario);
        const resultado = await fetch(url,{              
              method : 'POST',
              body : datos
        });

        const respuesta = await resultado.json();

        Swal.fire({
        	icon : 'success',
        	title : 'Correcto',
        	text : 'Contacto Actualizado Correctamente'
        });

        mostrarContactos();

	} catch(e) {
		console.log(e);
	}
}



