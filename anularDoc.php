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

//verifico que el usuario sea carlos
$rolCarlos="carlos";
if(strcmp($usuario,$rolCarlos)==0){
  $id=$_GET['id'];
  $consulta=$mysqli->query("UPDATE tiposdoc SET anulado='0' WHERE id = '$id'");
  echo "<br><br>";
          if( $consulta > 0){
            ?>
              <script>
        function myFunction() {
            alert("El Documento fue ANULADO exito!");
        }
      </script>
<br>
<script type="text/javascript" ></script>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=listarDocumentos.php">

<?php

          }
          else {
                echo "El funcionario no se creo ";
          }  
  }
}//cierro el if
else{
  echo " <br> NO TENGO PERMISOS PARA ACCEDER <BR> <br>";
}
?>
  <a href="inicio.php">Volver</a>
<?php 
/*  
*/


?>
