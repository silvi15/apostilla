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
$mes=$_POST['mes']; echo "mes: $mes <br>";
//fecha : 2016-02-01 // ano-mes-dia
$ano = "2016";
$diaInicio="01";
$diaFin="31";

$fechaInicio="$ano-$mes-$diaInicio"; echo "fecha inicio: $fechaInicio <br>";
$fechaFin="$ano-$mes-$diaFin"; echo "fecha fin: $fechaFin <br>";

//conexion a la base de datos
$conexion = new mysqli('localhost','root','CNmz4sql2012','apostilla2016');

if (mysqli_connect_errno()) {
   printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
   exit();
}
//$resultado =$conexion->query("SELECT * FROM apostillas WHERE fecha BETWEEN  $fechaInicio AND $fechaFin");
$resultado =$conexion->query("SELECT * FROM apostillas WHERE fecha BETWEEN  '2016-12-01' AND '2016-12-31'");
if($resultado->num_rows > 0 ){
    if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');
/** Se agrega la libreria PHPExcel */
 require_once 'PHPExcel.php';
 
// Se crea el objeto PHPExcel
 $objPHPExcel = new PHPExcel();
 // Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("Codedrinks") // Nombre del autor
    ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
    ->setTitle("Reporte Excel con PHP y MySQL") // Titulo
    ->setSubject("Reporte Excel con PHP y MySQL") //Asunto
    ->setDescription("Reporte de Apostillas") //Descripción
    ->setKeywords("Reporte Apostillas") //Etiquetas
    ->setCategory("Reporte excel"); //Categorias

$tituloReporte = "Libro";
$titulosColumnas = array('N Tramite', 'Factura','Sr','Nombre Apellido','Tipo','Institucion','Titular','Serie','NumeroAp','Fecha');

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:J1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2])
    ->setCellValue('D3',  $titulosColumnas[3])
    ->setCellValue('E3',  $titulosColumnas[4])
    ->setCellValue('F3',  $titulosColumnas[5])
    ->setCellValue('G3',  $titulosColumnas[6])
    ->setCellValue('H3',  $titulosColumnas[7])
    ->setCellValue('I3',  $titulosColumnas[8])
    ->setCellValue('J3',  $titulosColumnas[9]);

//Se agregan los datos de los alumnos


 
 $i = 9; //Numero de fila donde se va a comenzar a rellenar
 
 while ($fila = $resultado->fetch_array()) {
        $id=$fila['id'];
        $consulta2=$conexion->query("SELECT * FROM apostillas where id = '$id'");
        while($fila2=$consulta2->fetch_array()){
            $id=$fila2['id'];
            $factura=$fila2['factura'];
            $funcionario=$fila2['funcionario'];
            $titulardoc=$fila2['titulardoc'];
            $tipo=$fila2['tipodoc'];
            $serie=$fila2['serie'];
            $numero=$fila2['numero'];
            $fecha=$fecha['fecha'];
            $fechaf=date("d/m/Y",strtotime($fecha));
        }

        
        $consulta2=$conexion->query("SELECT * FROM funcionarios where id = '$funcionario'");
        while($fila2=$consulta2->fetch_array()){
            $sr=$fila2['sr'];
            $institucion=$fila2['institucion'];
            $nombre=$fila2['nombre'];            
        }
        
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('A'.$i, $id)
         ->setCellValue('B'.$i, $factura)
         ->setCellValue('C'.$i, $sr)
         ->setCellValue('D'.$i, $titulardoc)
         ->setCellValue('E'.$i, $tipo)
         ->setCellValue('F'.$i, $institucion)
         ->setCellValue('G'.$i, $titulardoc)
         ->setCellValue('H'.$i, $serie)
         ->setCellValue('I'.$i, $numero)
         ->setCellValue('J'.$i, $fechaf);
     $i++;
 }

 $estiloTituloReporte = array(
    'font' => array(
        'name'      => 'Verdana',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>16,
        'color'     => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'argb' => 'FF220835')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);
 
$estiloTituloColumnas = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
    'rotation'   => 90,
        'startcolor' => array(
            'rgb' => 'c47cf2'
        ),
        'endcolor' => array(
            'argb' => 'FF431a5d'
        )
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);
 
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array(
            'argb' => 'FFd9b7f4')
    ),
    'borders' => array(
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
        'color' => array(
                'rgb' => '3a2a47'
            )
        )
    )
));
$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));

for($i = 'A'; $i <= 'J'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Apostillas');
 
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
 
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,10);

// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="libro.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
}
else{
    print_r('No hay resultados para mostrar');
}



?>
<a href="inicio.php"> Volver</a>