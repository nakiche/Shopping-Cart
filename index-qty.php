<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
	<title>CBA SHOPPING CAR</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
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
             
             <div class="car">
              <a href="./carritodecompras.php" title="My car"><img src="images/shop-cart-add-icon.png" width="150" height="158" border="0" alt="logo"></a>
              <div class="clr"></div>
        	 </div>
             <div class="clr"></div>
  		</div>  
    </div>   
             
	<div class="FBG">
    	<div class="FBG_content">
        
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
		
			$consulta="SELECT * FROM productos";
		
			//establecemos un filtro
		
			$resulados= mysqli_query($conexion,$consulta);
	
			while($fila=mysqli_fetch_array($resulados, MYSQL_ASSOC))
			{
			
		?>
				<div class="producto">
					<center>
					<img src="./images/<?php echo $fila['imagen'];?>"><br>
					<span>
					<?php echo $fila['nombre'] ;?></span><br>
					<span><?php echo '$ ' .$fila['precio']. ' ';?></span><br>
					<span><?php echo'Qty: ' ;?><input type="number" name="cantidad" id="cantidad"></span><br></form>
                	<a href="./carritodecompras.php?

                	id= 	
                	
                	<?php
                	
                	
                	echo $fila['ID'];
                	

                	

                	               	
                	?> & quantity=<?php echo $fila['ID'] ;?>">Add to cart</a><br>
					
					<a href="./detalles.php?id=<?php echo$fila['ID'];?>">Details</a>
					</center>
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
