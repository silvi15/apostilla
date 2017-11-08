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
?>
<form name="contact_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate_form ( );">

<table>
<p align="center"> <strong>Editar Documento </strong></p><br>
 <!--Tipo -->
<tr>
  <td class="nombre">Tipo Documento</td>
    <td class="fila">
          <input type="text" name="tipoDoc" size="100" maxlength="200">
      </td>
</tr>

</table>

  <input type="submit" name="send" value="Crear">

</form>
<script type="text/javascript">
function validate_form ( )
{
    valid = true;
if ( document.contact_form.numero.value == "" )
    {
        alert ( "[ERROR] El campo número no puede ir vacio" );
        valid = false;
    }
    return valid;
}
//-->
</script>

<?php
}
else{
  echo " <br> NO TENGO PERMISOS PARA ACCEDER <BR> <br>";
}
?>
  <a href="inicio.php">Volver</a>
