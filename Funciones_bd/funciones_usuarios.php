<?php
include_once '../cabecera.php';
require_once '../conexion.php';
?>

<!-- En este archivo están las funciones:
bd_delete_usuario
bd_create_usuario
bd_modify_usuario
 -->
<!DOCTYPE HTML>
<html>
<head>
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title>Funciones de usuarios</title>
<meta charset="utf-8">

</head>

<body>
<?php// cabecera(); ?>

<section class='contenidos'>
<?php


if (isset($_POST['function_name'])){
    
    switch ($_POST['function_name']){
        case 'bd_createUsuario':
            bd_createUsuario();
           
    }//End switch
}//Enf if isset?>

<?php 

if (isset($_POST['borrar'])) {
   //echo "recibo este id:".$_POST['Id'];
    bd_deleteUsuario();
}

if (isset($_POST['modify'])) {
   
    //echo "recibo este id:".$_POST['Id'];
    bd_modify_usuario();
}


function bd_createUsuario(){
    
        $connM07=connection();
        mysqli_set_charset($connM07, "utf-8");
        
        
        
       echo "<H2>Datos insertados: </H2>";
        
       echo  "<br/>".$nombre = $_POST['Nombre'];
       echo  "<br/>".$psswrd = $_POST['Contrasenia'];
       echo "<br/>".$email = $_POST['Email'];
       if (empty($_POST['Edad'])) {
           $edad = NULL;
      }else {
          echo "<br/>".$edad = $_POST['Edad'];;
      }
      if (empty($_POST['Fecha_nacimiento'])){
          $f_nac = NULL;
      }else {
          echo "<br/>".$f_nac = $_POST['Fecha_nacimiento'];
      }
      if (empty($_POST['Direccion'])) {
          $dir = NULL;
      }else {
          echo "<br/>".$dir = $_POST['Direccion']; 
      }
      if (empty($_POST['Codigo_Postal'])) {
          $cp = NULL;
       } else {
           echo "<br/>".$cp = $_POST['Codigo_Postal'];;
       }
       if (empty($_POST['Provincia'])) {
           $prov = NULL;
        }else {
            echo "<br/>".$prov = $_POST['Provincia']; ;
        }
        if (empty($_POST['Genero'])) {
            $gen = NULL;
       }else {
           $gen = $_POST['Genero'];
           echo "<br/>".$gen."<br/>" ;
       }
       
        
        
        $myquery="INSERT INTO usuarios ( 
        Nombre, Contrasenia, Email, Edad, Fecha_nacimiento,  Direccion, Codigo_Postal, Provincia, Genero)
        values ( '$nombre', '$psswrd', '$email','$edad', '$f_nac', '$dir' , '$cp', '$prov', '$gen')";
        
        /*,, */
        /*, , ', */
        
        
        $result = mysqli_query($connM07, $myquery);
        $affected_rows = mysqli_affected_rows($connM07);
        if (!$result) {
                       echo "Error en la creación de usuarios, se han insertado: ".$affected_rows." registros";
            } //End if result
        else {
            echo "Usuario creado, registro insertado : ".$affected_rows;
        }
               
        
        $connM07->close();
    
}//End function bd_create_usuario

function bd_modify_usuario() {
    
    $connM07=connection();
    mysqli_set_charset($connM07, "utf-8");
    
    $id_usuario = $_POST['Id'];
    
    
    echo "<H2>Datos actualizados: </H2><br/>";
    echo  "Actualizando usuario n&uacute;mero: ".$id_usuario;
    
    echo  "<br/>".$nombre = $_POST['Nombre'];
    echo  "<br/>".$psswrd = $_POST['Contrasenia'];
    echo "<br/>".$email = $_POST['Email'];
    if (empty($_POST['Edad'])) {
        $edad = NULL;
    }else {
        echo "<br/>".$edad = $_POST['Edad'];;
    }
    if (empty($_POST['Fecha_nacimiento'])){
        $f_nac = NULL;
    }else {
        echo "<br/>".$f_nac = $_POST['Fecha_nacimiento'];
    }
    if (empty($_POST['Direccion'])) {
        $dir = NULL;
    }else {
        echo "<br/>".$dir = $_POST['Direccion'];
    }
    if (empty($_POST['Codigo_Postal'])) {
        $cp = NULL;
    } else {
        echo "<br/>".$cp = $_POST['Codigo_Postal'];;
    }
    if (empty($_POST['Provincia'])) {
        $prov = NULL;
    }else {
        echo "<br/>".$prov = $_POST['Provincia']; ;
    }
    if (empty($_POST['Genero'])) {
        $gen = NULL;
    }else {
        $gen = $_POST['Genero'];
        echo "<br/>".$gen."<br/>" ;
    }
    // echo $id_usuario;
    $myquery="UPDATE usuarios SET
        Nombre='$nombre', Contrasenia='$psswrd', Email='$email', Edad='$edad',
         Fecha_nacimiento='$f_nac', Direccion='$dir' ,Codigo_Postal='$cp',
         Provincia='$prov',Genero='$gen'
         WHERE Id = '$id_usuario' ";
    
    
    $result = mysqli_query($connM07, $myquery);
    $affected_rows = mysqli_affected_rows($connM07);
    if (!$result) {
        echo "Error en la ediión de usuarios, se han actualizado: ".$affected_rows." registros";
    } //End if result
    else {
        echo "Usuario actualizado, registros editados : ".$affected_rows;
    }
    
    $connM07->close();
    
}//End modify usuarios

function bd_deleteUsuario() {
   
    $connM07=connection();
    
    $id_usuario = $_POST['Id'];
    
    $query_del="DELETE FROM usuarios where Id=$id_usuario";
    
    $result = mysqli_query($connM07, $query_del);
      
    
    if ($result ) {
        $affected_rows = mysqli_affected_rows($connM07);
        if ($affected_rows==0) {
            echo "<br/>No se han podido eliminar usuarios" ;
        }//End if affected_rows
      
        else{ 
            echo "Se borró usuario con Id:".$id_usuario ;
            echo "<br/>Registro/s borrado/s : ".$affected_rows; 
            }//End else
        }//End if result
    
    $connM07->close();
}//End function modify



?>
</section>
</body>
</html>








