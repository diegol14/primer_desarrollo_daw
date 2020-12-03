<?php
require_once '../Funciones_bd/funciones_usuarios.php';
if ((!isset($_POST['action']))and (!isset($_POST['Id']))){
    header("Location: ../index.php?Accion-o-Id-NoDefinida") ;
    $error=true;
}

 ?>

<!DOCTYPE HTML>
<html>
   <head>
   	<title>Form de usuarios</title>
   	<meta charset="utf-8">
   	
   </head>
   
   <body>
   
 <?php  {  //llave del else

?>


   

   
   
   <h3>Acci&oacute;n a realizar: <?php echo $_POST['action']?></h3><!-- Muestra la tarea a realizar-->
   
   <?php if ((isset($_POST['Id']))and ($_POST['action'])!='new') {?>
       <h3>N&uacute;mero de usuario: <?php echo $_POST['Id']?></h3> ;<!-- Muestra la Id del usuario a menos que sea nuevo: es 0 y la definirá el auto_increment -->
  <?php  
   
   
   
  $idUsuario=$_POST['Id'];} //End if 
   ?>
   
 <h1 align='center'>Formulario de usuario</h1> 
 
 <?php 

    switch ($_POST['action']) {
        case 'new':
            create_form_usuario();
        break;
        
        case 'modify':
            modify_usuario()    ;
            break;
            
        case 'delete':
            delete_usuario()   ;
            
            break;
        
        default:
            ;
        break;
    }  //End switch
    
    
        
   
} //End else
    
function create_form_usuario() {
    echo "<br/><H2 align='center'>A&ntilde;adir Usuario</H2>" ;?>
        
        <form action="../Funciones_bd/funciones_usuarios.php" method="post">
        	<input type="hidden" name="function_name" value="bd_createUsuario">
        	
        	<table border="0" align="center">
        		<tr>
        			<td><label for ="Nombre">Nombre</label></td>
        			<td><input type ="text" name="Nombre" value = "" maxlength="50"></td>
        		</tr>
        		<tr>
        			<td><label for ="Contrasenia">Contrase&ntilde;a</label></td>
        			<td><input type ="password" name="Contrasenia" maxlength="20"></td>
        		</tr>
        		<tr>
        			<td><label for ="Email">Email</label></td>
        			<td><input type ="email" name="Email" maxlength="40"></td>
        		</tr>
        		<tr>        		
        			<td><label for ="Edad">Edad</label></td>
        			<td><input type ="number" name="Edad" maxlength="10"></td>
        		</tr>
        		<tr>
        			<td><label for ="Fecha_nacimiento">Fecha de nacimiento</label></td>
        			<td><input type ="date" name="Fecha_nacimiento" maxlength="20" value="AAAA-mm-dd"></td>
        		</tr>
        		<tr>
        			<td><label for ="Direccion">Direcci&oacute;n</label></td>
        			<td><input type ="text" name="Direccion" maxlength="100"></td>
        		</tr>
        		<tr>        			
        			<td><label for ="Codigo_Postal">C&oacute;digo Postal </label></td>
        			<td><input type ="number" name="Codigo_Postal" maxlength="10"value="00000"></td>
        		</tr>
        		<tr>
        			<td><label for ="Provincia">Provincia</label></td>
        			<td><input type ="text" name="Provincia" maxlength="30"></td>
        		</tr>
        		<tr>        	
        			<td><label for ="masculino">Masculino</label></td>
        			<td><input type ="radio" name="Genero" value="m" ></td>
        		</tr>
        		<tr>
        			<td><label for ="femenino">Femenino</label></td>
        			<td><input type ="radio" name="Genero" value="f"></td>
        		</tr>
        		 <tr>
     				<td>&nbsp;</td>
      				<td>&nbsp;</td>
   				 </tr>
        			<tr>
        				<td>&nbsp;</td> 
        				<td align="center"><input type="submit" value="Aceptar" ></td>
        			</tr>
        	</table>
        </form>
   </body>
   </html>
   
  <?php   }  ; //End Function create_form_usuario
    
    
    function delete_usuario() {
        /* echo "<table><tr<<td>
         <form action='../usuarios/form_usuarios.php' method='post'>
         <input type=submit name='borrar' value='Borrar'>
         </form></td>
         <td><a href='../usuarios/list_usuarios.php' class='button'>Volver sin borrar</a>
         </td></tr>
         </table>";*/;
    }
    
    
    
    
    
    
    
    
    
    ?>