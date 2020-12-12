<?php
include_once 'conexion.php';

// funcion que realizaa listado de las ultimas 5 noticias
function Select_index_5noticias()
{
    $connM07 = connection();

    $myquery = "SELECT * FROM noticias ORDER BY Hora_creacion DESC LIMIT 5";

    $result = mysqli_query($connM07, $myquery);

    if (! $result) {
        echo "Error en la consulta " . mysqli_error() . " C&oacute;digo " . mysqli_connect_errno();
        ;
    } else {
        echo "<h3>Las &Uacute;ltimas " . $result->num_rows . " noticias:</h3><br/>";
        ?>

<div class='contenedor-tabla'>
	
	
	<?php while ($row=$result->fetch_assoc()) { ?>
	   <br/> 
	  <div style="border: 2px solid #ccc; background: #eee;">
		<div style="font-size: 1.5rem;font-weight: bold;"> <?php   echo $row["Titulo"] ?> </div>
		<div><?php   echo $row["Contenido"] ?></div>
		<div style="float:right;"><?php   echo $row["Autor"]." ". $row["Hora_creacion"] ?></div>
		<div><?php   echo $row["Likes"].'Likes' ?>
	  <form
				action='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/Funciones_bd/funciones_noticias.php'
				method='post'>
				<input name="Id" type="hidden" value="<?php echo $row['Id']?>"> <input
					name="action" type="hidden" value="like"> <input type="submit"
					name='like' value="Me gusta" style='font-size:1rem;font-weight:bold;'></input>
			</form>
		</div>
	</div>
				
				
				
				
				
				
				<?php
        } // end while
    } // end else
    $result->close();
    $connM07->close();
}
; // end function
?>



?>

