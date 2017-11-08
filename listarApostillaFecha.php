<?php
include 'header.php';
session_start();
$_SESSION["autentificado"] = 'A';
include("sesion.php");
$id=$_SESSION["id"];
include 'conexionSQL.php';
$consulta=$mysqli->query("SELECT * FROM usuarios where id = '$id'");
  while($fila=$consulta->fetch_array()){
    $cir=$fila["circunscripcion"];
    //echo "cir:$cir";
  } 
?>
<html lang="es" xml:lang="es">
<head>
<title>Buscar Apostillas por Fecha</title>
<body>
<h1>Buscar Apostillas</h1>
<form action="listarApostillaFecha2.php" method="post" >
  <label> Seleccionar Fecha de Entrada:</label>
  <input type="date"  name="entrada" step="1" min="2017-01-01" max="2017-12-31" value="2017-01-01" width="40%">
  <br><br>
  <label> Seleccionar Fecha de Salida:</label>
  <input type="date" name="salida" step="1" min="2017-01-01" max="2017-12-31" value="2017-01-01">
  
  <input type="submit" name="send" value="BUSCAR">

</form>

</body>
</html>