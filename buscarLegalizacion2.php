<?php
include 'header.php';
session_start();

$_SESSION["autentificado"] = 'A';
include("sesion.php");
$id=$_SESSION["id"];

include 'conexionSQL.php';

$numero=$_POST['numero'];
//echo "numero : $numero <br>";

//$consulta4 = $mysqli->query("SELECT * FROM apostillas WHERE numero = '$numero' and intervencion = 'Legalizacion' ");
$consulta4 = $mysqli->query("SELECT * FROM legalizaciones WHERE numero = '$numero'");
$row_cnt = $consulta4->num_rows;
if($row_cnt > 0){
echo "La Legalización fue encontrada<br>";
while ($fila6 = $consulta4->fetch_array()) {
 $id=$fila6['id'];
 $numero=$fila6["numero"];
 $serie=$fila6['serie'];
 $factura=$fila6['factura'];
 $ano=$fila6['ano'];
 $circunscripcion=$fila6['circunscripcion'];
 $funcionario=$fila6['funcionario'];
 $fecha=$fila6['fecha'];
 $legalizador=$fila6['legalizador'];
 $tipodoc=$fila6['tipodoc'];
 $factura=$fila6['factura'];
 $titulardoc=$fila6['titulardoc'];
 $anulado=$fila6['anulado'];
 $nombreApellido=$fila6['nombreApellido'];
 $intervencion=$fila6['intervencion'];
 $arancelconsular=$fila6['arancelConsular'];
 $importe=$fila6['importe'];
 $fechaf=date("d/m/Y",strtotime($fecha));
}
//circunscripcion
$consulta2=$mysqli->query("SELECT * from circunscripcion where id='$circunscripcion'");
while ($fila=$consulta2->fetch_array()) {
  $nombrecir=$fila['nombre'];
}
//funcionarios
$consulta2=$mysqli->query("SELECT * from funcionarios where id='$funcionario'");
while ($fila=$consulta2->fetch_array()) {
  $nombreFuncionario=$fila['nombre'];
}
//arancelconsular
$consulta2=$mysqli->query("SELECT * from arancelconsular where id='$arancelconsular'");
while ($fila2=$consulta2->fetch_array()) {
  $nombreArancel=$fila2['nombre'];
}
//tipodoc
$consulta3=$mysqli->query("SELECT * from tiposdoc where id='$tipodoc'");
while ($fila3=$consulta3->fetch_array()) {
  $nombreDoc=$fila3['tipo'];
}
//importe
$consulta4=$mysqli->query("SELECT * from importe where id='$importe'");
while ($fila4=$consulta4->fetch_array()) {
  $nombreImporte=$fila4['importe'];
}
?>
<form name="informe" method="get" action="imprimirLegalizacionLista.php">
<a href="listarLegalizacion.php"><strong>Volver</strong></a><br><br>
<p class="informe">
<?php
echo "<strong> ID: </strong> $id <br>";
echo "<strong> Intervención: </strong> $intervencion <br>";
echo "<strong> Número: </strong> $numero <br>";
echo "<strong> Serie: </strong> $serie <br>";
echo "<strong> Factura: </strong> $factura <br>";
echo "<strong> Arancel Consular: </strong> $nombreArancel <br>";
echo "<strong> Funcionario: </strong> $nombreFuncionario <br>";
echo "<strong> Fecha: </strong> $fecha <br>";
echo "<strong> Año: </strong> $ano <br>";
echo "<strong> Circunscripción: </strong> $nombrecir <br>";
echo "<strong> Tipo Doc: </strong> $nombreDoc <br>";
echo "<strong> Nombre Apellido: </strong> $nombreApellido <br>";
echo "<strong> Detalle: </strong> $titulardoc <br>";
echo "<strong> Importe: </strong> $nombreImporte <br>";
echo "<strong> País: </strong> Argentina <br>";
echo "<strong> Provincia: </strong> Mendoza <br>";
echo "<strong> Legalizador: </strong> $legalizador";
?>
<p>

  <input type="hidden" name="id" value="<?php echo $id; ?>"> <br>
  <input type="submit" name="imprimir" value="imprimir"> <br>
</form>
<?php
}//if
else{
echo "No exite esa Legalización  <br>";
}
