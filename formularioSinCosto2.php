<html>
<head> 
    <style type="text/css">
    p {
        font-family: sans-serif;
        color: red;
        block-size: 4;
    }
    </style>  
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
 $numerointervencion = $_POST['numero'];
 echo "numero es: $numerointervencion";
$consulta=$mysqli->query("SELECT * FROM  apostillas where numero = '$numerointervencion'");
while($fila6=$consulta->fetch_array()){
    $idApostilla=$fila6["id"];
    $numero=$fila6["numero"];
}
?>
<body>
<form class="form-sin-costo" method="post"
 action="formularioSinCosto3.php"
 onsubmit="return validate_form ( );">
<table>
<p class="sincosto" align="center" >El nuevo formulario, remplazarà a la Apostilla Numero <strong><?php echo $numerointervencion; ?><strong> </p>
<p class="sincosto" align="center"> Sera un formulario <strong> sin costo </strong> </p>
<!-- id-->
<tr>
  <td class="nombre">REMPLAZA</td>
    <td class="fila">
      <?php
      echo $numerointervencion;
       ?>
      <input type="hidden" name="numerointervencion"  value="<?php echo "$numerointervencion";?>">
      <input type="hidden" name="idApostilla"  value="<?php echo "$idApostilla";?>">
    </td>
</tr>
<tr>
  <td class="nombre">Intervencion</td>
    <td class="fila">
          <?php
                $inter="1";
                $consulta=$mysqli->query("SELECT * FROM intervencion where id = '$inter'");
                while ($fila = $consulta->fetch_array()) {
                      echo $fila["nombre"];
                      $intervencion=$fila["nombre"];
              }
          ?>
          <input type="hidden" name="intervencion"  value="<?php echo "$intervencion";?>">

      </td>
</tr>
<!--idAutoridad-->
<tr>
 <td class="nombre">Autoridad</td>
   <td class="fila">
        <?php
        $idAutoridad="EL COLEGIO NOTARIAL DE MENDOZA MINISTERIO DE RELACIONES EXTERIORES, COMERCIO INTERNACIONAL Y CULTO (CONVENIO 02/09/2003)";
        echo "$idAutoridad";
        ?>
         <input type="hidden" name="idAutoridad"  value="<?php echo "$idAutoridad";?>">

     </td>
</tr>

<!--numero -->
<tr>
        <td class="nombre">Numero</td>
            <td class="fila">
              <input type="text" name="numero" size="6" maxlength="6" value="" required>
            </td>
</tr>
<!--serie -->
<tr>
    <td class="nombre">Serie</td>
        <td class="fila">
            <input type="text" name="serie" size="1" maxlength="1" value="" required>
      </td>
</tr>
<!--factura -->
<tr>
      <td class="nombre">Factura</td>
          <td class="fila">
                <input type="text" name="factura" size="14" maxlength="14" value="" required>
          </td>
</tr>
<!--ArancelConsular -->
<tr>
        <td class="nombre">Arancel Consular</td>
        <td class="fila" required>
        <?php
            $arancel="4";
            $consulta=$mysqli->query("SELECT * FROM arancelconsular where id = '$arancel'");
            while ($fila = $consulta->fetch_array()) {
                  $nombreArancel=$fila['nombre'];
                  $decArancel=$fila['descripcion'];
                  echo "$nombreArancel:$decArancel";
          }
        ?>
        <input type="hidden" name="arancelconsular"  value="<?php echo "$arancel";?>" required>
    </td>
</tr>
<!--funcionario -->
<tr>
        <td class="nombre">Funcionario</td>
        <td class="fila">
        <?php
            $consulta=$mysqli->query("SELECT * FROM funcionarios ORDER BY nombre ASC");
        ?>
        <select name='nombre' required>
        <?php
            echo "<option>SELECCIONAR</option>";
            while ($fila = $consulta->fetch_array()) {
              echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "-> " . $fila['cargo'] . "</option>";
            }
        ?>
        </select>
    </td>
</tr>
<!--circunscripcion -->
<tr>
        <td class="nombre">Circunscripción</td>
        <td class="fila">
          <?php
              $consulta=$mysqli->query("SELECT * FROM circunscripcion where nombre ='$cir'");

              while ($fila = $consulta->fetch_array()) {
                  echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . " : " . $fila['lugar'] . "</option>";
              }

          ?>
            <input type="hidden" name="circunscripcion"  value="<?php echo "$cir";?>" required>
    </td>
</tr>
<!-- TIPODOC -->
<tr>
        <td class="nombre">Tipo de Documento</td>
        <td class="fila">
        <?php
            $consulta=$mysqli->query("SELECT * FROM tiposdoc ORDER BY tipo ASC");
        ?>
        <select name='tipo' required>
        <?php
            echo "<option>SELECCIONAR</option>";
            while ($fila = $consulta->fetch_array()) {

                echo "<option value='" . $fila['id'] . "'>" . $fila['tipo'] . "</option>";
            }
        ?>
        </select>
    </td>
</tr>
<!-- Nombre Apellido -->
    <tr>
        <td class="nombre">Nombre y Apellido</td>
        <td class="fila">
        <input type="text" name="nombreApellido"  value="" required>
      </td>
    </tr>
<!--titulardoc -->
    <tr>
        <td class="nombre">Detalle/ Titular Documento</td>
        <td class="fila">
        <input type="textarea" name="titulardoc"  value="" required>
        </td>
    </tr>

<!-- Importe -->
    <tr>
        <td class="nombre">Importe</td>
        <td class="fila" required>
          <?php
                $importeid="1";
                $consulta=$mysqli->query("SELECT * FROM importe where id = '$importeid'");
                while($fila=$consulta->fetch_array()){
                $importeNumero=$fila["importe"];
                echo "$ $importeNumero";
                }
          ?>
            <input type="hidden" name="importe"  value="<?php echo "$importeid";?>" required>
        </td>
    </tr>
    <!--
    <tr>
      <td class="nombre">Formulario sin costo</td>
      <td class="fila">
        <input type="checkbox" name="FormSinCosto" size="100">
      </td>
    </tr>
-->
</table>

  <input type="submit" name="send" value="Crear">

</form>
<script type="text/javascript">
function validate_form ( )
{
    valid = true;

//arancel Consular
if ( document.contact_form.arancelconsular.selectedIndex == 0 )
{
    alert ( "[ERROR] Selecciona un Arancel Consular" );
    valid = false;
}
//funcionario
if ( document.contact_form.nombre.selectedIndex == 0 )
{
    alert ( "[ERROR] Selecciona un funcionario" );
    valid = false;
}
//circunscripcion
if ( document.contact_form.circunscripcion.selectedIndex == 0 )
{
    alert ( "[ERROR] Selecciona una circunscripcion" );
    valid = false;
}
//tipodoc
if ( document.contact_form.intervencion.tipo == 0 )
{
    alert ( "[ERROR] Selecciona un documento" );
    valid = false;
}
//importe
if ( document.contact_form.importe.selectedIndex == 0 )
{
    alert ( "[ERROR] Selecciona un importe" );
    valid = false;
}

    return valid;
}
//-->
</script>
</body>
