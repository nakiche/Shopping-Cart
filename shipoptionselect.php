<?php
	session_start();
	$current = $_SESSION['current_cash']; 
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
	<title>CBA SHOPPING CAR</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./js/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<body>
	<div class="block_header">
       <div class="header">
    		 
        	 <div class="logo">
              <a href="./index.php"><img src="images/sc.png" width="265" height="78" 	border="0" alt="logo"></a>
        	 </div>
    
			           
             <div class="clr"></div>
  		</div>  
  		 <div class="clr"></div>
    </div>   
             
	<div class="FBG">
    	<div class="FBG_content"> 
        
			
        

	<?php
		
		
    	$total=0;
    	$nombre= $_GET['pick'];
    	$subtotal=0;

    	$transport=0;

			if ($nombre == "pickup")
			{
				$transport=0;
			}

			if ($nombre == "ups")
			{
				$transport=5;
							}
			 	


		if(isset($_SESSION['carrito'])) /*Valido si existe una sesion previa*/
		{
			$datos=$_SESSION['carrito']; /*almaceno los datos de la sesion en un array*/
			
			for($i=0;$i<count($datos);$i++)  /*Cargo todos los datos que tengo en el carrito y multiplico la cantidad por los precios para subtotalizar*/
			{
	?>										
			
			
			<?php  
		
			$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;    	
			

			}


			$subtotal=$total+$transport;

			if ($subtotal<=$current)
			{


				$current=$current-$subtotal;

			
				echo '<h2>Thank you for shopping</h2><br>';
				echo '<h2>Order summary:</h2>';
				echo '<h2>Item(s) Subtotal: $' .number_format($total,2). '</h2>';
				echo '<h2>Shipping & Handling: $' .number_format($transport,2). ' / '.$nombre. ' </h2>';
				echo '<h2>Order Grand total: $' .number_format($subtotal,2). '</h2>';
				echo '<h2>Your Current Cash is: $'.number_format($current,2). '</h2>';
			
				unset($_SESSION['carrito']);

				$_SESSION['once'] = 1;

				$_SESSION['current_cash'] = $current;
	


			}else{

			?>	

				<!-- Mensaje de error -->	
				<div class="error2">
				<h2 class="errortext"></h2>	
				</div>

				<script type="text/javascript"> 				
 				noEnoughMoney();
				</script> 

			<?php	

				//echo '<h2 class="error3">Sorry your current cash is too low, check your cart</h2>';
				
				$_SESSION['current_cash'] = $current;

				?>
				
				<div>
    		
    		
    	 		<div class="cart2" >
    	 		<a href="./carritodecompras.php" title="My cart"><img src="images/shop-cart-add-icon.png" width="80" height="80" border="0" alt="mycart"></a><br>
    	 		</div>	
    	 			 	
				</div>

				<?php
			}


			
		}else{	
			
			echo '<h2>Your cart is empty</h2>';
			echo '<h2>Your Current Cash is: $'.number_format($current,2). '</h2>';

			
					
		
		$_SESSION['current_cash'] = $current;
		
		
		}

		?>
		
		

	  	<p><a href="index.php"> Search products </a></p>

	 	
	 	
	 
		</div>

     <div class="clr"></div>
</div>             
</body>
</html>