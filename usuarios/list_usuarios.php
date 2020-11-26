<?php

//utiklizo require_once para no incluir 2 veces la conexion luego.
//Según el manual PHP no tiene "contraindicaciones" aunque por su funcionamiento se deduce que consumenre cursos". 
require_once '../conexion.php';

require '../Funciones_db/Select_usuarios.php';


?>

<?php 




?>
<!DOCTYPE HTML>
<html>
   <head>
   	<title>Listado de usuarios</title>
   	<meta charset="utf-8">
   </head>
    
<?php echo  "<h2>Listado de usuarios</h2><br/><br/>"; 

//Muestra el botón crear  usuario?>

<form action="Form_usuarios.php" method="post">
	<input name="action" type="hidden" value="nuevo">
	<input type="submit" value="Nuevo"></input>
</form>
<br/>
<?php
// En Select_usuaros están modify y delete
Select_usuarios();
?>

</html>