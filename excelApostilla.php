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
echo "<br> EXCEL APOSTILLA <br>";
?>
<body>
<form name="contact_form" method="post"action="Reporte/reporteexcel/excelApostilla2.php" onsubmit="return validate_form ( );">
<p align="center"> <strong>CREAR REPORTE APOSTILLA </strong></p><br>
<table>
<!-- mes -->
<tr>
        <td class="nombre"> MES </td>
        <td class="fila">
        <?php
            $consulta=$mysqli->query("SELECT * FROM tiposdoc ORDER BY tipo ASC");
        ?>
        <select name="mes">
        <?php
        for ($i=1; $i<=12; $i++) {
            if ($i == date('m'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>
    </td>
</tr>
</table>

  <input type="submit" name="send" value="ENVIAR">

</form>




