

function agregardatos(nombre,apellido,talla,vendedor){

	cadena="nombre=" + nombre + 
			"&apellido=" + apellido+
            "&talla=" + talla+
            "&vend=" + vendedor;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}
			if (r==4){
                alertify.error("La cantidad de zapatos es superada :(");
            }
			if (r==2){
                alertify.error("El zapato no existe :(");
			}
			if(r==3){
                alertify.error("El vendedor no existe :(");
			}

            if(r==0){
                alertify.error("---------------------------------------------------");
            }
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[1]);
	$('#nombreu').val(d[2]);
	$('#apellidou').val(d[2]);
	$('#emailu').val(d[3]);
	$('#telefonou').val(d[4]);
	
}

function actualizaDatos(){


	id=$('#idpersona').val();
	nombre=$('#nombreu').val();

	cadena= "id=" + id +
			"&canti=" + nombre;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("La cantidad de zapatos es superada :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}