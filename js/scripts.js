var inicio=function()

{   //funcion para actualizar la cantidad con la tecla enter
	$(".cantidad").keyup(function(e)
	{
		if($(this).val()!='')
		{ 
			if(e.keyCode==13)
			{
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: $' + ((cantidad*precio).toFixed(2)));
				//AJAX
				$.post('./js/modificarDatos.php',
				{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
					
					
				},function(e)
				  {
					  $("#total").text('' +e);
					  
				  });
				
			}
		}
});


	
$("#get").click(function(e)
{

				e.preventDefault();
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).attr('data-cantidad');
				//$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: $'+ (precio*cantidad));

				$.post('./js/eliminarDatos.php', 
				{
					Id:id,
					Precio:precio,
					Cantidad:cantidad

				}, function(e) 
					{
				  $("#total").text('Total: ' +e);
				   });
});


}


function validar()
{	
	indice=document.getElementById("opciones").selectedIndex;

		if( indice == "" ) 
		{  	
  		alert("Please choose a transport type");
  		document.getElementById("opciones").focus();
		
  		return false;
  		}

			
		
}

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         //if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
      }

	function validacion()
	{	

	 //var i=document.getElementsByClassName('test').length; 
	 
	 var x = document.getElementsByClassName("test");
		
		for (i = 0; i < x.length; i++)
		{
			
    		 if (x[i].value  <= 0  || x[i].value == 0 || /^\s+$/.test(x[i]))
    		 {
    		 	 //alert('Quantity can not be less than 1 or empty ' + x[i].value);
    		 	 alert('Quantity can not be less than 1 or empty');
    		 	 x[i].focus();
    		 	 return false;
    		 }
		}
	 
	
	 
		// if ( valor <= 0  || valor.length == 0 || /^\s+$/.test(valor)) 
		//  {
 
		// alert('Qty error');
		// document.getElementById("quantity").focus();
		// return false;
		// }


		// valor=document.getElementById("quantity").value; 
	 
	 

	 
		// if ( valor <= 0  || valor.length == 0 || /^\s+$/.test(valor)) 
		//  {
 
		// alert('Qty error');
		// document.getElementById("quantity").focus();
		// return false;
		// }




		
  	}



			



$(document).on('ready',inicio);

//window.addEventListener("load",comenzar,false);








	