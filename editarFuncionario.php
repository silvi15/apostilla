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
  $idf=$_GET['id'];
  echo "id es:$idf";
  $seleccionar=$mysqli->query("SELECT * FROM funcionarios where id = '$idf'");
  while($fila=$seleccionar->fetch_array()){
        $srbase=$fila['sr'];
        $nombrebase=$fila['nombre'];
        $cargobase=$fila['cargo'];
        $institucionbase=$fila['institucion'];
        
  }
  
  
?>
<form method="post" action="editarFuncionario2.php">
<table>
  <p align="left"><strong> Agregar Funcionario </strong></p><br>
    <tr>
      <td class="nombre">Sr </td>
        <td class="fila">
          <input type="text" name="sr" value="<?php echo $srbase; ?>" >
          <input type="hidden" name="id" value="<?php echo $idf; ?>">
      </td>
  </tr>

  <tr>
      <td class="nombre">Nombre </td>
        <td class="fila">
          <input type="text" name="nombre" value="<?php echo $nombrebase; ?>">
      </td>
  </tr>

  <tr>
      <td class="cargo">Cargo </td>
        <td class="fila">
          <input type="text" name="cargo" value="<?php echo $cargobase; ?>">
      </td>
  </tr>
  <tr>
      <td class="institucion">Institución </td>
        <td class="fila">
          <input type="text" name="institucion" value="<?php echo $institucionbase; ?>">
      </td>
  </tr>
   <table>
   <input type="submit" name="submit" value="Agregar"><br><br>
</form>


<?php
}//cierro el if
else{
  echo " <br> NO TENGO PERMISOS PARA ACCEDER COMO CARLOS <BR> <br>";
}
?>
  <a href="inicio.php">Volver</a>
<?php 
/*  
*/


?>
