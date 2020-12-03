<?php
require_once '../conexion.php';

if (isset($_POST['function_name'])){
    
    switch ($_POST['function_name']){
        case 'bd_createUsuario':
            bd_createUsuario();
           
    }//End switch
}//Enf if isset

if (isset($_POST['borrar'])) {
    bd_deleteUsuario();
}


function bd_createUsuario(){
    
        $connM07=connection();
        mysqli_set_charset($connM07, "utf-8");
        
       echo "<H2>Datos insertados: </H2>";
        
       echo  "<br/>".$nombre = $_POST['Nombre'];
       echo  "<br/>".$psswrd = $_POST['Contrasenia'];
       echo "<br/>".$email = $_POST['Email'];
       echo "<br/>".$edad = $_POST['Edad'];
        echo "<br/>".$f_nac = $_POST['Fecha_nacimiento'];
        echo "<br/>".$dir = $_POST['Direccion'];
        echo "<br/>".$cp = $_POST['Codigo_Postal'];
        echo "<br/>".$prov = $_POST['Provincia'];
        echo "<br/>".$gen = $_POST['Genero']."<br/>";
        
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
            echo "Usuario creado, registro insertado = ".$affected_rows;
        }
               
        
        $connM07->close();
    
}//End function bd_create_usuario

function bd_modifyUsuario() {
    ;
}

function bd_deleteUsuario() {
   
    $connM07=connection();
    
    $id_usuario = $_POST['Id'];
    
    $query_del="DELETE FROM usuarios where Id=$id_usuario";
    
    $result = $result = mysqli_query($connM07, $query_del);
      
    
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
}//End function
