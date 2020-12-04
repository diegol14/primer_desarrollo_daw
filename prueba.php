<?php

require 'conexion.php';


$conn=connection();



$myquery="SELECT * FROM USUARIOS";

$result=mysqli_query($conn, "SELECT * FROM USUARIOS");


/* .<td>  " . $row['Contrasenia'] . " </td>
 <td> " . $row['Email'] . " </td>
 <td> " . $row['Edad'] . " </td>
 <td> " . $row['Fecha_nacimiento'] . " </td>
 <td> " . $row['Direccion'] . " </td>
 <td> " . $row['Codigo_Postal'] . " </td>
 <td> " . $row['Provincia'] . " </td>
 <td> " . $row['Genero'] . "</td>*/



 "<tr>
<td>Row 1: Col 1</td>
<td>Row 1: Col 2</td>
</tr>;"

?>