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
if(strcmp($usuario,$rolCarlos)==0 || strcmp($usuario,$rolEmi)==0){
  $id=$_GET['id'];
  
  $seleccionar=$mysqli->query("SELECT * FROM tiposdoc where id = '$id'");
  while($fila=$seleccionar->fetch_array()){
        $tipo=$fila['tipo'];
        $anulado=$fila['anulado'];
      
  }
 ?>
<form method="post" action="editarDocumento2.php">
<table>
  <p align="left"><strong> EDITAR DOCUMENTO</strong></p><br>
    <tr>
      <td class="nombre">ID </td>
        <td class="fila">
          <?php echo $id; ?>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
      </td>
  </tr>

  <tr>
      <td class="nombre">Tipo </td>
        <td class="fila">
         
          <input type="text" name="tipo" value="  <?php echo $tipo; ?>">
      </td>
  </tr>

  
   <table>
   <input type="submit" name="submit" value="EDITAR"><br><br>
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
