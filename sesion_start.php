<?php
session_start();
#Conectamos con MySQL
include("conexionSQL.php");
$res =$mysqli->query("SELECT id, rol, usuario FROM usuarios WHERE (usuario = '$_POST[usuario]' && clave = '$_POST[clave]')");
//$consulta=$mysqli->query("SELECT ApellidoCliente, NombreCliente FROM notariounicos WHERE NroDoc = '$NroDoc'");

if ($row = $res ->fetch_array()) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['usuario'] = $row['usuario'];
    header("Location: entrar.php");
    die();
} else {
    header("Location: index.php?errorUsuarioIncorrectoClaveIncorrecta");
    echo "error en usuario o clave incorrecta";
    die();
}
?>
