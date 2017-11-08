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
$entrada = $_POST['entrada']; echo "entrada: $entrada <br>";
$salida = $_POST['salida']; echo "salida : $salida <br>"; 
?>
<form id="regForm" action="" method="post">
      <table>
        <p align="center"><strong>HABILITACIONES</strong></p><br>
        <a href="listarHabilitacionTodo.php">Listar Todo</a><p>
        <a href="listarHabilitacion.php">Listar Por Fecha</a><p>
        <tr>

            </tr>
              <tr>
                <td>id</td>
                <td>Numero</td>
                <td>Serie</td>
                <td>Año</td>
                <td>circunscripcion</td>
                <td>Funcionario</td>
                <td>Fecha</td>
                <td>Legalizador</td>
                <td>Tipo Documento</td>
                <td>Detalle</td>
                <td>Anulado</td>
                <td>Nombre Apellido</td>
                <td>Intervencion</td>
                <td>Arancel Consular</td>
                <td>Importe</td>
                <td>Ver</td>
                <td>Imprimir</td>
                <td>Editar</td>
                <td>Anular</td>

<?php
//$consult=$mysqli->query("SELECT * FROM  apostillas where intervencion ='Habilitacion' ORDER BY id DESC ");
//$consult=$mysqli->query("SELECT * FROM  habilitaciones ORDER BY id DESC ");
$consult=$mysqli->query("SELECT * FROM  habilitaciones where intervencion = 'Habilitacion' AND fecha BETWEEN  '$entrada' AND '$salida' ORDER BY id DESC ");

while($row= $consult->fetch_array()){
$rows[]=$row;
}
foreach ($rows as $row) { ?>
<tr>
<td align="center">
<?php
$id=$row['id'];
$seleccion = $mysqli->query("SELECT * FROM habilitaciones WHERE id ='$id'");
while ($fila6 = $seleccion->fetch_array()) {
              echo $fila6['id'];
             $numero=$fila6["numero"];
             $serie=$fila6['serie'];
             $ano=$fila6['ano'];
             $circunscripcion=$fila6['circunscripcion'];
             $funcionario=$fila6['funcionario'];
             $fecha=$fila6['fecha'];
             $legalizador=$fila6['legalizador'];
             $tipodoc=$fila6['tipodoc'];
             $titulardoc=$fila6['titulardoc'];
             $anulado=$fila6['anulado'];
             $nombreApellido=$fila6['nombreApellido'];
             $intervencion=$fila6['intervencion'];
             $arancelconsular=$fila6['arancelConsular'];
             $importe=$fila6['importe'];
             $fechaf=date("d/m/Y",strtotime($fecha));
            }
    ?>
  </td>
<td align="center"><?php echo "$numero"; ?></td>
<td align="center"><?php echo "$serie"; ?></td>
<td><?php echo "$ano"; ?></td>
<td align="center"><?php echo "$circunscripcion"; ?></td>
<td>
  <?php
  $consulta=$mysqli->query("SELECT nombre FROM funcionarios WHERE id ='$funcionario' ");
      while ($fila=$consulta->fetch_array()) {
          $nombreFuncionario=$fila['nombre'];
          //echo "funcionario: $nombreFuncionario <br>";
      }
  echo "$nombreFuncionario";
  ?>
</td>
<td><?php echo "$fechaf"; ?></td>
<td align="center" ><?php echo "$legalizador"; ?></td>
<td>
  <?php
  $consulta=$mysqli->query("SELECT tipo FROM tiposdoc WHERE id ='$tipodoc' ");
      while ($fila=$consulta->fetch_array()) {
          $documento=$fila['tipo'];
          echo "$documento <br>";
      }
   echo "$tipodoc";
   ?>
 </td>
<td><?php echo "$titulardoc"; ?></td>
<td align="center" ><?php echo "$anulado"; ?></td>
<td><?php echo "$nombreApellido"; ?></td>
<td><?php echo "$intervencion"; ?></td>
<td align="center">
  <?php
  $consulta=$mysqli->query("SELECT * FROM arancelconsular WHERE id ='$arancelconsular' ");
      while ($fila=$consulta->fetch_array()) {
          $arancel=$fila['nombre'];
          //echo "documento: $documento <br>";
      }
   echo "$arancel"; ?></td>
<td align="center">
  <?php
  $consulta=$mysqli->query("SELECT * FROM importe WHERE id ='$importe' ");
      while ($fila=$consulta->fetch_array()) {
          $imp=$fila['importe'];
          //echo "documento: $documento <br>";
      }
   echo "$$imp";
   ?>
</td>
<?php
 echo "
 <td style='text-align:center'>
 <a href='verHabilitacion.php?id=$id'>Ver</a>
 </td>";
 echo "
 <td style='text-align:center'>
 <a href='imprimirHabilitacionLista.php?id=$id'>Imprimir</a>
 </td>";
 echo "
 <td style='text-align:center'>
 <a href='editarHabilitacion.php?id=$id'>Editar</a>
 </td>";
 echo "
 <td style='text-align:center'>
 <a href='anularHabilitacion.php?id=$id'>Anular</a>
 </td>";

}
?>

</table>
<tr>
<td>&nbsp;</td>
<td>
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
</td>
</tr>
