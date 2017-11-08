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
   $hoy = date("Y-m-d");
  $diaInicio='01';
  $mesInicio=date("m");
  $anoInicio=date("Y");
  $fechaInicio=("$anoInicio-$mesInicio-$diaInicio");
  //echo "fechaInicio: $fechaInicio";
?>
<div id="div-regForm">
  <form action="listarLegalizacionFecha.php" method="post" >
  <h1>Buscar LEGALIZACIONES por fechas</h1><p>
  <label> Seleccionar Fecha de Entrada:</label>
  <input type="date"  name="entrada" step="1" min="2017-01-01" max="2017-12-31" value="2017-01-01" width="40%">
  <br><br>
  <label> Seleccionar Fecha de Salida:</label>
  <input type="date" name="salida" step="1" min="2017-01-01" max="2017-12-31" value="2017-01-01">
  
  <input type="submit" name="send" value="BUSCAR">

</form>

<div id="div-regForm">
    <form id="regForm" action="" method="post">
      <table>
        <p align="center"><strong>LEGALIZACIONES</strong></p><br>
        <a href="listarLegalizacionTodo.php">Listar Todo</a><p>
        <tr>
            </tr>
              <tr>
                <td>id</td>
                <td>Número</td>
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
//$consult=$mysqli->query("SELECT * FROM  apostillas where intervencion ='Legalizacion' ORDER BY id DESC ");
//$consult=$mysqli->query("SELECT * FROM legalizaciones  ORDER BY id DESC ");
$consult=$mysqli->query("SELECT * FROM legalizaciones where intervencion = 'Legalizacion' AND fecha BETWEEN  '$fechaInicio' AND '$hoy' ORDER BY id DESC ");

while($row= $consult->fetch_array()){
$rows[]=$row;
}
foreach ($rows as $row) { ?>
<tr>
<td align="center">
<?php
$id=$row['id'];
$seleccion = $mysqli->query("SELECT * FROM legalizaciones WHERE id ='$id'");
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
 <a href='verLegalizacion.php?id=$id'>Ver</a>
 </td>";
 echo "
 <td style='text-align:center'>
 <a href='imprimirLegalizacionLista.php?id=$id'>Imprimir</a>
 </td>";
 echo "
 <td style='text-align:center'>
 <a href='editarLegalizacion.php?id=$id'>Editar</a>
 </td>";
 echo "
 <td style='text-align:center'>
 <a href='anularLegalizacion.php?id=$id'>Anular</a>
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
