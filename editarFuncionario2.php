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
	  $id = $_POST['id'];
      $sr = $_POST['sr'];
      $nombre = $_POST['nombre'];
      $cargo = $_POST['cargo'];
      $institucion = $_POST['institucion'];
      echo "id: $id <br>";
      echo "sr:$sr<br>";
      echo "nombre:$nombre <br>";
      echo "cargo : $cargo <br>";
      echo "institucion : $institucion <br>";
      /*
	$consulta=$mysqli->query("UPDATE apostillas SET intervencion='$intervencion',idautoridad='$idautoridad' , numero='$numero',serie='$serie',
	factura='$factura',funcionario='$funcionario',fecha='$fecha',tipodoc='$tipodoc',titulardoc='$titulardoc',
	nombreApellido='$nombreApellido',arancelconsular='$arancelconsular',importe='$importe' WHERE id='$id'");

      */
      $consulta=$mysqli->query("UPDATE funcionarios SET sr='$sr',nombre='$nombre',cargo='$cargo',institucion='$institucion',anulado='0' WHERE id = '$id'");
      //echo "mostrar consulta:";
      //print_r($consulta);
      echo "<br><br>";
          if( $consulta > 0){
          	?>
              <script>
				function myFunction() {
    				alert("El funcionario fue Modificado con exito!");
				}
			</script>
<br>
<script type="text/javascript" ></script>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=listarFuncionario.php">

<?php

          }
          else {
                echo "El funcionario no se creo ";
          }
?>
