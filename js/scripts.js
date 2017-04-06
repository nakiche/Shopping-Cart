
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {
            return false;
         }
         
      }

 function validacion()
	{	

	 //var i=document.getElementsByClassName('test').length; 
	  var x = document.getElementsByClassName("cantidad");
	 
		for (i = 0; i < x.length; i++)
		{
			
    		 if (x[i].value == 0)
    		 {
    		 	var v= document.getElementsByClassName('error2');
				v[0].style.display ="block";
				v[0].innerHTML='Quantity cannot be less than 1';
    		 	 //alert('Quantity can not be less than 1 or empty ' + x[i].value);
    		 	 //alert('Quantity can not be less than 1 or empty');
    		 	 x[i].focus();
    		 	 return false;
    		 	 

    		 }else{
    		 		var v= document.getElementsByClassName('error2');
					v[0].style.display ="none";
    		 }
		}

	}


function noEntries(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         //if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
      }

var inicio=function()

{   //funcion para actualizar la cantidad con la tecla enter
	
	$(".cantidad").keyup(function(e)
	{
		if($(this).val()!='')
		{ 
		

			//if(e.keyCode==13)
			//{
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				
				// if (cantidad<=0)
				// {
				// 	//$(this).parentsUntil('.producto').find('.error').text('Quantity cannot be less than 1');
					
				// 	var v= document.getElementsByClassName('error2');
				// 	v[0].style.display ="block";
				// 	v[0].innerHTML='Quantity cannot be less than 1';
				// 	return false;

				// 	}else{
				
				// 	var v= document.getElementsByClassName('error2');
				// 	v[0].style.display ="none";

				// }

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
				
			//}
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


function validarSelect()
{	
	indice=document.getElementById("opciones").selectedIndex;

		if( indice == "" ) 
		{  	
  		//alert("Please choose a transport type");
  		var v= document.getElementsByClassName('error2');
  		v[0].style.display ="block";
		v[0].innerHTML='Please choose a transport type';
  		document.getElementById("opciones").focus();
		
  		return false;

  		validarSelect2();
  		
  		}
		
}

function validarSelect2()
{	
	indice=document.getElementById("opciones").selectedIndex;

		if( indice != "" ) 
		{  	
  		var v= document.getElementsByClassName('error2');
		v[0].style.display ="none";
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



	$(function(){
               $('.rating').on('rating.change', function(event, value, caption) {
               	productId = $(this).attr('productId');
                $.ajax({
                  url: "rating.php",
                  dataType: "json",
                  data: {vote:value, productId:productId, type:'save'},
                  success: function( data ) {
                     alert("rating saved");
                  },
              error: function(e) {
                // Handle error here
                console.log(e);
              },
              timeout: 30000  
            });
              });
        });	

$(document).on('ready',inicio);

//window.addEventListener("load",comenzar,false);








	