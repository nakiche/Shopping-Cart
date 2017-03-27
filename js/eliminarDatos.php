<?php
	session_start();
	$arreglo=$_SESSION['carrito'];
	
	$current=100;
	$total=0;
	$numero=0;
	
	

	for($i=0;$i<count($arreglo);$i++)
	{
		
		if($arreglo[$i]['Id']==$_POST['Id'])
		{

			$numero=$i;
			unset($arreglo[$numero]);
				
			
		}
	}
	
	//$arreglo[$numero]['Cantidad']=$_POST['Cantidad'];		

	//for($i=0;$i<count($arreglo);$i++)
	//{
		
	//	$total=$total+($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
			
	//}
		
	
	$_SESSION['carrito']=$arreglo;	
	
	echo '$ '.$total.' ';
	
?>
