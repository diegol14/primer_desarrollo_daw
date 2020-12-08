<?php

// utiklizo require_once para no incluir 2 veces la conexion luego.
// Según el manual PHP no tiene "contraindicaciones" aunque por su funcionamiento se deduce que consumenre cursos".
require_once '../conexion.php';

require '../Funciones_bd/Select_noticias.php';

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Listado de noticias</title>
<meta charset="utf-8">
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
</head>
<body>
   <?php include '../cabecera.php';
?>
<section class='contenidos'>

		<h2>Listado de noticias</h2><br /><br />

<!-- Muestra el botón crear noticia -->

<form action="form_noticias.php" method="post">
			<input name="Id" type="hidden" value="0">
			 <input name="action"	type="hidden" value="new"> 
			 <input type="submit" value="Nueva"></input>
		</form>
		<br />
<?php
// En Select_noticias están modify y delete
Select_noticias();
?>

</section>

</body>
</html>