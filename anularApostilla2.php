<?php

include 'header.php';
session_start();

$_SESSION["autentificado"] = 'A';
include("sesion.php");
include 'conexionSQL.php';

$id=$_SESSION["id"];
$consulta=$mysqli->query("SELECT * FROM usuarios where id = '$id'");
  while($fila=$consulta->fetch_array()){
    $cir=$fila["circunscripcion"];
		$legalizador=$fila["usuario"];
  }

$id=$_POST['idapostilla'];
$intervencion=$_POST["intervencion"];
$idautoridad=$_POST['idAutoridad'];
$numero=$_POST['numero'];
$serie =$_POST['serie'];
$factura = $_POST['factura'];
$arancelconsular=$_POST['arancelconsular'];
$funcionario=$_POST['funcionario'];
$fecha = $_POST['fecha'];
//fecha:  2016-09-22
$ano = substr($fecha,0,4);
$circunscripcion = $_POST['circunscripcion'];
$tipodoc=$_POST['tipodoc'];
$nombreApellido=$_POST['nombreApellido'];
$titulardoc = $_POST['titulardoc'];
$importe = $_POST['importe'];
$idpais="Argentina";
$idprovincia="MENDOZA";
//circunscripcion
$consulta2=$mysqli->query("SELECT * from circunscripcion where nombre='$circunscripcion'");
while ($fila=$consulta2->fetch_array()) {
	$nombrecir=$fila['nombre'];
}
//arancelconsular
$consulta2=$mysqli->query("SELECT * from arancelconsular where id='$arancelconsular'");
while ($fila2=$consulta2->fetch_array()) {
	$nombreArancel=$fila2['nombre'];
}
//importe
$consulta4=$mysqli->query("SELECT * from importe where id='$importe'");
while ($fila4=$consulta4->fetch_array()) {
	$nombreImporte=$fila4['importe'];
}

?>
<form name="informe" action="listarApostilla.php" method="get">
<p class="informe">
<?php
echo "ID: $id <br>";
echo "Intervencion: $intervencion <br>";
echo "Autoridad: $idautoridad <br>";
echo "Numero: $numero <br>";
echo "Serie: $serie <br>";
echo "Factura: $factura <br>";
echo "Arancel Consular: $nombreArancel <br>";
echo "Funcionario: $funcionario <br>";
echo "Fecha: $fecha <br>";
echo "Año: $ano <br>";
echo "Circunscripcion: $nombrecir <br>";
echo "Tipo Doc: $tipodoc <br>";
echo "Nombre Apellido: $nombreApellido <br>";
echo "Detalle: $titulardoc <br>";
echo "Importe: $nombreImporte <br>";
echo "Pais: Argentina <br>";
echo "Provincia: Mendoza <br>";
echo "legalizador: $legalizador";
?>
<p>
    <input type="hidden" value="<?php echo $id; ?>">
	  <input type="submit" name="imprimir" value="imprimir"> <br>
	</form>

<?php
$consulta=$mysqli->query("UPDATE apostillas SET anulado='1' ,intervencion='$intervencion',idautoridad='$idautoridad' , numero='$numero',serie='$serie',
factura='$factura',funcionario='46',fecha='$fecha',tipodoc='784',titulardoc='$titulardoc',
nombreApellido='$nombreApellido',arancelconsular='$arancelconsular',importe='$importe' WHERE id='$id'");

/*$consulta = $mysqli->query("UPDATE clasificacion SET ano_inicial='$inicio',ano_final='$fin',
  puntaje_minimo='$puntaje_minimo', descripcion='$descripcion' WHERE id_clasificacion ='$id_clasificacion'");
*/

if($consulta>0){
	echo"<br>la Apostilla fue Anulada con exito";

}else{
	echo"Error la Apostilla no fue Anulada";
}

?>
