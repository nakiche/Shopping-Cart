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
    		 	//var v= document.getElementsByClassName('error2');
				//v[0].style.display ="block";
				//v[0].innerHTML='Quantity cannot be less than 1';
    		 	 //alert('Quantity can not be less than 1 or empty ' + x[i].value);
    		 	 //alert('Quantity can not be less than 1 or empty');
    		 	 x[i].focus();
    		 	 
    		 	 $(document).ready(function(){
					$(".errortext").text('Quantity cannot be less than 1');
					$(".error2").fadeIn("slow");
					
				 });	

    		 	 
    		 	 return false;
    		 	 

    		 }else{
    		 		$(document).ready(function(){
					$(".error2").fadeOut("slow");
					
				 	});	
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

}



	



function validarSelect()
{	
	indice=document.getElementById("opciones").selectedIndex;

		if( indice == "" ) 
		{  	
  		//alert("Please choose a transport type");
  		//var v= document.getElementsByClassName('error2');
  		//v[0].style.display ="block";
		//v[0].innerHTML='Please choose a transport type';

		$(document).ready(function(){
		$(".errortext").text('Please choose a transport type');
		$(".error2").fadeIn("slow");
					
		});	

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
  		//var v= document.getElementsByClassName('error2');
		//v[0].style.display ="none";
  		$(document).ready(function(){
		$(".error2").fadeOut("slow");
					
		});	
  		
  		}


		
}

function noEnoughMoney()
{
		
		$(document).ready(function(){
		$(".errortext").text('Sorry your current cash is too low, check your cart');
		$(".error2").fadeIn("slow");
					
		});	
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
                     //alert("rating saved");
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








	