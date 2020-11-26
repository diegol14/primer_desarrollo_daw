<?php
require_once '../conexion.php';


function createUsuario(){
    
    
}

function modifyUsuario() {
    ;
}

function deleteUsuario($idUsuario) {
    echo "Borro usuario con Id:".$idUsuario ;
    $myQueryDel="DELETE FROM usuarios where Id='$idUsuario'";
    
}