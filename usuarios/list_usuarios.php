<?php
session_start();
if (!isset($_SESSION["user1"])){
header("Location: ../index.php") ;
}else {
// utiklizo require_once para no incluir 2 veces la conexion luego.
// Según el manual PHP no tiene "contraindicaciones" aunque por su funcionamiento se deduce que consumenre cursos".
require_once '../conexion.php';

require '../Funciones_bd/Select_usuarios.php';

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Listado de usuarios</title>
<meta charset="utf-8">
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
</head>
<body>
   <?php include_once '../cabecera.php';
  // cabecera();
?>
   <section class='contenidos'>
    
<h2>Listado de usuarios</h2><br/><br/>

<!-- Muestra el botón crear usuario --> 

<form action="form_usuarios.php" method="post">
			<input name="Id" type="hidden" value="0"> 
			<input name="action" type="hidden" value="new"> 
			<input type="submit" value="Nuevo"></input>
		</form>
		<br />
<?php
// En Select_usuarios están modify y delete
Select_usuarios();
?>
</section>

</body>
</html>
<?php 
;}//end else session
?>





