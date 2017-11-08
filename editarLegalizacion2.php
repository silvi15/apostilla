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
		$legalizador=$fila["usuario"];
  }
$idLega=$_POST["id"];
$intervencion=$_POST["intervencion"];
$numero=$_POST['numero'];
$serie =$_POST['serie'];
$factura = $_POST['factura'];
$arancelconsular=$_POST['arancelconsular'];
$funcionario=$_POST['nombre'];
$fecha = $_POST['fecha'];
//fecha:  2016-09-22
$ano = substr($fecha,0,4);
$circunscripcion = $_POST['circunscripcion'];
$tipodoc=$_POST['tipo'];
$nombreApellido=$_POST['nombreApellido'];
$titulardoc = $_POST['titulardoc'];
$importe = $_POST['importe'];
$idpais="Argentina";
$idprovincia="MENDOZA";
//funcionarios
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
$consulta=$mysqli->query("UPDATE legalizaciones SET intervencion='$intervencion', numero='$numero',serie='$serie',
factura='$factura',funcionario='$funcionario',fecha='$fecha',tipodoc='$tipodoc',titulardoc='$titulardoc',
nombreApellido='$nombreApellido',arancelconsular='$arancelconsular',importe='$importe' WHERE id='$idLega'");
/*
$consulta=$mysqli->query("UPDATE apostillas SET intervencion='$intervencion',idautoridad='$idautoridad' , numero='$numero',serie='$serie',
factura='$factura',funcionario='$funcionario',fecha='$fecha',tipodoc='$tipodoc',titulardoc='$titulardoc',
nombreApellido='$nombreApellido',arancelconsular='$arancelconsular',importe='$importe' WHERE id='$id'");
*/

if($consulta>0){
	echo"<br>la legalizacion fue grabada con exito";

?>
<form name="informe" action="imprimirLegalizacionLista.php" method="get">
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

}else{
	echo"error con la legalizacion";
}
?>
