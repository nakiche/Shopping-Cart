<?php
	
	session_start();

	$current_status=($_SESSION['current_cart']);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
	<title>CBA SHOPPING CART</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="./js/scripts.js"></script>
	<script src="./js/star-rating.min.js" type="text/javascript"></script>

	<link href='images/favicon.ico' rel='shortcut icon' type='image/png'>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>

<body>
<div class="contenedor">
	<div class="block_header">
       <div class="header">
    		 
        	 <div class="logo">
              <a href="./index.php"><img src="images/sc.png" width="265" height="78" 	border="0" alt="logo"></a>
        	 </div>
    
			           
             
  		</div>  
  		 
    </div>   
             
	<div class="FBG">
    	<div class="FBG_content">
    	
    		
    			
    			<div class="titulo">
    			<h1>Details</h1>
    	 		</div>
    	 		<div class="cart" >
    	 			<a href="./carritodecompras.php" title="<?php echo "My Cart - " . $current_status . " Items" ;?>"><img src="images/carrito.png" width="32" height="32" border="0" alt="mycart"></a>
    	 			<h2><?php echo '(' . $current_status. ')';?></h2>	
    	 		</div>    	 	
			
    		    
	<?php
		require 'conexion.php';
		include_once 'rating.php';
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);
		
		//si llega a ejecutarse esta funcion
		if(mysqli_connect_errno())
		{
		
			echo "Fallo al conectar con la base de datos";
			exit();		
		}
		
		mysqli_select_db($conexion,$db_nombre)or die("no se encuentra la bdD");
		//para incluir los tildes	
		mysqli_set_charset($conexion, "utf8");
		
		$consulta="SELECT * FROM productos WHERE ID=".$_GET['id']." ";
		
		//establecemos un filtro
		
		$resulados= mysqli_query($conexion,$consulta);
		
		
		while($fila=mysqli_fetch_array($resulados, MYSQL_ASSOC)) 
		{
			
	?>
		<div class="products_details">

			<div class="details">
				<div class="centrado">
					<form action="carritodecompras.php" method="get" >
					<img src="./images/<?php echo $fila['imagen'];?>"><br>
					<span>Product: <?php echo $fila['nombre'] ;?></span><br>
					<span>Price: <?php echo '$ ' .$fila['precio']. ' ';?></span><br>
					<input type="hidden" value="<?php echo $fila['ID'] ;?>" name="id">
					<span>Quantity:<input type="number" value="1" name="quantity" onfocus="this.blur();" min="1" onkeypress="return noEntries(event);"></span><br>
					<input type="submit" class="button" value="Add to cart!" ><br>
					</form>
							
					
					
					<input value="<?= getRatingByProductId(connect(), $fila['ID']); ?>" type="number" class="rating" min=0 max=5 step=0.1 data-size="md" data-stars="5" productId="<?php echo $fila['ID'] ;?>">
					

                </div>
			</div>
			
			<div class="details"> 

				 <div class="justificado">

				<p><?php echo $fila['descripcion'] ;?></p>

				</div> 
	
			</div>	 

		<div>	

			
			
        
			<?php
		}
		
		mysqli_close($conexion);
			
			?>
			<div class="clr"></div>

			<div class="centrado">
				<a href="index.php"> Search products </a>   
			</div>

		 	
		  
		</div>
    	 <div class="clr"></div>
	</div>          

</div>
</body>
</html>