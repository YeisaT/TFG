<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file -->
	<script src="./CapaPresentacion/Utils/js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="./CapaPresentacion/Utils/css/style.css">
</head>
<body>

	<div class="login-container">
		<div class="login-content">
			<p class="text-center">
				<i class="fas fa-user-circle fa-5x"></i>
			</p>
			<p class="text-center">
				Inicia sesión con tu cuenta
			</p>
			
			<p class="text-center">
				<?php 
				if (isset($_GET['error'])) {
				?>
				<p class="error">
					<?php
					echo $_GET['error']
					?>
				</p>
				<?php    
					}
				?>
			</p>

			<form action="IniciarSesion.php" method="POST">
				<div class="form-group">
					<label for="Usuario" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Usuario</label>
					<input type="text" class="form-control" id="Usuario" name="Usuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35">
				</div>
				<div class="form-group">
					<label for="Clave" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
					<input type="password" class="form-control" id="Clave" name="Clave" maxlength="200">
				</div>
				<button type="submit" class="btn-login text-center">Iniciar Sesion</button>
				<!-- <a href="CapaPresentacion/home/home.php" class="btn-login text-center">LOG IN</a>  -->
			</form>
		</div>
	</div>

	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="./CapaPresentacion/Utils/js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="./CapaPresentacion/Utils/js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="./CapaPresentacion/Utils/js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./CapaPresentacion/Utils/js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="./CapaPresentacion/Utils/js/bootstrap-material-design.min.js" ></script>

	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="./CapaPresentacion/Utils/js/main.js" ></script>

</body>
</html>