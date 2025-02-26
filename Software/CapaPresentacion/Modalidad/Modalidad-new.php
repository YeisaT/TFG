<!DOCTYPE php>
<php lang="es">

	<head>
		<title>Home</title>
		<?php include("../template/head.php");   ?>
	</head>

	<body>
		<!-- Main Principal -->
		<main class="full-box main-container">
			<?php include("../template/nav-lateral.php");   ?> <!-- Menu lateral -->

			<!-- Seccion contenido principal -->
			<section class="full-box page-content">
				<?php include("../template/nav-up.php");   ?> <!-- Menu Arriba -->

				<!-- Page header -->
				<div class="full-box page-header">
					<h3 class="text-left">
						<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MODALIDAD
					</h3>
					<p class="text-justify">
						Se modalidades de graduación.
					</p>
				</div>

				<div class="container-fluid">
					<ul class="full-box list-unstyled page-nav-tabs">
						<li>
							<a class="active" href="Modalidad-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MODALIDAD</a>
						</li>
						<li>
							<a href="Modalidad-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MODALIDADES</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR NODALIDAD</a>
						</li>
					</ul>
				</div>

				<!-- Content here-->
				<div class="container-fluid">
					<form action="../../CapaNegocio/Modalidad_guardar.php" class="form-neon" autocomplete="off" method="post">
							<legend><i class="fas fa-graduation-cap"></i> &nbsp; Información de Modalidad de Graduación</legend>
							<div class="container-fluid">
							
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="modalidad" class="bmd-label-floating">Nueva Modalidad</label>
											<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" name="modalidad" id="modalidad" maxlength="100" required>
										</div>
									</div>
								</div>
							</div>
						<br><br><br>
						<p class="text-center" style="margin-top: 40px;">
							<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
							&nbsp; &nbsp;
							<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
						</p>
					</form>
				</div>

			</section>

		</main>
		<?php include("../template/scripts.php");   ?> <!-- Scrits -->
	</body>
</php>