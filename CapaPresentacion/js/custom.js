// Habilitar el boton de volver arriba cuando se hace scroll en la pagina

if ( ($(window).height() + 100) < $(document).height() ) {
 $('#top-link-block').removeClass('hidden').affix({
     // how far to scroll down before link "slides" into view
     offset: {top:100}
 });
}


// popover button(boton de pop up para descripciones)
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
    	
    	 html: true
    }); 
   
});







$('#mantenimientoModal').on('show.bs.modal', function (event) {
	//$(this).find(".modal-content").html(loadingContent);
	var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var action = button.data('action') // Extract info from data-* attributes
    var url = button.data('url') // Extract info from data-* attributes
    
    var modal = $(this);
    var dataString = 'id=' + id+'&action='+action;
   // modal.find('.modal-title').text('Edición del plato ' + id+ 'url'+url);
    $('#loading-indicator').show();
      $.ajax({
          type: "GET",
          url: url,
          data: dataString,
          cache: false,
          success: function (data) {
              console.log(data);
        	  modal.find('.ct').html(data);
        	  $('#loading-indicator').hide();
          },
          error: function(err) {
              console.log(err);
          }
      });  
})

$('#mantenimientoModal').on("hidden.bs.modal", function(){
    $(".ct").html("");
});


$(".cantidad_carrito").keyup(function() { 
	var id = $(".cantidad_carrito").attr('name');
	   var $row = $(this).closest('tr');
	   var cantidad = $row.find('.cantidad_carrito').val();
	   var dataString= "id=" + id+"&cantidad="+cantidad+"&action=update";
	   $.ajax({
	       type: "GET",
	       url: 'pedido.php',
	       data: dataString,
	       success: function(data)
	       {
	    	   alert("Actualizado");
	    	   $(document).ajaxStop(function() { location.reload(true); });
	    	  // $("#cuerpo").load(window.location + " #cuerpo");
	       }
	   });
	   
	    e.stopPropagation();
}); 
 
$(".cantidad_carrito").change(function(e) { 
	   var id = $(".cantidad_carrito").attr('name');
	   var $row = $(this).closest('tr');
	   var cantidad = $row.find('.cantidad_carrito').val();
	   var dataString= "id=" + id+"&cantidad="+cantidad+"&action=update";
	   $.ajax({
	       type: "GET",
	       url: 'pedido.php',
	       data: dataString,
	       success: function(data)
	       {
	    	   //alert("Actualizado");
	    	   $(document).ajaxStop(function() { location.reload(true); });
	       }
	   });
	   
	  
	    e.stopPropagation();
  
});

$('.order_product').on('click', function (e) {   
	   var id= $(this).val();
	   var $row = $(this).closest('tr');
	   var cantidad = $row.find('.cantidad_carrito').val();
	   var dataString= id+"&cantidad="+cantidad;
	  
	   $(this).html('<img src="img/ajax-loader-button.gif" /> Ordenando...');
     
	   $.ajax({
	       type: "GET",
	       url: "pedido.php",
	       data: dataString,
	       //cache: false,
	       dataType:"html",
	       async: true,
	       success: function(data)
	       {
	    	   console.log(data);
	    	   alert("Ordenado   ");
	    	   $(document).ajaxStop(function() { location.reload(true); });
	       },
	       error: function(err) {
	    	   console.log(err);
	       }
	   });
	    e.stopPropagation();
	});



$('.add_to_cart').on('click', function (e) {   
	   var urlData= $(this).val();
	  // var $row = $(this).closest('tr');
	   //var cantidad = $row.find('.cantidad_carrito').val();
	   var dataString= urlData;
	  
	  // $(this).html('<img src="img/ajax-loader-button.gif" /> Agregando a la orden...');
  
	   $.ajax({
	       type: "GET",
	       url: "pedido.php",
	       data: dataString,
	       //cache: false,
	       dataType:"html",
	       async: true,
	       success: function(data)
	       {
	    	   console.log(data);
	    	   alert("Producto agregado al pedido");
	    	   $(document).ajaxStop(function() { location.reload(true); });
	    	   
	       },
	       error: function(err) {
	    	   console.log(err);
	       }
	   });
	    e.stopPropagation();
	});


$('.cantidad_refresh').on('click', function (e) {   
   var id= $(this).val();
   var $row = $(this).closest('tr');
   var cantidad = $row.find('.cantidad_carrito').val();
   var dataString= id+"&cantidad="+cantidad;
   $.ajax({
       type: "GET",
       url: 'pedido.php',
       data: dataString,
       success: function(data)
       {
    	   //alert("Actualizado");
    	  
    	   $(document).ajaxStop(function() { location.reload(true); });

       }
   });
   
    e.stopPropagation();
});

//se acciona al dar click al boton de eliminar del carrito
$('.delete_product').on('click', function (e) {   
	   var id= $(this).val();
	   var dataString= id;
	   $.ajax({
	       type: "GET",
	       url: 'pedido.php',
	       data: dataString,
	       success: function(data)
	       {
	    	   alert("Eliminado");
	    	   $(document).ajaxStop(function() { location.reload(true); });
	       }
	   });
	   
	    e.stopPropagation();
	});

//muestra la imagen en grande en el pedido
$('.pop').on('click', function() {
	$('.imagepreview').attr('src', $(this).find('img').attr('src'));
	$('#imagemodal').modal('show');   
});	



