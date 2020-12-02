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


   

   
   
   <h3>Acci&oacute;n a realizar: <?php echo $_POST['action']?></h3>
   <?php if (isset($_POST['Id'])) {?>
       <h3>N&uacute;mero de usuario: <?php echo $_POST['Id']?></h3> ;
  <?php  
   
   
   
  $idUsuario=$_POST['Id'];} //End if Die
   ?>
   
 <h1>Formulario de usuario</h1> 
 
 <?php 

    switch ($_POST['action']) {
        case 'new':
            create_form_usuario();
        break;
        
        case 'modify':
            modify_usuario()    ;
            break;
            
        case 'delete':
            delete_usuario($idUsuario)   ;
            
            break;
        
        default:
            ;
        break;
    }  //End switch
    
    
        
   
} //End else
    
function create_form_usuario() {
    echo "<br/><H2>A&ntilde;adir Usuario</H2>" ;?>
        
        <form action="../Funciones_bd/funciones_usuarios.php" method="post">
        	<input type="hidden" name="function_name" value="bd_createUsuario()">
        	
        	<label for ="Nombre">Nombre</label>
        	<input type ="text" name="Nombre" maxlength="50">
        	
        	<label for ="Contrasenia">Contrase&ntilde;a</label>
        	<input type ="text" name="Contrasenia" maxlength="20">
        	
        	<label for ="Email">Email</label>
        	<input type ="text" name="Email" maxlength="40">
        	
        	<label for ="Edad">Edad</label>
        	<input type ="number" name="Edad" maxlength="10">
        	
        	<label for ="Fecha_nacimiento">Fecha de nacimiento</label>
        	<input type ="date" name="Fecha_nacimiento" maxlength="20" value="AAAA-mm-dd">
        	
        	<label for ="Direccion">Direcci&oacute;n</label>
        	<input type ="text" name="Direccion" maxlength="100">
        	
        	<label for ="Codigo_Postal">C&oacute;digo Postal </label>
        	<input type ="number" name="Codigo_Postal" maxlength="10"value="00000">
        	
        	<label for ="Provincia">Provincia</label>
        	<input type ="text" name="Provincia" maxlength="30">
        	
        	<label for ="masculino">Masculino</label>
        	<input type ="radio" name="Genero" value="f" >
        	
        	<label for ="masculino">Femenino</label>
        	<input type ="radio" name="Genero" value="f">
        	
        	
        	<input type="submit" value="Aceptar">
        </form>
   </body>
   </html>
   
  <?php   }  ; //End Function?>