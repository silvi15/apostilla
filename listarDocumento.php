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
    //echo "cir:$cir";
  }
?>
<div id="div-regForm">
    <form id="regForm" action="" method="post">
      <table>
        <p align="center"><strong>Documentos</strong><p>
        <br>
        <tr>
            </tr>
              <tr>
                <td align="center">ID</td>
                <td align="center">TIPO</td>
                <td align="center">ANULAR</td>
                <td align="center">EDITAR</td>
                

<?php
$consult=$mysqli->query("SELECT * FROM  tiposdoc ORDER BY tipo ASC ");
while($row= $consult->fetch_array()){
$rows[]=$row;
}
foreach ($rows as $row) { ?>
<tr>
<td align="center">
    <?php
        $id=$row['id'];
        $seleccion = $mysqli->query("SELECT * FROM tiposdoc WHERE id ='$id'");
            while ($fila6 = $seleccion->fetch_array()) {
             echo $fila6['id'];
              $tipo=$fila6['tipo'];
             $anulado=$fila6['anulado'];
         }
?>
</td>
<td><?php echo $tipo; ?> </td>

<?php
echo "
  <td style='text-align:center'>
  <a href='anularDoc.php?id=$id'>Anular</a>
  </td>";
  echo "
  <td style='text-align:center'>
  <a href='editarDocumento.php?id=$id'>Editar</a>
  </td>";  

}//foreach
?>
</table>
