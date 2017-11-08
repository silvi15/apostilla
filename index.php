<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingreso de Cuenta</title>
        <link rel="stylesheet" href="css/login.css" />
		<!-- compatibilidad internet explorer -->
    </head>
    <body>
		<div class="page">
			<div class="main" id="nv_sombra">
				<div class="banner"> </div>
				<div class="box">
					<h2>Ingreso de cuenta</h2>
					<h3>Ingresa tu usuario y contrase&ntilde;a</h3>

					<form class="form" name="form1" action="sesion_start.php" method="post">
						<fieldset>
							<div class="row">
								<input type="text" class="login" name="usuario" placeholder="Usuario"/>
							</div>
							<div class="row">
								<input type="password" class="password" name="clave" placeholder="Contraseña"/>
							</div>
							<div class="row">
								<input type="checkbox" class="remember" name="remember" id="remember"  />
								<label for="remember">Mantenerme logeado</label>
								<input type="submit" value="Ingresar" name="Ingresar"/>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>
