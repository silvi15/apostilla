<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>

        <?php
        session_start();
        include 'conexionSQL.php';
        $_SESSION["autentificado"] = 'A';
        include("sesion.php");
        ?>

        	</head>
        	<body>
        		<div id="header">
        			<ul class="nav">
        				<li><a href="">Apostillas</a>
                  <ul>
                    <li><a href="crearApostilla.php">Crear Apostilla</a></li>
                    <li><a href="editarApostilla.php">Editar Apostilla</a></li>
                    <li><a href="buscarApostilla.php">Buscar Apostilla</a></li>
                    <li><a href="imprimirApostilla.php">Imprimir Apostilla</a></li>
                    <li><a href="listarApostilla.php">Listar Apostilla</a></li>
                  </ul>
                </li>

                <li><a href="">Legalizaciones</a>
                  <ul>
                    <li><a href="crearLegalizacion.php">Crear Legalizaciones</a></li>
                    <li><a href="editarLegalizaciones.php">Editar Legalizaciones</a></li>
                    <li><a href="buscarLegalizaciones.php">Buscar Legalizaciones</a></li>
                    <li><a href="imprimirLegalizaciones.php">Imprimir Legalizaciones</a></li>
                    <li><a href="listarLegalizaciones.php">Listar Legalizaciones</a></li>
                  </ul>
                </li>

                <li><a href="">Habilitaciones</a>
                  <ul>
                    <li><a href="crearHablitacio.php">Crear Habilitaciones</a></li>
                    <li><a href="editarHablitacio.php">Editar Habilitaciones</a></li>
                    <li><a href="buscarHablitacio.php">Buscar Habilitaciones</a></li>
                    <li><a href="imprimirHablitacio.php">Imprimir Habilitaciones</a></li>
                    <li><a href="listarHablitacio.php">Listar Habilitaciones</a></li>
                  </ul>
                </li>

                <li><a href="">Funciones</a>
                  <ul>
                    <li><a href="listarDocumento.php">Documento</a></li>
                    <li><a href="listarFuncionario.php">Funcionario</a></li>
                    <li><a href="crearLibro.php">Libro</a></li>
                    

                  </ul>
                </li>


              </ul>
        		</div>
        	</body>
        </html>
