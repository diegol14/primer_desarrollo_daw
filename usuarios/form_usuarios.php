<?php
require_once '../Funciones_db/funciones_usuarios.php';
if (!isset($_POST['action'])) {
    header("Location: ../index.php?Accion-NoDefinida") ;
    $error=true;;
}

/*if (!isset($_POST['Id']))  {
    header("Location: ../index.php?Id-NoDefinida") ;
    $error=true;
}else*/
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
        createUsuario();
        break;
        
        case 'modify':
        modifyUsuario()    ;
            break;
            
        case 'delete':
            deleteUsuario($idUsuario)   ;
            
            break;
        
        default:
            ;
        break;
    }  //End switch
    
    ;
} //End else
 ?>
   </body>
   </html>