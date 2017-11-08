<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body p {
	font-family: Verdana, Geneva, sans-serif;

}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	text-align: left;
}
body {
	margin-left: 4cm;
	margin-top:200px;
	border: black;
}
#cuadro{
	border: 1px solid #000;
	width:425px;
	padding:90px 60px 30px 55px;
}
#apostille {
	text-align:center;
	font-size:10pt;
	line-height:0.5em;
	font-weight:bold;
	margin-bottom: 30px;
}
#contenido{
	font-size: 9pt;

}
#contenido ol li{
	margin:0.3em;
}
#firma {
	margin-top:40px;
	margin-left:300px;




}

</style>

<style type="text/css" media="all">
td {
border:hidden;
}
table {
	border: 1px solid #000000;
	text-align: left;
}

</style>

</head>

<body onload="window.print();">




<?
include 'conexionSQL.php';
$consulta=$mysqli->query("SELECT * FROM  legalizaciones ORDER BY id DESC LIMIT 1 ");
while ($fila6 = $consulta->fetch_array()) {
      //echo $fila6['id'];
      $idlega= $fila6['id'];
}
            $seleccion = $mysqli->query("SELECT * FROM legalizaciones WHERE id ='$idlega'");
            while ($fila = $seleccion->fetch_array()) {
                   $funcionario=$fila['funcionario'];
                   //echo "idfun: $funcionario <br>";
                   $tipodoc=$fila['tipodoc'];
                   //echo "iddoc: $tipodoc <br>";
                   $nombreApellido=$fila['nombreApellido'];
                   //echo "nombre nombreApellido: $nombreApellido <br>";
                   $ano=$fila['ano'];
                   //echo "ano: $ano <br>";
                   $arancelConsular=$fila['arancelConsular'];
                   //echo "arancelConsular: $arancelConsular <br>";
                   $importe=$fila['importe'];
                   //echo "importe: $importe <br>";
                   $fecha=$fila['fecha'];
                   $circunscripcion=$fila['circunscripcion'];
                   $idprovincia=$fila['idprovincia'];

                 }
            //fecha:  2016-09-22
            $fechaf=date("d/m/Y",strtotime($fecha));
            //echo "fecha: $fechaf<br>";
      //documento:
      $consulta=$mysqli->query("SELECT tipo FROM tiposdoc WHERE id ='$tipodoc' ");
          while ($fila=$consulta->fetch_array()) {
              $documento=$fila['tipo'];
              //echo "documento: $documento <br>";
          }
        //funcionario:
      $consulta=$mysqli->query("SELECT nombre FROM funcionarios WHERE id ='$funcionario' ");
          while ($fila=$consulta->fetch_array()) {
              $nombreFuncionario=$fila['nombre'];
              $sr=$fila['sr'];
              $cargo=$fila['cargo'];
              $institucion=$fila['institucion'];
              //echo "funcionario: $nombreFuncionario <br>";
          }

$idautoridad="EL COLEGIO NOTARIAL DE MENDOZA EN REPRESENTACION DEL MINISTERIO DE RELACIONES EXTERIORES Y CULTO (CONVENIO 02/09/2003)";

?>
<div id='cuadro'>
<div id='apostille'>
	<p><strong>APOSTILLE</strong></p>
	<p>(Convention de la Haye du 5 octobre 1961)</p>
</div>
<div id='contenido'>
<ol>
<?php
echo  "

  <li>  País: REPÚBLICA ARGENTINA <br>
  El Presente documento público <strong>DE LEGALIZACIÓN.</strong></li>


  <li> Ha sido firmado por:<strong>$sr  $nombreFuncionario </strong></li>


 <li> Quien actúa en calidad de: <strong>$cargo</strong></li>


  <li> Lleva el sello/timbre de: <strong>$institucion</strong></li>
 <p style='text-align:center'>Certificado</p>

  <li> En:<strong>$idprovincia, MENDOZA</strong> 6. El día:<strong> $fechaf</strong></li>



  <li value='7'> Por: <strong> $idautoridad  </strong></li>


  <li>Bajo el Número: <strong>$idlega/$ano/$circunscripcion</strong></li>


  <li> Sello/Timbre</li>
<div id='firma'>
 <li> Firma</li>
</div>

";
?>
</ol>
</div><!-- end div contenido -->
</div><!-- end div cuadro -->
<p>
  <?php
  echo "ti";
  ?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
