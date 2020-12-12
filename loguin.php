<?php 
include_once 'conexion.php';

if (isset($_POST['acceso'])) {
    bd_login_usuario();
}

if (isset($_POST['logout'])) {
    logout_usuario() ;
}
 include 'cabecera_inicio.php';?>



<!DOCTYPE HTML>
<html>
<head>
<title>LOG IN</title>
<meta charset="utf-8">
<link href='css/loguin.css' rel='stylesheet' type='text/css' />
<link href='/DAW_M07_UF03_PAC03_PereiraSotelo_DiegoLeonel/css/header.css' rel='stylesheet' type='text/css' />
<link href='css/contenidos.css' rel='stylesheet' type='text/css' />

</head>
<body>
	
	<?php// include 'cabecera_inicio.php';?>
	<br/>
	<h1>Tus Noticias</h1>
		<form method="post" action="" name="signin-form" autocomplete="off">
					
		<div class="form">
			<label id='lab'>Nombre</label> <input type="text" name="nombre"
				pattern="[a-zA-Z0-9]+" required/>
		</div>
		<div class="form">
			<label id='lab'>Contrase&ntilde;a</label> <input type="password" name="contrasenia"
				required />
		</div>
		<button type="submit" id="entrar"name="acceso" value="Acceso">Entrar</button>
		<button type="reset" id="reset" name="reset" value="reset">Reset</button>
	</form>
</body>
</html>
<?php 
function bd_login_usuario() {
    
    $connM07=connection();
    
    $nombre = $_POST['nombre'];
    $contrasenia = $_POST['contrasenia'];
    
     $myquery = "SELECT * FROM usuarios  WHERE Nombre='$nombre'";
    
    $result = mysqli_query($connM07, $myquery);
    
    if (! $result) {
        echo "Error en la consulta "  . " C&oacute;digo " . mysqli_connect_errno();
        echo " <script>alert('Error en la consulta');</script>"; 
    }//End if result
    else { $affected_rows = mysqli_affected_rows($connM07);
           if ($affected_rows<1) {
               echo " <script>alert(' Usuario incorrecto o no logueado ');</script>";
              // header("Location: login.php?varerror=sisi") ;
               }//End if affected rows<1
               else {
                   while ($row=$result->fetch_assoc()) { 
                        $contraseniaok = $row['Contrasenia'];
                   }//End while consulta
                   if (strcmp($contrasenia, $contraseniaok)==0) {
                       session_start();
                       $_SESSION['user1']="si";
                       header("Location: index.php") ;
                   }else {
                       echo " <script>alert('La contraseña no es correcta');</script>";
                       }
               }//End else consulta correcta
          }//End else affected_rows
      $connM07->close();
          
}//End function login_usuario

function logout_usuario() {
                            session_start() ;
                            session_destroy();
                            header('location:index.php');
}//End function logout_usuario

?>



