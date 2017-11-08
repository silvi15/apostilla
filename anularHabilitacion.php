
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
$idLega=$_GET['id'];
$seleccion = $mysqli->query("SELECT * FROM habilitaciones WHERE id ='$idLega'");
    while ($fila6 = $seleccion->fetch_array()) {
     $numero=$fila6["numero"];
     $serie=$fila6['serie'];
     $factura=$fila6['factura'];
     $ano=$fila6['ano'];
     $circunscripcion=$fila6['circunscripcion'];
     $funcionario=$fila6['funcionario'];
     $fecha=$fila6['fecha'];
     $legalizador=$fila6['legalizador'];
     $tipodoc=$fila6['tipodoc'];
     $factura=$fila6['factura'];
     $titulardoc=$fila6['titulardoc'];
     $anulado=$fila6['anulado'];
     $nombreApellido=$fila6['nombreApellido'];
     $intervencion=$fila6['intervencion'];
     $arancelconsular=$fila6['arancelConsular'];
     $importe=$fila6['importe'];
     //$fechaf=date("d/m/Y",strtotime($fecha));
    }


while ($fila = $consulta->fetch_array()) {
      echo $fila["nombre"];
      $intervencion=$fila["nombre"];
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
<a href="listarHabilitacion.php">Volver Listar Habilitados</a><p>
<body>
<form name="contact_form" method="post"
action="anularHabilitacion2.php"
onsubmit="return validate_form ( );">
<table>
<p align="center">Anular Habilitación</p>
<!-- id-->
<tr>
  <td class="nombre">ID</td>
    <td class="fila">
      <?php
      echo $idLega;
       ?>
      <input type="hidden" name="idLega" size="100" maxlength="10" value="<?php echo "$idLega";?>">
    </td>
</tr>
<!-- fecha-->
<tr>
  <td class="fecha"> Fecha</td>
    <td class="fila">
      <?php
      echo $fecha;
       ?>
      <input type="hidden" name="fecha" size="100" maxlength="10" value="<?php echo "$fecha";?>">
    </td>
</tr>
 <!--Intervencion -->
<tr>
  <td class="nombre">Intervención</td>
    <td class="fila">
          <?php
                $inter="3";
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
        $idAutoridad="ANULADA";
        echo "$idAutoridad";
        ?>
         <input type="hidden" name="idAutoridad" size="100" maxlength="10" value="<?php echo "$idAutoridad";?>">

     </td>
</tr>

<!--numero -->
<tr>
        <td class="nombre">Número</td>
            <td class="fila">
            <?php
               // $numero="0";
                echo "$numero";
        ?>
         <input type="hidden" name="numero" size="100" maxlength="10" value="<?php echo "$numero";?>">
              

            </td>
</tr>
<!--serie -->
<tr>
    <td class="nombre">Serie</td>
        <td class="fila">
          <?php
          //$serie=".";
           echo $serie;?>
           <input type="hidden" name="serie" value="<?php echo $serie;?>">
      </td>
</tr>
<!--factura -->
<tr>
      <td class="nombre">Factura</td>
          <td class="fila">
            <?php 
            $factura="ANULADA";
            echo $factura;
            ?>
            <input type="hidden" name="factura" value="<?php echo $factura; ?>">
          </td>
</tr>
<!--ArancelConsular -->
<tr>
        <td class="nombre">Arancel Consular</td>
        <td class="fila">
        <?php
            $arancel="1";
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
            $consulta=$mysqli->query("SELECT * FROM funcionarios where id = '46'");
        
            while ($fila = $consulta->fetch_array()) {
                  $funcionario = $fila['nombre'];
                  echo $funcionario;
            }
        ?>
      <input type="hidden" name="funcionario" size="100" maxlength="200" value="<?php echo $funcionario; ?>">

    </td>
</tr>
<!--circunscripcion -->
<tr>
        <td class="nombre">Circunscripción</td>
        <td class="fila">
          <?php
              $consulta=$mysqli->query("SELECT * FROM circunscripcion where nombre ='$cir'");
              while ($fila = $consulta->fetch_array()) {
                    $circunscripcion= $fila['nombre'];
                    echo "$circunscripcion";
              }
          ?>
            <input type="hidden" name="circunscripcion" size="100" maxlength="200" value="<?php echo $circunscripcion; ?>">
    </td>
</tr>
<!-- TIPODOC -->
<tr>
        <td class="nombre">Tipo de Documento</td>
        <td class="fila">
        <?php
            $consulta=$mysqli->query("SELECT * FROM tiposdoc where id = '792'");
        
            while ($fila = $consulta->fetch_array()) {
                  $tipodoc = $fila['tipo'];
                  echo $tipodoc;
            }
        ?>
      <input type="hidden" name="tipodoc" size="100" maxlength="200" value="<?php echo $tipodoc; ?>">

      </td>
</tr>
<!-- Nombre Apellido -->
    <tr>
        <td class="nombre">Nombre y Apellido</td>
        <td class="fila">
        <?php 
        $nombreApellido="ANULADO";
        echo $anulado;
        ?>
      <input type="hidden" name="nombreApellido" value="<?php echo $nombreApellido; ?>">
      </td>
    </tr>
<!--titulardoc -->
    <tr>
        <td class="nombre">Motivo de Anulación</td>
        <td class="fila">
        <input type="textarea" name="titulardoc" size="100" maxlength="200" value="">
        </td>
    </tr>

<!-- Importe -->
    <tr>
        <td class="nombre">Importe</td>
        <td class="fila">
          <?php
                $idimporte="1";
                $consulta=$mysqli->query("SELECT * FROM importe where id = '$idimporte'");
                while($fila=$consulta->fetch_array()){
                  $importe=$fila['importe'];
                  echo $importe;
                }
          ?>
          <input type="hidden" name="importe" size="100" maxlength="200" value="<?php echo $idimporte; ?>">
        </td>
    </tr>

</table>

  <input type="submit" name="send" value="ANULAR">

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
