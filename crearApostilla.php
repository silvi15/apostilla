
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
?>
<body>
<form name="contact_form" method="post"action="guardarApostilla.php" onsubmit="return validate_form ( );">

<table>
<p align="center"> <strong>Nueva Apostilla </strong></p><br>
 <!--Intervencion -->
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
          <input type="hidden" name="intervencion" size="100" maxlength="10" value="<?php echo "$intervencion";?>">

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
         <input type="hidden" name="idAutoridad" size="100" maxlength="10" value="<?php echo "$idAutoridad";?>">

     </td>
</tr>

<!--numero -->
<tr>
        <td class="nombre">Numero</td>
            <td class="fila">
              <input type="text" name="numero" size="100" maxlength="10" value="">
            </td>
</tr>
<!--serie -->
<tr>
    <td class="nombre">Serie</td>
        <td class="fila">
            <input type="text" name="serie" size="100" maxlength="10" value="">
      </td>
</tr>
<!--factura -->
<tr>
      <td class="nombre">Factura</td>
          <td class="fila">
                <input type="text" name="factura" size="100" maxlength="20" value="">
          </td>
</tr>
<!--ArancelConsular -->
<tr>
        <td class="nombre">Arancel Consular</td>
        <td class="fila">
        <?php
            $arancel="4";
            $consulta=$mysqli->query("SELECT * FROM arancelconsular where id = '$arancel'");
            while ($fila = $consulta->fetch_array()) {
                  $nombreArancel=$fila['nombre'];
                  $decArancel=$fila['descripcion'];
                  echo "$nombreArancel:$decArancel";
          }
        ?>
        <input type="hidden" name="arancelconsular" size="100" maxlength="10" value="<?php echo "$arancel";?>">
    </td>
</tr>
<!--funcionario -->
<tr>
        <td class="nombre">Funcionario</td>
        <td class="fila">
        <?php
            $consulta=$mysqli->query("SELECT * FROM funcionarios ORDER BY nombre ASC");
        ?>
        <select name='nombre'>
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
            <input type="hidden" name="circunscripcion" size="100" maxlength="10" value="<?php echo "$cir";?>">
    </td>
</tr>
<!-- TIPODOC -->
<tr>
        <td class="nombre">Tipo de Documento</td>
        <td class="fila">
        <?php
            $consulta=$mysqli->query("SELECT * FROM tiposdoc ORDER BY tipo ASC");
        ?>
        <select name='tipo'>
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
        <input type="text" name="nombreApellido"  value="">
      </td>
    </tr>
<!--titulardoc -->
    <tr>
        <td class="nombre">Detalle/ Titular Documento</td>
        <td class="fila">
        <input type="textarea" name="titulardoc"  value="">
        </td>
    </tr>

<!-- Importe -->
    <tr>
        <td class="nombre">Importe</td>
        <td class="fila">
          <?php
                $importeid="4";
                $consulta=$mysqli->query("SELECT * FROM importe where id = '$importeid'");
                while($fila=$consulta->fetch_array()){
                $importeNumero=$fila["importe"];
                echo "$ $importeNumero";
                }
          ?>
            <input type="hidden" name="importe" size="100" maxlength="10" value="<?php echo "$importeid";?>">
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
//intervencion
    if ( document.contact_form.intervencion.selectedIndex == 0 )
    {
        alert ( "[ERROR] Selecciona una intervencion" );
        valid = false;
    }
//numero
    if ( document.contact_form.numero.value == "" )
    {
        alert ( "[ERROR] El campo número no puede ir vacio" );
        valid = false;
    }
    /*validar que el campo numero sea numerico*/
//serie
    if ( document.contact_form.serie.value == "" )
    {
        alert ( "[ERROR] El campo serie no puede ir vacio" );
        valid = false;
    }
    /*validar que el campo serie sea letra */
//factura
    if ( document.contact_form.factura.value == "" )
    {
        alert ( "[ERROR] El campo factura no puede ir vacio" );
        valid = false;
    }
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
//nombre y apellido
    if ( document.contact_form.nombreApellido.value == "" )
    {
        alert ( "[ERROR] El campo nombre y apellido no puede ir vacio" );
        valid = false;
    }
//detalle
    if ( document.contact_form.titulardoc.value == "" )
    {
        alert ( "[ERROR] El campo detalle  no puede ir vacio" );
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
