<html>
    <head>
        <meta charset="UTF-8">
        <title>Notario</title>
        <link rel="stylesheet" type="text/css" href="css/nv_button.css" /> 
		<link rel="stylesheet" type="text/css" href="css/nv_css.css" /> 
		<?php include 'layouts/head.php'; ?><!-- le permite a internet explorar general las etiquetas faltantes de html5 -->
    </head>
    <body>
		<header id="header">  
			<!-- banner -->
			<div id="toolbar" class="grid-block">
				<div class="float-left">
					<div class="module deepest">
						<p><a href="http://www.cnmza.org.ar/"><img src="images/logos-headder.png" border="0" alt=""></a></p>		
					</div>						
				</div>
			</div>
			<!-- fin banner -->
			<!-- Menu -->
			<div id="menubar" class="grid-block">
				<div class="menu-nv">
					<nav>
						<ul class="menu">
							<li class="level1"><a href="escribano.php">Notario</a>
								<ul class="sub-level">
									<li class="sub-level1"><a href="propiedadesEscribano.php">Puntos Capacitación</a></li><!--modifique el nombre -->
									<li class="sub-level1"><a href="modificarPerfil.php">Modificar Contraseña</a></li><!--modifique el nombre -->
								</ul>
							</li>
							<li class="level2"><a href="">Clasificacion</a>
								<ul class="sub-level">
									<li class="sub-level2"><a href="listarClasificacionEsc.php">Ver Clasificación</a></li><!--modifique el nombre -->
								</ul>
							</li>
							<!--
							<li class="level3"><a href="">Puntaje</a>
								<ul class="sub-level">
									<li class="sub-level3"><a href="listarPuntajeEsc.php">Ver Puntaje</a></li>
								</ul>
							</li>
							-->
							<li class="level4"><a href="menuOpciones.php">volver</a>
							</li>
							<li class="level5"><a href="salir.php">Salir</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- fin menu -->
		</header>
		<?php /* include 'layouts/footer.php';*/ ?>
    </body> 
</html>