<?php
if ((!isset($_POST['id'])) and (!isset($_POST['action']))) {
    header("Location: ../index.php?Accion-o-Id-NoDefinida") ;
    $error=true;
}

else {
    ;
}




?>

<!DOCTYPE HTML>
<html>
   <head>
   	<title>Form de usuarios</title>
   	<meta charset="utf-8">
   	
   </head>
   
   <body>
   
   <h3>Acci&oacute;n a realizar: <?php echo $_POST['action']?></h3>
   
 <h1>Formulario de usuario</h1> 
   </body>
   </html>