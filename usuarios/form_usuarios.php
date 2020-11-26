<?php
require_once '../Funciones_db/funciones_usuarios.php';
if (!isset($_POST['action'])) {
    header("Location: ../index.php?Accion-NoDefinida") ;
    $error=true;;
}

if (!isset($_POST['Id']))  {
    header("Location: ../index.php?Id-NoDefinida") ;
    $error=true;
}else
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
   <h3>N&uacute;mero de usuario: <?php echo $_POST['Id']?></h3>
   
   <?php 
   $idUsuario=$_POST['Id'];
   ?>
   
 <h1>Formulario de usuario</h1> 
 
 <?php 
 $connm07=connection();
    switch ($_POST['action']) {
        case 'new':
        createUsuario();
        break;
        
        case 'modify':
        modifyUsuario()    ;
            break;
            
        case 'delete':
         //deleteUsuario()   ;
            echo "Borro usuario con Id:".$idUsuario ;
            $queryDel="DELETE FROM usuarios where Id='$idUsuario'";
            
            if ($result = mysqli_query($connm07, $queryDel)) {
                $affected_rows = mysqli_affected_rows($connm07);
                if ($affected_rows==0) {
                    echo "<br/>No se han podido eliminar usuarios" ;
                }
                else{  echo "<br/>Registro/s borrado/s : ".$affected_rows; } 
            }
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