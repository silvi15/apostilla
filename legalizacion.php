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
    margin-left: 2cm;
    margin-top:200px;
    border: black;

  }
  #cuadro{
    width: 450px;
    text-align:justify;
    padding-top: 1cm;
    padding-left: 1cm;
    padding-right: 1cm;
    padding-bottom: 1cm;
  }
  #tituloH{
    width: 450px;
    text-align:center;
    padding-top: 1cm;
    padding-left: 1cm;
    padding-right: 1cm;
    padding-bottom: 1cm;
  }

  #apostille {
    text-align:center;
    font-size:10pt;
    line-height:0.5em;
    font-weight:bold;
    margin-bottom: 30px;
  }

  #firma {
    margin-top:40px;
    margin-left:300px;
  }
  a:link   
  {   
   text-decoration:none;   
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
  <?php
include 'conexionSQL.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');


$numero=$_GET['numero']; //echo "numero por get = $numero <br>";
$serie=$_GET['serie']; //echo "serie por get = $serie <br>";
$idLegalizacionNuevo = $_GET['idLegalizacionNuevo'];

$seleccion = $mysqli->query("SELECT * FROM legalizaciones WHERE numero = '$numero' and serie='$serie' and id ='$idLegalizacionNuevo'");
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
                   //echo "fecha : $fecha <br>";
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
              //echo "funcionario: $nombreFuncionario <br>";
}
          //arancelconsular:
$consulta=$mysqli->query("SELECT nombre FROM arancelconsular WHERE id ='$arancelConsular' ");
while ($fila=$consulta->fetch_array()) {
  $nombreArancel=$fila['nombre'];

}
            //importe:
$consulta=$mysqli->query("SELECT importe FROM importe WHERE id ='$importe' ");
while ($fila=$consulta->fetch_array()) {
  $nombreImporte=$fila['importe'];

}

?>

<h3>
  <div id='tituloH'>
    <strong>Direccion General de Asuntos Consulares<strong></p>
      <br><br>
      <a href="crearLegalizacion.php"><strong>HABILITADO</strong></a>
      <br><br><br><br>
    </div>

    <div id='cuadro'>
      <?php
      echo  "

      El Colegio Notarial de MENDOZA por delegación del Ministerio de Relaciones 
      Exteriores y Culto certifica que la firma que aparece en este documento $documento 
      y dice $nombreFuncionario guarda similitud con la que obra en sus registros. 
      <br><br><br>
      Titular del Documento: $nombreApellido <br>
      N° de Orden: $idLegalizacionNuevo/$ano <br>
      Arancel: $nombreArancel <br>
      Importe: $nombreImporte <br>
      Fecha: $fechaf <br>
      <br><br><br><br><br><br><br>


      <div id='firma'>
      Firma
      </div>

      ";
      ?>
    </p>
  </ol>
</div><!-- end div contenido -->
</h3>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>
