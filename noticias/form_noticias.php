<!DOCTYPE HTML>
<html>
<head>
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title>Form de noticias</title>
<meta charset="utf-8">

</head>

<body>

<?php

require_once '../Funciones_bd/funciones_noticias.php';
if ((! isset($_POST['action'])) and (! isset($_POST['Id']))) {
    header("Location: ../index.php?Accion-o-Id-NoDefinida");
    $error = true;
}else 

?>

	
 <?php
 include_once '../cabecera.php';
 
{ // llave del else
 
    ?>
    <section class='contenidos'>
		<h3>Acci&oacute;n a realizar: <?php echo $_POST['action']?></h3>
		<!-- Muestra la tarea a realizar-->
		
		   
   <?php if ((isset($_POST['Id']))and ($_POST['action'])!='new') {?>
       <h3>N&uacute;mero de noticia: <?php echo $_POST['Id'];?></h3>

		<!-- Muestra la Id del usuario a menos que sea nuevo: es 0 y la definirá el auto_increment -->
  <?php
    } // End if
    ?>
    <h1 align='center'>Formulario de noticia</h1>
    
   <?php

    switch ($_POST['action']) {
        case 'new':
            create_form_noticia();
            break;

        case 'modify':
            form_modify_noticia();
            break;

        case 'delete':
            delete_noticia();

            break;

        default:
            ;
            break;
    } // End switch
}// End else  
    
function create_form_noticia()
{
    echo "<br/><H2>A&ntilde;adir noticia</H2><br/>";
    ?>
  <form action="../Funciones_bd/funciones_noticias.php" method="post"
			autocomplete="off">
			<input type="hidden" name="function_name" value="bd_create_noticia">
			
			<table border="0" align="center">
				<tr>
					<td><label for="Titulo">Titulo</label></td>
					<td><input type="text" name="Titulo" maxlength="50" size="50"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><label for="Contenido">Contenido</label></td>
					<td><textarea name="Contenido" maxlength="300" cols="52" rows="6"></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><label for="Autor">Autor</label></td>
					<td><input type="text" name="Autor" maxlength="30"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="center"><input type="submit" value="Aceptar"></td>
				</tr>
			</table>
		</form>
	</section>
</body>
</html>

<?php
};// End Function create_form_usuario

function delete_noticia(){
    
    $id_noticia = $_POST['Id'];
    echo "<table><tr<<td>
            <form action='../Funciones_bd/funciones_noticias.php' method='post'>
                <p>Noticia a borrar: " . $id_noticia . "</p>
                <input name='Id' type='hidden' value=" . $id_noticia . ">
                <input type=submit name='borrar' value='Borrar'>
            </form></td>
            <td><a href='../noticias/list_noticias.php' class='button'>Volver sin borrar</a>
            </td></tr>
         </table>";
    ;
}// End function delete

function form_modify_noticia()
{
    $id_noticia = $_POST['Id'];
    $connM07 = connection();
    
    $myquery = "SELECT * FROM noticias where Id = $id_noticia";

    $result = mysqli_query($connM07, $myquery);

    while ($row = $result->fetch_assoc()) {
        ?>
<table>
	<form action='../Funciones_bd/funciones_noticias.php' method='post'>
	<p>Noticia a modificar Id N&uacute;mero: <?php echo $id_noticia ?></p>
	<tr>
			<td><label for="Id">Id no modificable</label></td>
			<td><input type="number" name="Id" value="<?php echo $row["Id"]; ?>"
				readonly></td>
		</tr>
		<tr>
			<td><label for="Titulo">T&iacute;tulo</label></td>
			<td><input type="text" name="Titulo"
				value="<?php echo $row["Titulo"]; ?>" maxlength="50"></td>
		</tr>
		<tr>
			<td><label for="Contenido">Contenido</label></td>
			<td>
			<textarea name="Contenido" cols="52" rows="6"
			 maxlength="300"><?php echo $row['Contenido'];?></textarea></td>
							
		</tr>
				<tr>
			<td><label for="Autor">Autor</label></td>
			<td><input type="text" name="Autor"
				value="<?php echo $row["Autor"]; ?>" maxlength="30"></td>
		</tr>
			<tr>
			<td><label for="Hora_creacion">Hora no modificable</label></td>
			<td><input type="datetime" name="Hora_creacion" value="<?php echo $row["Hora_creacion"]; ?>"
				readonly></td>
		</tr>
		<tr>
			<td><label for="Likes">Likes no modificable</label></td>
			<td><input type="number" name="Likes" value="<?php echo $row["Likes"]; ?>"
				readonly></td>
		</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		<?php

        echo "<td>
                <input name='Id' type='hidden' value=" . $id_noticia . ">
                <input type=submit name='modify' value='modify' align='center'>
				</td> <td><a href='../noticias/list_noticiass.php' class='button'>Volver sin modificar</a>
            </td>
	</tr>
	</form>
</table>";
		
    } // End while
} // End function modify

?>
	
	
	
	
	
	
	
	
	
	
	