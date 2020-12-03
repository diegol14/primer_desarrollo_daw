<?php
// funcion que realiza listado de usuarios
function Select_usuarios()
{
    $conn = connection();
    
    $myquery = "SELECT * FROM usuarios ";
    
    $result = mysqli_query($conn, $myquery);
    
    //echo "N&uacute;mero de usuarios registrados: ".mysqli_affected_rows($conn)."<br/><br/>";  Vale también
    echo "N&uacute;mero de usuarios registrados: ".$result->num_rows."<br/><br/>";
    
    if (! $result) {
        echo "Error en la consulta " . mysqli_error() ." C&oacute;digo ". mysqli_connect_errno();
    } else {?>
        
        <div class='contenedor-tabla'>
        <table >
        	<tr>
        		<td ><span class="notranslate">Id</span></td>
        		<td  >Nombre</td>
        		<td width="42%">Email</td>
        		<td>Provincia</td>
        </table>
        
       <?php while ($row=$result->fetch_assoc()) {   /*row=mysqli_fetch_array($result,MYSQLI_ASSOC) también funciona*/ ?> 
            
             <table>
	          <tr>
	          <td>
                  <table>
                  
                    <tr>
                        <td ><?php  echo $row['Id'] ?> </td>
                        <td> <?php   echo $row["Nombre"] ?></td>
                        <td> <?php   echo $row["Email"] ?></td>
                         <td> <?php   echo $row["Provincia"] ?></td>
                     </tr>
                  </table>
                 </td>
                 <td>
                <form action="form_usuarios.php" method="post">
                <input name="Id" type="hidden" value="<?php echo $row['Id']?>">
                <input name="action" type="hidden" value="modify">
                <input type="submit" value="modify"></input>
                </form>
                </td>
                <td>
                <form action="form_usuarios.php" method="post">
                <input name="Id" type="hidden" value="<?php echo $row['Id']?>">
                <input name="action" type="hidden" value="delete">
                <input type="submit" value="delete"></input>
                </form>
                </td>
                </tr>
                </table>
                <?php } //end while
        } //end else
            $result->close();
            $conn->close();
        
    }; //end function
    
    ?>