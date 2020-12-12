<?php 
//function cabecera() { Lo había hecho con 2 funciones pero esteticamente no funcionaba bien
 ?>   

<head>
<link href='css/header.css' rel='stylesheet' type='text/css' />
</head>
<header>
	<nav>
		<ul>
			<li><a href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/index.php'>Inicio</a></li>
			<li><a
				href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/usuarios/list_usuarios.php'>Lista
					de usuarios</a></li>
			<li><a
				href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/noticias/list_noticias.php'>Lista
					de noticias</a></li>
			<li><form
					action='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/usuarios/form_usuarios.php'
					method='post'>
					<input name='Id' type='hidden' value='0'> <input name='action'
						type='hidden' value='new'> <input class='submitlink' type='submit'
						value='Crear usuario'>Crear usuario</input>
				</form></li>

			<li><form
					action='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/noticias/form_noticias.php'
					method='post'>
					<input name='Id' type='hidden' value='0'> <input name='action'
						type='hidden' value='new'> <input class='submitlink' type='submit'
						value='Crear noticia'>Crear noticia</input>
				</form></li>
			<li><a	href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/loguin.php'>Log in</a></li>
			<li><form
					action='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/loguin.php'
					method='post'>
					 <input name='logout'
						type='hidden' value='new'> <input class='submitlink' type='submit'
						value='Log out'>Log out</input>
				</form></li>
		</ul>
	</nav>
</header>
?><?php 
//}
?>

<?php
/*function cabecera_bienvenida() {?>
<head>
<link href='css/header.css' rel='stylesheet' type='text/css' />
</head>
<header>
	<nav>
		<ul>
    		<li><a	href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/loguin.php'>Log in</a></li>
    		<li><a href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/index.php'>Inicio</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li><a	href=''>&nbsp;</a></li>
			<li align='center'><a>TUS NOTICIAS</a></li>		
		</ul>
	</nav>
</header> <?php 
}*/
?>





