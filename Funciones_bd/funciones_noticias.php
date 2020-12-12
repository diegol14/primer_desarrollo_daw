<!DOCTYPE HTML>
<html>
<head>
<link href='../css/header.css' rel='stylesheet' type='text/css' />
<link href='../css/contenidos.css' rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title>Funciones_noticias</title>
<meta charset="utf-8">

</head>

<body>

<?php
// Aquí están las funciones que modifican la base de datos:
// bd_delete_noticia();
// bd_modify_noticia();
// bd_create_noticia();
// bd_likes
include_once '../cabecera.php';
// cabecera();
?>
 <section class='contenidos'>
<?php
require_once '../conexion.php';

if (isset($_POST['function_name'])) {

    switch ($_POST['function_name']) {
        case 'bd_create_noticia':
            bd_create_noticia();
    } // End switch
} // Enf if isset ?>

<?php
if (isset($_POST['borrar'])) {
    // echo "recibo este id:".$_POST['Id'];
    bd_delete_noticia();
}
if (isset($_POST['modify'])) {

    // echo "recibo este id:".$_POST['Id'];
    bd_modify_noticia();
}

if (isset($_POST['like'])) {
    bd_likes(); // End if submit like
}

function bd_create_noticia()
{
    $connM07 = connection();
    mysqli_set_charset($connM07, "utf-8");

    echo "<H2>Datos insertados: </H2><br/>";

    if (empty($_POST['Titulo'])) {
        $titulo = null;
    } else {
        echo "<br/>";
        echo $titulo = $_POST['Titulo'];
    }
    if (empty($_POST['Contenido'])) {
        $contenido = null;
    } else {
        echo "<br/>";
        echo $contenido = $_POST['Contenido'];
    }
    if (empty($_POST['Autor'])) {
        $autor = 'Anonimo';
    } else {
        echo "<br/>";
        echo $autor = $_POST['Autor'];
    }

    $myquery = "INSERT INTO noticias (
        Titulo, Contenido, Autor)
        values ( '$titulo', '$contenido', '$autor')";

    $result = mysqli_query($connM07, $myquery);
    $affected_rows = mysqli_affected_rows($connM07);
    if (! $result) {
        echo "Error en la creación de noticias, se han insertado: " . $affected_rows . " registros";
    } // End if result
    else {
        echo "<br/>Noticia creada, registro insertado : " . $affected_rows;
    }

    $connM07->close();
}

function bd_delete_noticia()
{
    $connM07 = connection();

    $id_noticia = $_POST['Id'];

    $query_del = "DELETE FROM noticias where Id=$id_noticia";

    $result = $result = mysqli_query($connM07, $query_del);

    if ($result) {
        $affected_rows = mysqli_affected_rows($connM07);
        if ($affected_rows == 0) {
            echo "<br/>No se han podido eliminar noticias";
        } // End if affected_rows

        else {
            echo "Se borr&oacute; noticia con Id:" . $id_noticia;
            echo "<br/>Registro/s borrado/s : " . $affected_rows;
        } // End else
    } // End if result

    $connM07->close();
}

// End function delete noticia
function bd_modify_noticia()
{
    $connM07 = connection();
    mysqli_set_charset($connM07, "utf-8");

    $id_noticia = $_POST['Id'];

    echo "<H2>Datos actualizados: </H2><br/>";
    echo "Actualizando noticia n&uacute;mero: " . $id_noticia . "<br/>";

    if (empty($_POST['Titulo'])) {
        $titulo = NULL;
    } else {
        echo "<br/>";
        echo $titulo = $_POST['Titulo'];
    }
    if (empty($_POST['Contenido'])) {
        $contenido = "Contenido de noticia vacio";
    } else {
        echo "<br/>";
        echo $contenido = $_POST['Contenido'];
    }
    if (empty($_POST['Autor'])) {
        $autor = "Desconocido";
    } else {
        echo $autor = $_POST['Autor'];
    }

    $myquery = "UPDATE noticias SET Titulo ='$titulo', Contenido = '$contenido',
                Autor = '$autor'
                   WHERE Id = '$id_noticia' ";

    $result = mysqli_query($connM07, $myquery);
    $affected_rows = mysqli_affected_rows($connM07);
    if (! $result) {
        echo "<br/>Error en la ediión de noticias, se han actualizado: " . $affected_rows . " registros";
    } // End if result
    else {
        echo "<br/>Noticia actualizada, registros editados : " . $affected_rows;
    }
    $connM07->close();
}

// End modify noticia
function bd_likes()
{
    session_start();
    // Si el usuario está logueado y no tiene cookie inserto la cookie
    if (isset($_SESSION['user1'])) {
        $Id_noticia = $_POST['Id'];
        $cookie_name = "like" . $Id_noticia;
        if (! isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, 1, time() + 365 * 24 * 60 * 60); // un año
            query_add_likes();
        } // End if no_hay_cookie y query
        else {
            header('Location:/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/index.php?Ya has votado');
            echo " <script>alert('Ya has votado');</script>";
        } // End else hay_cookie
    } // End if hay_usuario
    else {
        query_add_likes();
        header('Location:/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/index.php?Like-anonimo');
    } // Si no hay usuario like anónimo
}

// end function bd_likes
function query_add_likes()
{
    $connM07 = connection();
    mysqli_set_charset($connM07, "utf-8");
    $Id_noticia = $_POST['Id'];
    $myquery = "UPDATE noticias SET Likes=Likes+1 WHERE Id='$Id_noticia'";
    $result = mysqli_query($connM07, $myquery);
    $affected_rows = mysqli_affected_rows($connM07);
    if (! $result) {
        // echo "<br/>Error en laconsulta, se han actualizado: " . $affected_rows . " registros";
        header('Location:/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/index.php?error-en-la-consulta');
    } // End if result
    else {
        // echo 'Se han actualizado ' . $affected_rows . ' Likes en la consulta';
        header('Location:/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/index.php?Like-sumado');
    } // End else if result

    $connM07->close();
}
?>
    </section>
</body>
</html>









