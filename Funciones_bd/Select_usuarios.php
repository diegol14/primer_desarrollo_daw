<?php

// funcion que realiza listado de usuarios
function Select_usuarios()
{
    $conn = connection();

    $myquery = "SELECT * FROM usuarios ";

    $result = mysqli_query($conn, $myquery);

    // echo "N&uacute;mero de usuarios registrados: ".mysqli_affected_rows($conn)."<br/><br/>"; Vale también

    if (! $result) {
        echo "Error en la consulta " . mysqli_error() . " C&oacute;digo " . mysqli_connect_errno();
    } else {
        echo "N&uacute;mero de usuarios registrados: " . $result->num_rows . "<br/><br/>";
        ?>

<div style='text-align:center;'>
	<table style='width:80%;'>
		<tr>
			<td width='10%'><span class="notranslate">Id</span></td>
			<td width='20%'>Nombre</td>
			<td width='20%'>Email</td>
			<td width='20%'>Provincia</td>
			<td width='15%'>&nbsp;</td>
			<td width='15%'>&nbsp;</td>
	</table>
        
       <?php while ($row=$result->fetch_assoc()) {   /*row=mysqli_fetch_array($result,MYSQLI_ASSOC) también funciona*/ ?> 
            
  
				<table style='width:80%;text-align:center;'>

					<tr>
						<td width='10%'><?php  echo $row['Id']." " ?> </td>
						<td width='20%'> <?php   echo $row["Nombre"]." " ?></td>
						<td width='20%'> <?php   echo $row["Email"] ." "?></td>
						<td width='20%'><?php   echo $row["Provincia"]." " ?></td>
						<td width='15%'>
							<form action="form_usuarios.php" method="post">
								<input name="Id" type="hidden" value="<?php echo $row['Id']?>">
								<input name="action" type="hidden" value="modify"> <input
									type="submit" value="modify"></input>
							</form>
						</td>
						<td width='15%'>
							<form action="form_usuarios.php" method="post">
								<input name="Id" type="hidden" value="<?php echo $row['Id']?>">
								<input name="action" type="hidden" value="delete"> <input
									type="submit" value="delete"></input>
							</form>
						</td>
						<br/>
				
                <?php
        } // end while
       ?> </div><?php 
    } // end else
    $result->close();
    $conn->close();
}
; // end function

?>