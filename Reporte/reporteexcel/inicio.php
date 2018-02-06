<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Apostillas</title>
  <link rel="stylesheet" type="text/css" href="../../css/reporte.css">
   <style type="text/css">
   h3: { 
       font-family: sans-serif;
       color: #ccc;
   }
   .reporte form{
       color: #ccc;
   }
   </style> 
</head>
<?php

?>
<body style="font-family: sans-serif">

    <h3 align="center" >REPORTE DE CANCILLERIA</h3>

<form class="reporte" method="post"action="crearLibroApostilla.php">
    <table>
      <tr>
        <p>
        <tr>SELECCIONAR FECHA INICIAL PARA <STRONG>APOSTILLAS</STRONG></tr>
        </p> Fecha Inicio
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
    <tr> Fecha Fin
    <select name="dia2">
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
        <select name="mes2">
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

        <select name="ano2">
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
     </tr>

    <tr>
            <p>
        <input type="submit" name="send" value="Crear">
            </p>
    </tr> 
</tr>


</table>
</form>

</table>
<br><br><br>
<form class="reporte" method="post"action="crearLibroLegalizaciones.php">
    <table>
      <tr>
            <p>
        <tr>SELECCIONAR FECHA INICIAL PARA <STRONG> LEGALIZACIONES </STRONG></tr>
            </p> Fecha Inicio
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
    <tr> Fecha Fin
    <select name="dia2">
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
        <select name="mes2">
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
        <select name="ano2">
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

      <tr>
            <p>
        <input type="submit" name="send" value="Crear">
            </p>
    </tr> 
</tr>


</table>
</form>

</table>
<br><br><br>
<form class="reporte" method="post"action="crearLibroHabilitacion.php">
    <table>
      <tr>  
      <p>
        <tr>SELECCIONAR FECHA INICIAL PARA <STRONG> HABILITACIONES </STRONG> </tr>
            </p> Fecha Inicio
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
    <tr> Fecha Fin
    <select name="dia2">
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
        <select name="mes2">
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
       
        <select name="ano2">
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

    <tr>
            <p>
        <input type="submit" name="send" value="Crear">
            </p>
    </tr> 


</table>
</form>
<br><br><br>

</body>
</html>
