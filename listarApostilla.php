<html>
<head>
<style type="text/css">
.regForm table {
  margin: 10px 10px 10px 5px;
  width: 14cm;
};
.regForm table td {
  border: 1px solid #000;
  font-family: sans-serif;
  margin: 15px;
  padding: 5px;
};
</style>
</head>
</body>
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
  //2017-02-07
  
  $hoy = date("Y-m-d");
  $diaInicio='01';
  $mesInicio=date("m");
  $anoInicio=date("Y");
  $fechaInicio=("$anoInicio-$mesInicio-$diaInicio");
  //echo "fechaInicio: $fechaInicio";

?>
<div id="div-regForm">
    <form class="regForm" action="" method="post">
      <table class="informeApos">
        <p align="center"><strong>Apostilla</strong><p>
        <br>
        <a href="listarApostillaTodo.php">Listar Todo</a>
        <br>
        <a href="listarApostillaFecha.php">Listar Apostillas Por Fecha</a>
        <tr>
            </tr>
              <tr>
                <td align="center">Id</td>
                <td align="center">Numero</td>
                <td align="center">Factura</td>
                <td align="center">Funcionario</td>
                <td align="center">Fecha</td>
                <td align="center">Legalizador</td>
                <td align="center">Tipo Documento</td>
                <td align="center">Detalle</td>
                <td align="center">Nombre Apellido</td>
                <td align="center">Ver</td>
                <td align="center">Imprimir</td>
                <td align="center">Editar</td>
                <td align="center">Anular</td>

<?php
//$consult=$mysqli->query("SELECT * FROM  apostillas where intervencion ='Apostilla' ORDER BY id DESC ");
$consult=$mysqli->query("SELECT * FROM  apostillas where intervencion = 'Apostilla' AND fecha BETWEEN  '$fechaInicio' AND '$hoy' ORDER BY id DESC ");
while($row= $consult->fetch_array()){
$rows[]=$row;
}
foreach ($rows as $row) { ?>
<tr>
<td align="center">
    <?php
        $id=$row['id'];
        $seleccion = $mysqli->query("SELECT * FROM apostillas WHERE id ='$id'");
            while ($fila6 = $seleccion->fetch_array()) {
             echo $fila6['id'];
             $numero=$fila6["numero"];
             $serie=$fila6['serie'];
             $factura=$fila6['factura'];
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
             $arancelConsular=$fila6['arancelConsular'];
             $importe=$fila6['importe'];
             $fechaf=date("d/m/Y",strtotime($fecha));
            }
    ?>
  </td>
<td align="center"><?php echo $numero; ?></td>
<td align="center"><?php echo $factura; ?></td>
<td>
  <?php
  $consulta=$mysqli->query("SELECT nombre FROM funcionarios WHERE id ='$funcionario' ");
      while ($fila=$consulta->fetch_array()) {
          $nombreFuncionario=$fila['nombre'];
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
          $nombreDocumento=$fila['tipo'];
      }
  echo "$nombreDocumento";
  ?>
</td>
<td><?php echo "$titulardoc"; ?></td>

<td><?php echo $nombreApellido; ?></td>

 <?php
  echo "
  <td style='text-align:center'>
  <a href='verApostilla.php?id=$id'>Ver</a>
  </td>";
  echo "
  <td style='text-align:center'>
  <a href='imprimirApostillaLista.php?id=$id'>Imprimir</a>
  </td>";
  echo "
  <td style='text-align:center'>
  <a href='editarApostilla.php?id=$id'>Editar</a>
  </td>";
  echo "
  <td style='text-align:center'>
  <a href='anularApostilla.php?id=$id'>Anular</a>
  </td>";

}//foreach
?>
</table>
<tr>
<td>&nbsp;</td>
<td>
</td>
</tr>
</body></html>
