<!-- <!doctype html>
<html>
<head>
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta charset="utf-8">
	</head>
<body> -->

<?php

// funcion que realizaa listado de noticias
function Select_noticias()
{
    $connM07 = connection();

    $myquery = "SELECT * FROM noticias  ORDER BY Id DESC";

    $result = mysqli_query($connM07, $myquery);

    if (! $result) {
        echo "Error en la consulta " . mysqli_error() . " C&oacute;digo " . mysqli_connect_errno();
        ;
    } else {
        echo "<h4>N&uacute;mero de noticias registradas: " . $result->num_rows . "</h4><br/><br/>";
        ?>

<div
	style="border: 3px solid #ccc; background: #eee; text-align: center;">
	
	
	<?php while ($row=$result->fetch_assoc()) { ?>
	    
	  
		<div style="border: 3px solid #ccc; background: #eee; text-align: center;">
		
		<div><?php  echo $row['Id'] ?> (Id) </div>
		<div style='font-weight:bold; font-size:22px;'> <?php   echo $row["Titulo"] ?></div>
		<div><?php   echo $row["Contenido"] ?></div>
		<div style='float:right'> <?php   echo $row["Autor"] ?>-Autor-
	
	</div>
		<div style='float:left'><?php   echo $row["Likes"].'Likes' ?>
	  <form style=''
				action='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/Funciones_bd/funciones_noticias.php'
				method='post'>
				<input name="Id" type="hidden" value="<?php echo $row['Id']?>"> <input
					name="action" type="hidden" value="like"> <input type="submit"
					name='like' value="Me gusta"
					style='font-size:1rem;font-weight:bold;'></input>
			</form>
		</div>
		<div><br/></div>
		<div style='float:center; text-align:center;  display:inline-block;'>
			<form  action="form_noticias.php" method="post">
				<input name="Id" type="hidden" value="<?php echo $row['Id']?>"> <input
					name="action" type="hidden" value="modify"> <input type="submit"
					value="modify"
					style='font-size:1rem;font-weight:bold;color:blue;'></input>
			</form>
		
			<form action="form_noticias.php" method="post">
				<input name="Id" type="hidden" value="<?php echo $row['Id']?>"> <input
					name="action" type="hidden" value="delete"> <input type="submit"
					value="delete"
					style='font-size:1rem;font-weight:bold;'></input>
			</form>
		</div>
	
				<?php
        } // end while
    } // end else
    $result->close();
    $connM07->close();
}
; // end function
?>
<!-- </body>
	
</html>	 -->