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

$sr = $_POST['sr'];
      $nombre = $_POST['nombre'];
      $cargo = $_POST['cargo'];
      $institucion = $_POST['institucion'];
      //echo "sr:$sr<br>";
      //echo "nombre:$nombre <br>";
      //echo "cargo : $cargo <br>";
      //echo "institucion : $institucion <br>";
      //INSERT INTO `funcionarios` (`id`, `nombre`, `cargo`, `institucion`, `sr`, `anulado`) VALUES (NULL, 'silvina troncoso', 'ing', 'cn', 'sr', '0');
      $consulta=$mysqli->query("INSERT INTO `funcionarios` (`nombre`, `cargo`, `institucion`, `sr`, `anulado`) VALUES ('$nombre','$cargo','$institucion','0')");
          if( $consulta < 0){
              echo "no se creo el documento";
          }
          else {
                echo "El documento se creo con exito!";
          }

?>