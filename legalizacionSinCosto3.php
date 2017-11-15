<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

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
$idlega= $_POST["idlega"];
$numerointervencion=$_POST["numerointervencion"];
$intervencion=$_POST["intervencion"];
$numero=$_POST['numero'];
$serie =$_POST['serie'];
$factura = $_POST['factura'];
$arancelconsular=$_POST['arancelconsular'];
$funcionario=$_POST['nombre'];
$fecha = date("Y-m-d");
$fechaf=date("d/m/Y",strtotime($fecha));
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
$consulta2=$mysqli->query("SELECT * from circunscripcion where id='$cir'");
while ($fila=$consulta2->fetch_array()) {
	$nombrecir=$fila['nombre'];
	$idcir=$fila['id'];
}

//funcionarios
$consulta2=$mysqli->query("SELECT * from funcionarios where id='$funcionario'");
while ($fila=$consulta2->fetch_array()) {
	$nombreFuncionario=$fila['nombre'];
	$nombreIns=$fila['institucion'];
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

$consulta=$mysqli->query("INSERT INTO apostillas (idAnterior,numero,serie,factura,ano,circunscripcion,idautoridad,funcionario,fecha,legalizador,idpais,idprovincia,tipodoc,titulardoc,anulado,nombreApellido,intervencion,arancelconsular,importe,formularioSinCosto)
VALUES ('$idApostilla','$numero','$serie','$factura','$ano','$idcir','$idAutoridad','$funcionario','$fecha','$legalizador','$idpais','$idprovincia','$tipodoc','$titulardoc','0','$nombreApellido','$intervencion','$arancelconsular','$importe','1')") or trigger_error($mysqli->error."[$consulta]");
$idApostillaNuevo = $mysqli->insert_id;


	
	if( $consulta < 0){
		echo "no se creo la Legalización";
	}
	else {
        echo "la Legalización se creo con exito!";
        
		?>


		<form name="informe" action="legalizacion.php" method="get">
			<p class="informe">
				<?php
				echo "<strong> ID: $idLegalizacionNuevo </strong> <br>";
				echo "<strong> Intervención:</strong> $intervencion <br>";
				echo "<strong> Número: </strong> $numero <br>";
				echo "<strong> Serie: </strong> $serie <br>";
				echo "<strong> Factura: </strong> $factura <br>";
				echo "<strong> Arancel Consular: </strong> $nombreArancel <br>";
				echo "<strong> Funcionario: </strong> $nombreFuncionario <br>";
				echo "<strong> Institucion: </strong> $nombreIns <br>";
				echo "<strong> Cargo: </strong> $nombreCargo <br>";
				echo "<strong> Fecha: </strong> $fechaf <br>";
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
					<input type="hidden" name="serie" value="<?php echo $serie; ?>">
					<input type="hidden" name="numero" value="<?php echo $numero; ?>">
					<input type="hidden" name="idLegalizacionNuevo" value="<?php echo $idLegalizacionNuevo; ?>"> <br>
					<input type="submit" name="imprimir" value="imprimir"> <br>
				</form>

				<?php
			}
			?>
