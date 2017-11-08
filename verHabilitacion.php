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
$seleccion = $mysqli->query("SELECT * FROM habilitaciones WHERE id ='$id'");
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
<a href="listarHabilitacion.php" font-family: sans-serif>Volver</a>
<form name="informe" action="imprimirHabilitacionLista.php" method="get">
<p class="informe">
<?php
echo "Intervencion: $intervencion <br>";
echo "Numero: $numero <br>";
echo "Serie: $serie <br>";
echo "Factura: $factura <br>";
echo "Arancel Consular: $nombreArancel <br>";
echo "Funcionario: $nombreFuncionario <br>";
echo "Institución : $nombreInstitucion <br>";
echo "Cargo : $nombreCargo <br>";
echo "Fecha: $fecha <br>";
echo "Año: $ano <br>";
echo "Circunscripcion: $nombrecir <br>";
echo "Tipo Doc: $nombreDoc <br>";
echo "Nombre Apellido: $nombreApellido <br>";
echo "Detalle: $titulardoc <br>";
echo "Importe: $nombreImporte <br>";
echo "Pais: Argentina <br>";
echo "Provincia: Mendoza <br>";
echo "legalizador: $legalizador";

?>

<p>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
	  <input type="submit" name="imprimir" value="imprimir"> <br>
	</form>
