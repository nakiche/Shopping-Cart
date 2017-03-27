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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./js/scripts.js"></script>
</head>

<body>
	<div class="block_header">
       <div class="header">
    		 <div class="logo">
              <a href="./index.php" title="Home"><img src="images/logo.png" width="265" height="78" 	border="0" alt="logo"></a>
        	 </div>
    
			 <h1>
             E-SHOP
             </h1>
             
            
         <div class="clr"></div>
    	</div>
    </div>   
             
	<div class="FBG">
    	<div class="FBG_content">
    	
    	<div class="inline">
    		
    		<h1>Details</h1>
    	 		<div class="cart" >
    	 		<a href="./carritodecompras.php" title="My car"><img src="images/carrito.png" width="32" height="32" border="0" alt="mycart"></a>
    	 		<h2><?php echo '(' . $current_status. ')';?></h2>	
    	 		</div>    	 	
			</div>
        
	<?php
		require 'conexion.php';
		
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
			<div class="details">
				<div class="centrado">
					<form action="carritodecompras.php" method="get" onclick="return validacion(this);">
					<img src="./images/<?php echo $fila['imagen'];?>"><br>
					<span>Product: <?php echo $fila['nombre'] ;?></span><br>
					<span>Price: <?php echo '$ ' .$fila['precio']. ' ';?></span><br>
					<input type="hidden" value="<?php echo $fila['ID'] ;?>" name="id">
					<span>Quantity:<input type="number" value="1" name="quantity" class="test"></span><br>
					<input type="submit" class="button" value="Add to cart!">
					</form>

					<a href="index.php"> Search products </a>
					
                	
				</div>
			</div>
        
			<?php
		}
		
		mysqli_close($conexion);
			
			?>

		  <div class="clr"></div>
		</div>
    	 <div class="clr"></div>
	</div>             

</body>
</html>