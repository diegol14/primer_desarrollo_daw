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

    $myquery = "SELECT * FROM noticias";

    $result = mysqli_query($connM07, $myquery);

    if (! $result) {
        echo "Error en la consulta " . mysqli_error() . " C&oacute;digo " . mysqli_connect_errno();
        ;
    } else {
        echo "N&uacute;mero de noticias registradas: " . $result->num_rows . "<br/><br/>";
        ?>

<div class='contenedor-tabla'>
	<table width=100%>
		<tr>
			<td><span class="notranslate">Id</span></td>
			<td>T&iacute;tulo</td>
			<td>Autor</td>
			<td>Likes</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
	<?php while ($row=$result->fetch_assoc()) { ?>
	    
	  
				<table width=100%>

					<tr>
						<td><?php  echo $row['Id'] ?>(Id) </td>
						<td> <?php   echo $row["Titulo"] ?>-T&iacute;tulo-</td>
						<td> <?php   echo $row["Autor"] ?>-Autor-</td>
						<td> <?php   echo $row["Likes"] ?>Likes</td>
						<td>
							<form action="form_noticias.php" method="post">
								<input name="Id" type="hidden" value="<?php echo $row['Id']?>">
								<input name="action" type="hidden" value="modify"> <input
									type="submit" value="modify"></input>
							</form>
						</td>
						<td>
							<form action="form_noticias.php" method="post">
								<input name="Id" type="hidden" value="<?php echo $row['Id']?>">
								<input name="action" type="hidden" value="delete"> <input
									type="submit" value="delete"></input>
							</form>
						</td>
					</tr>
				</table>	
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


	
	