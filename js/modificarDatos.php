<?php
	session_start();
	$arreglo=$_SESSION['carrito'];
	
	$current=100;
	$total=0;
	$numero=0;
	$current_status=0;
	
	
	for($i=0;$i<count($arreglo);$i++)
	{


		if($arreglo[$i]['Id']==$_POST['Id'])
		{
			$numero=$i;
				
		}
		
		$arreglo[$numero]['Cantidad']=$_POST['Cantidad'];
	
		for($i=0;$i<count($arreglo);$i++)
		{
		
			$total=$total+($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
			/*current car status*/
			$current_status= $current_status+$arreglo[$i]['Cantidad'];
			$_SESSION['current_cart'] = $current_status;  
		}
	}
		
	$_SESSION['carrito']=$arreglo;
	
	echo 'Items in your cart: '.$current_status.' / ';
	
	echo 'Subtotal: $ '.number_format($total,2).' ';

?>

