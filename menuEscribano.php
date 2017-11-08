
<?php
        session_start();
        $_SESSION["autentificado"] = 'E';
        include("sesion.php");
        ?>
        <html>
    <head>
        <meta charset="UTF-8">
        <title>Notario</title>
		<link rel="stylesheet" type="text/css" href="css/nv_button.css" /> 
		<link rel="stylesheet" type="text/css" href="css/nv_css.css" /> 
		<?php include 'layouts/head.php'; ?><!-- le permite a internet explorar general las etiquetas faltantes de html5 -->
		
        <!--<link rel="stylesheet" type="text/css" href="css/button.css" /> 
        <img style="margin:12px 0 12px 0;" src="css/images/cnCapa.png" width="2000" height="150" alt="Imagen para el intro" title="Capacitacion"><br>-->
    </head>
    <body>
		<!-- nv, el menu lo carga desde la carpeta layouts, cosa de editar un solomenu y que este bien en todos lados
        <ul class="menu">
            <li><a href="escribano.php">Notario</a>
                <ul>
                    <li><a href="propiedadesEscribano.php">Puntos Capacitación</a></li> 
                    <li><a href="modificarPerfil.php">Modificar Contraseña</a></li> 
                    
                </ul>
            </li>
            <li><a href="">Clasificación</a>
                <ul>
                    <li><a href="listarClasificacionEsc.php">Ver Clasificación</a></li> 
                    
                </ul>
            </li>

            <li><a href="">Puntaje</a>
                <ul>
                    <li><a href="listarPuntajeEsc.php">Ver Puntaje</a></li> 
                    
                </ul>
            </li>
            
            <li><a href="menuOpciones.php">volver</a> </li>
            <li><a href="salir.php">Salir</a> </li>
        </ul>
        <br>
        <div class="menu_top"> Notario  </div> <br><br> -->
		<?php include 'layouts/header.php'; ?>
		<?php include 'layouts/footer.php'; ?>
    </body>
</html>