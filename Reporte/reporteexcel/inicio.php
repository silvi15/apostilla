<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Apostillas</title>
  <link rel="stylesheet" type="text/css" href="http://208.9.10.39/apostilla/apostilla2017/css/estilos.css">

</head>
<?php
include 'http://208.9.10.39/apostilla/apostilla2017/estilomenu.php';
include 'http://208.9.10.39/apostilla/apostilla2017/header.php';

?>
<body>

    <h3 align="center" font-family:sans-serif >REPORTE DE CANCILLERIA</h3>
 <!--
<table>
  <tr>
    <th>Mes</th>
    <th>Apostillas</th>
    <th>Legalizaciones</th>
    <th>Habilitaciones</th>
    <th>TODO</th>
  </tr>
  <tr>
    <td>Enero</td>
    <td>
        <a href="reporteexcel.php">Apostilla</a>
        <a href="reporteexcel2.php"> Apostilla base 2016</a>
    </td>
    <td><a href="reporteexcelL.php">Legalizaciones</a> </td>
    <td><a href="reporteexcelH.php">Habilitaciones</a></td>
    <td><a href="reporteexcelT.php">TODO</a></td>
  </tr>
  <tr>
    <td>Febrero</td>
    <td><a href="reporteexcelAFeb.php">Apostilla</a></td>
    <td><a href="reporteexcelLFeb.php">Legalizaciones</a> </td>
    <td><a href="reporteexcelHFeb.php">Habilitaciones</a></td>
    <td><a href="reporteexcelTFeb.php">TODO</a></td>
  </tr>
  
</table>
-->
<br><br><br>
<form name="contact_form" method="post"action="crearLibroApostilla.php">
    <table>
      <tr>
        <tr>SELECCIONAR FECHA INICIAL PARA <STRONG>APOSTILLAS</STRONG></tr>

        <select name="dia">
            <?php
            date_default_timezone_set("America/Argentina/Mendoza");
                                //$fecha =  date("Y/m/d");
            $fecha =  date("Y/m/d");
            $fechaf=date("d/m/Y",strtotime($fecha));

            for ($i=01; $i<=31; $i++) {
                if ($i == date('j'))
                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                    echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
        <select name="mes">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>

        <select name="ano">
            <?php
            for($i=date('o'); $i>=2016; $i--){
                if ($i == date('o'))
                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                    echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
    </tr>
    <br><br>
    <tr> <?php echo " HASTA $fechaf "; ?> </tr>

    <tr>
        <input type="submit" name="send" value="Crear">

    </tr> 
</tr>


</table>
</form>

</table>
<br><br><br>
<form name="contact_form" method="post"action="crearLibroLegalizaciones.php">
    <table>
      <tr>
        <tr>SELECCIONAR FECHA INICIAL PARA <STRONG> LEGALIZACIONES </STRONG></tr>

        <select name="dia">
            <?php
            date_default_timezone_set("America/Argentina/Mendoza");
                                //$fecha =  date("Y/m/d");
            $fecha =  date("Y/m/d");

            for ($i=01; $i<=31; $i++) {
                if ($i == date('j'))
                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                    echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
        <select name="mes">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <select name="ano">
            <?php
            for($i=date('o'); $i>=2016; $i--){
                if ($i == date('o'))
                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                    echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
    </tr>
    <br><br>
    <tr> 
      <?php echo " HASTA $fechaf "; ?> </tr>

      <tr>
        <input type="submit" name="send" value="Crear">

    </tr> 
</tr>


</table>
</form>

</table>
<br><br><br>
<form name="contact_form" method="post"action="crearLibroHabilitacion.php">
    <table>
      <tr>
        <tr>SELECCIONAR FECHA INICIAL PARA <STRONG> HABILITACIONES </STRONG> </tr>

        <select name="dia">
            <?php
            date_default_timezone_set("America/Argentina/Mendoza");
                                //$fecha =  date("Y/m/d");
            $fecha =  date("Y/m/d");

            for ($i=01; $i<=31; $i++) {
                if ($i == date('j'))
                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                    echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
       </select>
        <select name="mes">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
       
        <select name="ano">
            <?php
            for($i=date('o'); $i>=2016; $i--){
                if ($i == date('o'))
                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                    echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
    </tr>
    <br><br>
    <tr> <?php echo " HASTA $fechaf "; ?> </tr>

    <tr>
        <input type="submit" name="send" value="Crear">

    </tr> 


</table>
</form>

</body>
</html>
