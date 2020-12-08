<?php
include_once 'conexion.php';
// funcion que realizaa listado de las ultimas 5 noticias
function Select_index_5noticias()
{
    $connM07 = connection();
    
    $myquery = "SELECT * FROM noticias ORDER BY Id DESC LIMIT 5";
    
    $result = mysqli_query($connM07, $myquery);
    
    if (! $result) {
        echo "Error en la consulta " . mysqli_error() . " C&oacute;digo " . mysqli_connect_errno();
        ;
    } else {
        echo "<p>Las &Uacute;ltimas ".  $result->num_rows ." noticias:</p><br/>";
        ?>

<div class='contenedor-tabla'>
	
	
	<?php while ($row=$result->fetch_assoc()) { ?>
	    
	  
				<table width=100%>

					<tr>
						<!-- <td><?php // echo $row['Id'] ?>(Id) </td> -->
						<td> <?php   echo $row["Titulo"] ?>-T&iacute;tulo-</td>
						<td> <?php   echo $row["Autor"] ?>-Autor-</td>
						<td> <?php   echo $row["Contenido"] ?>-Contenido-</td>
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



?>

