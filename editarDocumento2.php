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
    $usuario=$fila['usuario'];
    echo " <br><br> $usuario <br>";
  }

switch ($cir) {
  case '1':
      $cir="Primera";
    break;
  case '2':
      $cir="Segunda";
    break;
  case '3':
    $cir="Tercera";
    break;
  default:
    # code...
    break;
}
$id=$_POST['id']; echo "id: $id <br>";
$tipo =$_POST['tipo']; echo "tipo: $tipo <br>";
$consulta=$mysqli->query("UPDATE tiposdoc SET tipo='$tipo' WHERE id = '$id'");
      //echo "mostrar consulta:";
      //print_r($consulta);
      echo "<br><br>";
          if( $consulta > 0){
            ?>
              <script>
        function myFunction() {
            alert("El Documento fue Modificado con exito!");
        }
      </script>
<br>
<script type="text/javascript" ></script>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=listarDocumento.php">

<?php

          }
          else {
                echo "El Documento no se modificó ";
          }
?>
