<?php

include 'header.php';
session_start();

$_SESSION["autentificado"] = 'A';
include("sesion.php");
$id=$_SESSION["id"];

include 'conexionSQL.php';

$id=$_GET['id'];
//echo"idlega: $idLega";
/*
$consulta=$mysqli->query("SELECT * FROM usuarios where id = '$id'");
  while($fila=$consulta->fetch_array()){
    $cir=$fila["circunscripcion"];
		$legalizador=$fila["usuario"];
}*/
$seleccion = $mysqli->query("SELECT * FROM legalizaciones WHERE id ='$id'");
    while ($fila6 = $seleccion->fetch_array()) {
     $numero=$fila6["numero"];
     $serie=$fila6['serie'];
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
    $nombreInstitucion=$fila['institucion'];
    $nombreCargo=$fila['cargo'];
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
<a href="listarLegalizacion.php" font-family: sans-serif>Volver</a>
<form name="informe" action="imprimirLegalizacionLista.php" method="get">
<p class="informe">
<?php
echo "<strong> Intervención: </strong> $intervencion <br>";
echo "<strong> Número: </strong> $numero <br>";
echo "<strong> Serie: </strong> $serie <br>";
echo "<strong> Factura: </strong> $factura <br>";
echo "<strong> Arancel Consular: </strong> $nombreArancel <br>";
echo "<strong> Funcionario: </strong> $nombreFuncionario <br>";
echo "<strong> Institución: </strong> $nombreInstitucion <br>";
echo "<strong> Cargo: </strong> $nombreCargo <br>";
echo "<strong> Fecha: </strong> $fecha <br>";
echo "<strong> Año: </strong> $ano <br>";
echo "<strong> Circunscripcion: </strong> $nombrecir <br>";
echo "<strong> Tipo Doc: </strong> $nombreDoc <br>";
echo "<strong> Nombre Apellido: </strong> $nombreApellido <br>";
echo "<strong> Detalle: </strong> $titulardoc <br>";
echo "<strong> Importe: </strong> $nombreImporte <br>";
echo "<strong> País: </strong> Argentina <br>";
echo "<strong> Provincia: </strong> Mendoza <br>";
echo "<strong> Legalizador: </strong> $legalizador";

?>

<p>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
	  <input type="submit" name="imprimir" value="imprimir"> <br>
	</form>
