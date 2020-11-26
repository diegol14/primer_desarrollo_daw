<?php

function connection()
{
    $server = "127.0.0.1";
    $user = "root";
    $pass = "";
    $ddbb = "m07";
    $port = "3306";
    $tipo_y_db = "mysql:host=127.0.0.1; dbname=m07";

    $connm07 = mysqli_connect($server, $user, $pass, $ddbb);

    if (! $connm07) {
        echo "Conecction failed" . mysqli_connect_error() ."C&oacute;digo ". mysqli_connect_errno();
    } else {
       return $connm07;
        echo "Conectado a M07";
    }
    
    mysqli_set_charset($connm07, "utf-8");
    /*
     * Probé con PDO
     * try {
     *
     * $connM07 = new PDO($tipo_y_db, $user, $pass ) ;
     * echo "Conectado a DB M07";
     * } catch (Exception $e) {
     *
     * echo "Error en la conexi&oacute;n a M07<br/>".$e->getMessage()." C&oacute;digo ".$e->getCode();
     * }
     */
}
?>