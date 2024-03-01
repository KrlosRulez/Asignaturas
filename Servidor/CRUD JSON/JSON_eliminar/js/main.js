$(document).ready(function () {
	$("#submit").on("click",function(){
		// es fa un serialize del formulari sencer (my_form)
		var datos = $("#my_form").serialize();
		//serialize recoge el valor de todos los "name" del formulario
		// datos contiene por ejemplo, usuario1=Mariluz&usuario2=Maria
	   $.ajax({
		   type: "GET",
		   url: "php/json.php",
		   data: datos,
		   dataType: "json",
		   beforeSend:function(){
				$("#mensaje1").html('Cargando datos...');
			},
		   success: function (resultado){
			//Para saber la longitud del array
			$("#longitud").html(resultado.length);
			//Recorrer el array de resultados
			for (var x= 0; x<resultado.length;x++) {
				$("<h2>ID Usuario: "+resultado[x].id_user+"</h2>" ).appendTo( "#id_usuario" );
				$("<h2>Usuario: "+resultado[x].name+"</h2>" ).appendTo( "#nombre" );
				$("<h2>Nombre: "+resultado[x].username+"</h2>" ).appendTo( "#usuario" );
				$("<h2>Email: "+resultado[x].email+"</h2>" ).appendTo( "#email" );
			}
		   },
		   error: function(xhr){
				alert("Atencion: se ha producido un error");
				$("#mensaje1").append(xhr.statusText + xhr.responseText);
		   },
			complete: function (){
				$("#mensaje2").html('La peticion se ha completado.');
			},
	   }); 
	}); 
	
	$("#datos").on("click",function(){
		$.ajax({
		   url: "php/json.php",
		   
		   beforeSend:function(){
				$("#mensaje1").html('Cargando datos...');
			},
		   success: function (resultado){

			$("#longitud").html(resultado.length);
			//Recorrer el array de resultados
			for (var x= 0; x<resultado.length;x++) {
				$("<h2>ID Usuario: "+resultado[x].id_user+"</h2>" ).appendTo( "#id_usuario" );
				$("<h2>Usuario: "+resultado[x].name+"</h2>" ).appendTo( "#nombre" );
				$("<h2>Nombre: "+resultado[x].username+"</h2>" ).appendTo( "#usuario" );
				$("<h2>Email: "+resultado[x].email+"</h2>" ).appendTo( "#email" );
			}
		   },
		   error: function(xhr){
				alert("Atencion: se ha producido un error");
				$("#mensaje1").append(xhr.statusText + xhr.responseText);
		   },
			complete: function (){
				$("#mensaje2").html('La peticion se ha completado.');
			},
	   }); 
	}); 
});
