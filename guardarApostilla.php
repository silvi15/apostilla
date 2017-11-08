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

$intervencion=$_POST["intervencion"];
$idAutoridad=$_POST['idAutoridad'];
$numero=$_POST['numero'];
$serie =$_POST['serie'];
$factura = $_POST['factura'];
$arancelconsular=$_POST['arancelconsular'];
$funcionario=$_POST['nombre'];
$fecha = date("Y-m-d");
//fecha:  2016-09-22
$ano = substr($fecha,0,4);
$circunscripcion = $_POST['circunscripcion'];
$tipodoc=$_POST['tipo'];
$nombreApellido=$_POST['nombreApellido'];
$titulardoc = $_POST['titulardoc'];
$importe = $_POST['importe'];
$idpais="Argentina";
$idprovincia="MENDOZA";
//circunscripcion
$consulta2=$mysqli->query("SELECT * from circunscripcion where id='$cir'");
while ($fila=$consulta2->fetch_array()) {
	$nombrecir=$fila['nombre'];
	$idcir = $fila['id'];
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
<?php
$consulta=$mysqli->query("INSERT INTO apostillas (numero,serie,factura,ano,circunscripcion,idautoridad,funcionario,fecha,legalizador,idpais,idprovincia,tipodoc,titulardoc,anulado,nombreApellido,intervencion,arancelconsular,importe)
	VALUES ('$numero','$serie','$factura','$ano','$idcir','$idAutoridad','$funcionario','$fecha','$legalizador','$idpais','$idprovincia','$tipodoc','$titulardoc','0','$nombreApellido','$intervencion','$arancelconsular','$importe')") or trigger_error($mysqli->error."[$consulta]");
$idApostillaNuevo = $mysqli->insert_id;

if( $consulta < 0){
	echo "no se creo la Apostilla";
}
else {
	echo "la Apostilla se creo con exito!";
	?>
	<form name="informe" method="get" action="apostilla.php">
		<p class="informe">
			<?php
			echo "<strong> ID:        </strong> $idApostillaNuevo <br>";
			echo "<strong> Autoridad:        </strong> $idAutoridad <br>";
			echo "<strong> Intervención:     </strong> $intervencion <br>";
			echo "<strong> Número:           </strong> $numero <br>";
			echo "<strong> Serie:            </strong> $serie <br>";
			echo "<strong> Factura:          </strong> $factura <br>";
			echo "<strong> Arancel Consular: </strong> $nombreArancel <br>";
			echo "<strong> Funcionario:      </strong> $nombreFuncionario <br>";
			echo "<strong> Institución:      </strong> $nombreInstitucion <br>";
			echo "<strong> Cargo:      </strong> $nombreCargo <br>";
			echo "<strong> Fecha:            </strong> $fecha <br>";
			echo "<strong> Año:              </strong> $ano <br>";
			echo "<strong> Circunscripción:  </strong> $nombrecir <br>";
			echo "<strong> Tipo Doc:         </strong> $nombreDoc <br>";
			echo "<strong> Nombre Apellido:  </strong> $nombreApellido <br>";
			echo "<strong> Detalle:          </strong> $titulardoc <br>";
			echo "<strong> Importe:          </strong> $nombreImporte <br>";
			echo "<strong> Pais:             </strong> Argentina <br>";
			echo "<strong> Provincia:        </strong> Mendoza <br>";
			echo "<strong> Legalizador:      </strong> $legalizador";
			?>
			<p>
				<input type="hidden" name="serie" value="<?php echo $serie; ?>">
				<input type="hidden" name="numero" value="<?php echo $numero; ?>">
				<input type="hidden" name="idApostillaNuevo" value="<?php echo $idApostillaNuevo; ?>"> <br>
				<input type="submit" name="imprimir" value="imprimir"> <br>
			</form>

			<?php
		}
		?>
