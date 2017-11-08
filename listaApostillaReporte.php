<?php
include 'header.php';
session_start();

$_SESSION["autentificado"] = 'A';
include("sesion.php");
$id=$_SESSION["id"];

include 'conexionSQL.php';

$mysqli= new mysqli("localhost", "root","CNmz4sql2012","apostilla2016");

$consulta=$mysqli->query("SELECT * FROM usuarios where id = '$id'");
  while($fila=$consulta->fetch_array()){
    $cir=$fila["circunscripcion"];
    //echo "cir:$cir";
  }
switch ($cir) {
  case '1':
      $cir="Primera";
    break;
  case '2':
      $cir="Segunda";
    break;
  case '3':
    $cir="Tercera";
    break;
  default:
    # code...
    break;
}
?>
<body>
  <div id="div-regForm">
    <form id="regForm" action="" method="post">
      <table>
        <p align="center"><strong>Apostilla</strong><p>
        <br>
        <tr>
            </tr>
              <tr>
                <td align="center">Nro de Tramite</td>
                <td align="center">Factura</td>
                <td align="center">Sr</td>
                <td align="center">Nombre y Apellido</td>
                <td align="center">Tipo</td>
                <td align="center">Institución</td>
                <td align="center">Titular</td>
                <td align="center">Serie</td>
                <td align="center">NumeroAP</td>
                <td align="center">Fecha</td>

<?php
//$consult=$mysqli->query("SELECT * FROM  apostillas where intervencion ='Apostilla' ORDER BY id DESC ");
$consult=$mysqli->query("SELECT * FROM apostillas WHERE fecha BETWEEN  '2016-12-01' AND '2016-12-31' ORDER BY id ASC");
while($row= $consult->fetch_array()){
$rows[]=$row;
}
foreach ($rows as $row) { ?>
<tr>
<td align="center">
    <?php
        $id=$row['id'];
        $seleccion = $mysqli->query("SELECT * FROM apostillas WHERE id ='$id'");
            while ($fila6 = $seleccion->fetch_array()) {
             echo $fila6['id'];
             $factura=$fila6['factura'];
             $numero=$fila6["numero"];
             $serie=$fila6['serie'];
             $funcionario=$fila6['funcionario'];
             $fecha=$fila6['fecha'];
             $tipodoc=$fila6['tipodoc'];
             $titulardoc=$fila6['titulardoc'];
             $fechaf=date("d/m/Y",strtotime($fecha));
            }
    ?>
</td>

<td align="center"><?php echo $factura; ?></td>

<td align="center">
<?php 
$seleccion = $mysqli->query("SELECT * FROM funcionarios WHERE id ='$funcionario'");
  while($fila = $seleccion ->fetch_array()){
    $sr=$fila['sr'];
    echo $sr;
    $nombre=$fila['nombre'];
    $institucion=$fila['institucion'];    
  }
?></td>

<td align="center"><?php echo $nombre; ?></td>

<td align="center"><?php echo $tipodoc; ?></td>

<td align="center"><?php echo $institucion; ?></td>

<td align="center"><?php echo $titulardoc; ?></td>

<td align="center"><?php echo $serie; ?></td>

<td align="center"><?php echo $numero; ?></td>

<td><?php echo "$fechaf"; ?></td>
<?php 
}//foreach
?>
</table>
<tr>
<td>&nbsp;</td>
<td>
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
</td>
</tr>
