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
        <p align="center"><strong>Funcionarios</strong><p>
        <br>
        <tr>
            </tr>
              <tr>
                <td align="center">Id</td>
                <td align="center" >Sr</td>
                <td align="center">Nombre</td>
                <td align="center">Cargo</td>
                <td align="center">Institución</td>
                <td align="center">Editar</td>

<?php
$consult=$mysqli->query("SELECT * FROM  funcionarios ORDER BY nombre ASC ");
while($row= $consult->fetch_array()){
$rows[]=$row;
}
foreach ($rows as $row) { ?>
<tr>
<td align="center">
    <?php
        $id=$row['id'];
        $seleccion = $mysqli->query("SELECT * FROM funcionarios WHERE id ='$id'");
            while ($fila6 = $seleccion->fetch_array()) {
             echo $fila6['id'];
              $sr=$fila6['sr'];
              $nombre=$fila6['nombre'];
              $cargo=$fila6['cargo'];
              $institucion=$fila6['institucion'];

         }
?>
</td>
<td><?php echo $sr; ?> </td>
<td><?php echo $nombre; ?> </td>
<td><?php echo $cargo; ?> </td>
<td><?php echo $institucion; ?> </td>
<?php
echo "
  <td style='text-align:center'>
  <a href='editarFuncionario.php?id=$id'>Editar</a>
  </td>";

}//foreach
?>
</table>
