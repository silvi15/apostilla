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
?>
<body>
<form name="contact_form" method="post"action="buscarApostilla2.php" onsubmit="return validate_form ( );">

<p align="left"><strong> Buscar Apostilla </strong></p><br>
 <!--Intervencion -->

         <td class="nombre">Numero </td>
             <td class="fila">
               <input type="text" name="numero" size="100" maxlength="10" value="">
             </td>


<br><br><br>
<input name="buscar" type="submit" value="BUSCAR">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>

<script type="text/javascript">
function validate_form ( )
{
    valid = true;
//numero
    if ( document.contact_form.numero.value == "" )
    {
        alert ( "[ERROR] El campo número no puede ir vacio" );
        valid = false;
    }
    /*validar que el campo numero sea numerico*/
    return valid;
}
//-->
</script>
</body>
</html>
