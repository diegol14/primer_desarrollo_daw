<?php
require_once '../conexion.php';


function bd_createUsuario(){
    
        
    
}

function bd_modifyUsuario() {
    ;
}

function bd_deleteUsuario($idUsuario) {
   
    echo "Se va a borrar usuario con Id:".$idUsuario ;
    
   /* echo "<table><tr<<td>
            <form action='../usuarios/form_usuarios.php' method='post'>
                <input type=submit name='borrar' value='Borrar'>
            </form></td>
             <td><a href='../usuarios/list_usuarios.php' class='button'>Volver sin borrar</a>
             </td></tr>
             </table>";*/
            
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
   
    $connm07->close();
}//End function
