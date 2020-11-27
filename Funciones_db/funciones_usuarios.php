<?php
require_once '../conexion.php';


function createUsuario(){
    
    
}

function modifyUsuario() {
    ;
}

function deleteUsuario($idUsuario, $connm07) {
    echo "Borro usuario con Id:".$idUsuario ;
    $queryDel="DELETE FROM usuarios where Id='$idUsuario'";
    
    if ($result = mysqli_query($connm07, $queryDel)) {
        $affected_rows = mysqli_affected_rows($connm07);
        if ($affected_rows==0) {
            echo "<br/>No se han podido eliminar usuarios" ;
        }
        else{  echo "<br/>Registro/s borrado/s : ".$affected_rows; }
    }
    
}