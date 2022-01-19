$(function(){

	$("#frmRProducto").submit(function(){
		var datos =  $(this).serialize();// obtenemos los datos del formulario
		var url  =   $(this).attr("action");// obtenemos la url donde viajara la info		
		$.post(url, datos, function(e){				 
				Swal.fire({
				  position: 'center',
				  icon: e.icono,
				  title: e.mensaje,
				  showConfirmButton: true
				  
				})
				 	
				$("#frmRProducto")[0].reset();
		},"json");
		return false;
	});

	$("#frmEProducto").submit(function(){
		var datos =  $(this).serialize();// obtenemos los datos del formulario
		var url  =   $(this).attr("action");// obtenemos la url donde viajara la info		
		$.post(url, datos, function(e){				 
				Swal.fire({
				  position: 'center',
				  icon: e.icono,
				  title: e.mensaje,
				  showConfirmButton: true				  
				})				  
		},"json");
		//location.reload();
		return false;
	});


	$(document).on('click','.eliminarProducto',function(){
			var url =  $(this).attr("href");
			var id =   $(this).attr("data-id");
			Swal.fire({
			  title: 'Esta usted seguro de eliminar este registro?',
			  text: "No se podra recuperar esta información!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, Borrarlo'
			}).then((result) => {
			  if (result.value) {
			  	$.post(url, "", function(e){		
			  		$("#fila"+id).remove();// elimina la fila de la tabla
					    Swal.fire(
					      '',
					      e.mensaje,
					      'success'
					    );
			  	},'json');				  	
			  }
			})			
			return false;
	});

   // $(".paginacion").click(function(){
	$(document).on('click','.paginacion',function(){
     	var url =  $(this).attr("href");    
     	var items = $("#items").val();
		$.post(url, "limite="+items, function(e){	
			  $("#resultado").html(e.tabla+" "+e.paginacion);
		},'json');	
        return false;

    });

	function cargarTabla(){        
        $.post("?controlador=producto&accion=listadoProductoJSON", "", function(e){ 
            $("#resultado").html(e.tabla+" "+e.paginacion);

        },'json');          
        return false;
    }
    cargarTabla();

    $(document).on('change','#items',function(){
    	var url   = $(this).attr("data-url");
    	var items = $(this).val();
    	$.post(url, "limite="+items, function(e){ 
            $("#resultado").html(e.tabla+" "+e.paginacion);

        },'json'); 

    	return false;
    });

	
	$(document).on('keyup','#cantidad',function(){
		var cantidad = document.getElementById("cantidad").value;
		var precio = document.getElementById("precio").value;
		var total = cantidad*precio;
		//alert(cantidad+" "+precio)
		document.getElementById("pagar").value = total;
		
	});
	
});