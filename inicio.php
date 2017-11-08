<?php
include 'header.php';
session_start();

$_SESSION["autentificado"] = 'A';
include("sesion.php");
include 'conexionSQL.php';
$id=$_SESSION["id"];
$consulta=$mysqli->query("SELECT * FROM usuarios WHERE id = '$id'");
while($fila=$consulta->fetch_array()){
      $nombre=$fila['usuario'];
}


?>
<body>
  <form>
      <table>

          <p font-family="sans-serif">SISTEMAS DE APOSTILLAS Y LEGALIZACIONES<br><br>
          BIENVENIDO:<?php echo strtoupper($nombre); ?>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

      </table>
    <form>
</body>
