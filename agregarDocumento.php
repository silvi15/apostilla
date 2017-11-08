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
$rolEmi="egonzalez";
if(strcmp($usuario,$rolCarlos)==0){
  if(isset($_POST['submit'])) 
    { 
      $tipo = $_POST['tipo'];
      $consulta=$mysqli->query("INSERT INTO tiposdoc (tipo, anulado) VALUES ('$tipo','0')");
          if( $consulta > 0){
              echo "Se creo el Documento con exito!";
          }
          else {
                echo "El Documento no se creo ";
          }     
    }
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p align="left"><strong> Agregar Documento </strong></p><br>
   Tipo<input type="text" name="tipo"><br><br>
   <input type="submit" name="submit" value="Agregar"><br><br>
</form>


<?php
}//cierro el if
else{
  echo " <br> NO TENGO PERMISOS PARA ACCEDER COMO CARLOS <BR> <br>";
}
if(strcmp($usuario,$rolEmi)==0){
  if(isset($_POST['submit'])) 
    { 
      $tipo = $_POST['tipo'];
      $consulta=$mysqli->query("INSERT INTO tiposdoc (tipo, anulado) VALUES ('$tipo','0')");
          if( $consulta > 0){
              echo "Se creo el Documento con exito!";
          }
          else {
                echo "El Documento no se creo ";
          }     
    }
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p align="left"><strong> Agregar Documento </strong></p><br>
   Tipo<input type="text" name="tipo"><br><br>
   <input type="submit" name="submit" value="Agregar"><br><br>
</form>


<?php
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
