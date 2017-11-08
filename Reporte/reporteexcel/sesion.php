<?php
if(!isset($_SESSION['id'])) { //Comprobamos que la sesión se haya iniciado
		header("Location: index.php");
        }

if ($_SESSION["validar"] != $_SESSION["autentificado"]) {  // sesion no validada
    header("Location: index.php?errorSesion");
}
?>
