<?php
require_once '../conexion.php';

if (isset($_POST['function_name'])){
    
    switch ($_POST['function_name']){
        case 'bd_createUsuario':
            bd_createUsuario();
           
    }//End switch
}//Enf if isset


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
                       echo "Error en la creaci�n de usuarios, se han insertado: ".$affected_rows." registros";
            } //End if result
        else {
            echo "Usuario creado, registro insertado = ".$affected_rows;
        }
               
        
        $connM07->close();
    
}//End function bd_create_usuario

function bd_modifyUsuario() {
    ;
}

function bd_deleteUsuario($idUsuario) {
   
    echo "Se va a borrar usuario con Id:".$idUsuario ;
    
   
            
    $connm07=connection();
    
   
            
    $queryDel="DELETE FROM usuarios where Id='$idUsuario'";
    
    if ($result = mysqli_query($connm07, $queryDel)) {
        $affected_rows = mysqli_affected_rows($connm07);
        if ($affected_rows==0) {
            echo "<br/>No se han podido eliminar usuarios" ;
        }//End if affected_rows
        else{  echo "<br/>Registro/s borrado/s : ".$affected_rows; 
        }//End else
        }//End if result
    $result->close();
    $connm07->close();
}//End function
