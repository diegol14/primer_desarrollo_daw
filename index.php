<?php 
session_start();
if (!isset($_SESSION["user1"])) {
?>
<!DOCTYPE  HTML >

<html>

<head>
<title>My-Web-Server</title>
<meta name='viewport' content='width=device-width; initial-scale=1.0' />
<meta charset='utf-8' />
<link href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/css/header.css' rel='stylesheet' type='text/css' />
<link href='css/contenidos.css' rel='stylesheet' type='text/css' />
</head>
<body ><?php 
include 'cabecera_inicio.php';
//cabecera_bienvenida();
include_once 'conexion.php';
include 'Funciones_bd/Select_index_5noticias.php';


Select_index_5noticias(); ?>
</body>
<?php }else {
       
?>
<!DOCTYPE  HTML >

<html>

<head>
<title>My-Web-Server</title>
<meta name='viewport' content='width=device-width; initial-scale=1.0' />
<meta charset='utf-8' />
<link href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/css/header.css' rel='stylesheet' type='text/css' />
<link href='css/contenidos.css' rel='stylesheet' type='text/css' />
</head>
<body>
<?php

include 'cabecera.php';
//cabecera();
include_once 'conexion.php';
include 'Funciones_bd/Select_index_5noticias.php';


?>
<section class='contenidos'>
		<h1 class='miweb'>Tus Noticias</h1><br/><br/>

		<article>

			<p >
			<?php Select_index_5noticias(); ?>
			</p>
		</article>

	</section>
</body>
<footer><h2>pie session si</h2></footer>
</html>
<?php

} 

?>






