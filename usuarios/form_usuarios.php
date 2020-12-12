<?php
include_once '../cabecera.php';
include_once '../Funciones_bd/funciones_usuarios.php';
if ((! isset($_POST['action'])) and (! isset($_POST['Id']))) {
    header("Location: ../index.php?Accion-o-Id-NoDefinida");
    $error = true;
}else

?>

<!DOCTYPE HTML>
<html>
<head>
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title>Form de usuarios</title>
<meta charset="utf-8">

</head>

<body>
	
 <?php 

 //cabecera();
 
 
 { // llave del else
   
    ?>
   
  <section class='contenidos'>
		<h3>Acci&oacute;n a realizar: <?php echo $_POST['action']?></h3>
		<!-- Muestra la tarea a realizar-->
   
   <?php if ((isset($_POST['Id']))and ($_POST['action'])!='new') {?>
       <h3>N&uacute;mero de usuario: <?php echo $_POST['Id']?></h3>
		
		<!-- Muestra la Id del usuario a menos que sea nuevo: es 0 y la definirá el auto_increment -->
  <?php
    } // End if
    ?>
   
 <h1 align="center">Formulario de usuario</h1> 
 
 <?php

    switch ($_POST['action']) {
        case 'new':
            create_form_usuario();
            break;

        case 'modify':
            form_modify_usuario();
            break;

        case 'delete':
            delete_usuario();

            break;

        default:
            ;
            break;
    } // End switch
}// End else
function create_form_usuario()
{
    echo "<br/><H2>A&ntilde;adir Usuario</H2><br/>";
    ?>
    <form action="../Funciones_bd/funciones_usuarios.php"
			method="post" autocomplete="off">
			<input type="hidden" name="function_name" value="bd_createUsuario">

			<table border="0" align="center">
				<tr>
					<td><label for="Nombre">Nombre</label></td>
					<td><input type="text" name="Nombre" placeholder="Tu nombre"
						maxlength="50"></td>
				</tr>
				<tr>
					<td><label for="Contrasenia">Contrase&ntilde;a</label></td>
					<td><input type="password" name="Contrasenia"
						placeholder="Tu contrase&ntilde;a" maxlength="20"
						autocomplete="new-password"></td>
				</tr>
				<tr>
					<td><label for="Email">Email</label></td>
					<td><input type="email" name="Email" placeholder="tu&#64;mail.xx"
						maxlength="40"></td>
				</tr>
				<tr>
					<td><label for="Edad">Edad</label></td>
					<td><input type="number" name="Edad" maxlength="10"></td>
				</tr>
				<tr>
					<td><label for="Fecha_nacimiento">Fecha de nacimiento</label></td>
					<td><input type="date" name="Fecha_nacimiento" maxlength="20"
						value="AAAA-mm-dd"></td>
				</tr>
				<tr>
					<td><label for="Direccion">Direcci&oacute;n</label></td>
					<td><input type="text" name="Direccion" maxlength="100"></td>
				</tr>
				<tr>
					<td><label for="Codigo_Postal">C&oacute;digo Postal </label></td>
					<td><input type="number" name="Codigo_Postal" maxlength="10"
						placeholder="00000"></td>
				</tr>
				<tr>
					<td><label for="Provincia">Provincia</label></td>
					<td><select name="Provincia">
							<option>- selecciona -</option>
							<option value='alava'>&Aacute;lava</option>
							<option value='albacete'>Albacete</option>
							<option value='alicante'>Alicante/Alacant</option>
							<option value='almeria'>Almer&iacute;a</option>
							<option value='asturias'>Asturias</option>
							<option value='avila'>&Aacute;vila</option>
							<option value='badajoz'>Badajoz</option>
							<option value='barcelona'>Barcelona</option>
							<option value='burgos'>Burgos</option>
							<option value='caceres'>C&aacute;ceres</option>
							<option value='cadiz'>C&aacute;diz</option>
							<option value='cantabria'>Cantabria</option>
							<option value='castellon'>Castell&oacute;n</option>
							<option value='ceuta'>Ceuta</option>
							<option value='ciudadreal'>Ciudad Real</option>
							<option value='cordoba'>C&oacute;rdoba</option>
							<option value='cuenca'>Cuenca</option>
							<option value='girona'>Girona</option>
							<option value='laspalmas'>Las Palmas</option>
							<option value='granada'>Granada</option>
							<option value='guadalajara'>Guadalajara</option>
							<option value='guipuzcoa'>Guip&uacute;zcoa</option>
							<option value='huelva'>Huelva</option>
							<option value='huesca'>Huesca</option>
							<option value='illesbalears'>Illes Balears</option>
							<option value='jaen'>Ja&eacute;n</option>
							<option value='acoruña'>A Coru&ntilde;a</option>
							<option value='larioja'>La Rioja</option>
							<option value='leon'>Le&oacute;n</option>
							<option value='lleida'>Lleida</option>
							<option value='lugo'>Lugo</option>
							<option value='madrid'>Madrid</option>
							<option value='malaga'>M&aacute;laga</option>
							<option value='melilla'>Melilla</option>
							<option value='murcia'>Murcia</option>
							<option value='navarra'>Navarra</option>
							<option value='ourense'>Ourense</option>
							<option value='palencia'>Palencia</option>
							<option value='pontevedra'>Pontevedra</option>
							<option value='salamanca'>Salamanca</option>
							<option value='segovia'>Segovia</option>
							<option value='sevilla'>Sevilla</option>
							<option value='soria'>Soria</option>
							<option value='tarragona'>Tarragona</option>
							<option value='santacruztenerife'>Santa Cruz de Tenerife</option>
							<option value='teruel'>Teruel</option>
							<option value='toledo'>Toledo</option>
							<option value='valencia'>Valencia</option>
							<option value='valladolid'>Valladolid</option>
							<option value='vizcaya'>Vizcaya</option>
							<option value='zamora'>Zamora</option>
							<option value='zaragoza'>Zaragoza</option>
					</select></td>
				</tr>
				<tr>
					<td><label for="masculino">Masculino</label></td>
					<td><input type="radio" name="Genero" id="masculino"
						value='masculino'></td>
				</tr>
				<tr>
					<td><label for="femenino">Femenino</label></td>
					<td><input type="radio" name="Genero" id='femenino'
						value="femenino"></td>
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
function delete_usuario(){
    
    $id_usuario = $_POST['Id'];
    echo "<table><tr<<td>
            <form action='../Funciones_bd/funciones_usuarios.php' method='post'>
                <p>Usuario a borrar: " . $id_usuario . "</p>
                <input name='Id' type='hidden' value=" . $id_usuario . ">
                <input type=submit name='borrar' value='Borrar'>
            </form></td>
            <td><a href='../usuarios/list_usuarios.php' class='button'>Volver sin borrar</a>
            </td></tr>
         </table>";
    ;
}// End function delete
function form_modify_usuario()
{
    $id_usuario = $_POST['Id'];
    $connM07 = connection();

    $myquery = "SELECT * FROM usuarios where Id = $id_usuario";

    $result = mysqli_query($connM07, $myquery);

    while ($row = $result->fetch_assoc()) {
        ?>

<table>
	<form action='../Funciones_bd/funciones_usuarios.php' method='post'>
		<p>Usuario a modificar Id N&uacute;mero: <?php echo $id_usuario ?></p>
		<tr>
			<td><label for="Id">Id no modificable</label></td>
			<td><input type="number" name="Id" value="<?php echo $row["Id"]; ?>"
				readonly></td>
		</tr>
		<tr>
			<td><label for="Nombre">Nombre</label></td>
			<td><input type="text" name="Nombre"
				value="<?php echo $row["Nombre"]; ?>" maxlength="50"></td>
		</tr>
		<tr>
			<td><label for="Contrasenia">Contrase&ntilde;a</label></td>
			<td><input type="password" name="Contrasenia"
				value="<?php echo $row["Contrasenia"]; ?>" maxlength="20"></td>
		</tr>
		<tr>
			<td><label for="Email">Email</label></td>
			<td><input type="email" name="Email" maxlength="40"
				value="<?php echo $row["Email"]; ?>"></td>
		</tr>
		<tr>
			<td><label for="Edad">Edad</label></td>
			<td><input type="number" name="Edad" maxlength="10"
				value="<?php echo $row["Edad"]; ?>"></td>
		</tr>
		<tr>
			<td><label for="Fecha_nacimiento">Fecha de nacimiento</label></td>
			<td><input type="date" name="Fecha_nacimiento"
				value="<?php echo $row["Fecha_nacimiento"];?>" maxlength="20"></td>
		</tr>
		<tr>
			<td><label for="Direccion">Direcci&oacute;n</label></td>
			<td><input type="text" name="Direccion"
				value="<?php echo $row["Direccion"];?>" maxlength="100"></td>
		</tr>
		<tr>
			<td><label for="Codigo_Postal">C&oacute;digo Postal </label></td>
			<td><input type="number" name="Codigo_Postal" maxlength="10"
				value="<?php echo $row["Codigo_Postal"];?>"></td>
		
		
		<tr>
			<td><label for="Provincia">Provincia</label></td>
			<td><input type="text" name="Provincia"
				value="<?php echo $row["Provincia"];?>" maxlength="30"></td>
		</tr>
		</tr>
		<tr>
			<td>
					G&eacute;nero :<?php echo $row["Genero"];?> </td>
		</tr>
		<tr>
			<td><label for="masculino">Masculino</label></td>
			<td><input type="radio" name="Genero" id="masculino"
				value='masculino'></td>
		</tr>
		<tr>
			<td><label for="femenino">Femenino</label></td>
			<td><input type="radio" name="Genero" id='femenino' value='femenino'></td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		<?php

        echo "<td>
                <input name='Id' type='hidden' value=" . $id_usuario . ">
                <input type=submit name='modify' value='modify' align='center'>
				</td> <td><a href='../usuarios/list_usuarios.php' class='button'>Volver sin modificar</a>
            </td>
	</tr>
	</form>
</table>";
    } // End while
} // End function modify

?>