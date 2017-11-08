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

$idLega=$_POST["id"]; //echo "id: $idLega <br>";
$intervencion=$_POST["intervencion"]; //echo "intervencion: $intervencion <br>";
$numero=$_POST['numero']; //echo "numero: $numero <br>";
$serie =$_POST['serie']; //echo "serie : $serie <br>";
$factura = $_POST['factura']; //echo "factura $factura <br>";
$arancelconsular=$_POST['arancelconsular']; // echo "arancelconsular : $arancelconsular <br>";
$funcionario=$_POST['nombre']; //echo "funcionario : $funcionario <br>";
$fecha = $_POST['fecha']; //echo "fecha : $fecha <br>";
//fecha:  2016-09-22
$ano = substr($fecha,0,4); //echo "ano : $ano <br>";
$circunscripcion = $_POST['circunscripcion']; //echo " circunscripcion : $circunscripcion<br>";
$tipodoc=$_POST['tipo']; //echo " tipodoc: $tipodoc <br>";
$nombreApellido=$_POST['nombreApellido']; //echo " nombreApellido: $nombreApellido<br>";
$titulardoc = $_POST['titulardoc']; //echo "titulardoc: $titulardoc <br>";
$importe = $_POST['importe']; //echo "importe : $importe<br>";
$idpais="Argentina"; //echo "idpais: $idpais <br>";
$idprovincia="MENDOZA"; //echo "idprovincia: $idprovincia<br>";

//cir
$consulta2=$mysqli->query("SELECT * from circunscripcion where id='$circunscripcion'");
while ($fila=$consulta2->fetch_array()) {
	$nombrecir=$fila['nombre'];
}
//funcionarios
$consulta2=$mysqli->query("SELECT * from funcionarios where id='$funcionario'");
while ($fila=$consulta2->fetch_array()) {
	$nombreFuncionario=$fila['nombre'];
	$nombreInstitucion=$fila['institucion'];
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

$consulta=$mysqli->query("UPDATE habilitaciones SET intervencion='$intervencion', numero='$numero',serie='$serie',
factura='$factura',funcionario='$funcionario',fecha='$fecha',tipodoc='$tipodoc',titulardoc='$titulardoc',
nombreApellido='$nombreApellido',arancelconsular='$arancelconsular',importe='$importe' WHERE id='$idLega'");
/*
$consulta=$mysqli->query("UPDATE legalizaciones SET intervencion='$intervencion', numero='$numero',serie='$serie',
factura='$factura',funcionario='$funcionario',fecha='$fecha',tipodoc='$tipodoc',titulardoc='$titulardoc',
nombreApellido='$nombreApellido',arancelconsular='$arancelconsular',importe='$importe' WHERE id='$idLega'");
*/

if($consulta>0){
	echo"<br>La Habilitación fue grabada con exito";
?>
<form name="informe" action="imprimirHabilitacion2.php" method="POST">
<p class="informe">
<?php
echo "<strong> ID: </strong> $idLega <br>";
echo "<strong> Intervención: </strong> $intervencion <br>";
echo "<strong> Número: </strong> $numero <br>";
echo "<strong> Serie: </strong> $serie <br>";
echo "<strong> Factura: </strong> $factura <br>";
echo "<strong> Arancel Consular: </strong> $nombreArancel <br>";
echo "<strong> Funcionario: </strong> $nombreFuncionario <br>";
echo "<strong> Institución: </strong> $nombreInstitucion <br>";
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
  	  <input type="submit" name="imprimir" value="imprimir"> <br>

	</form>

<?php
}else{
	echo"Error con la Habilitación";
}

?>

