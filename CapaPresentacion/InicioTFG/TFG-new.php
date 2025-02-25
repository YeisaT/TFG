<!DOCTYPE php>
<php lang="es">

	<head>
		<title>Home</title>
		<?php include("../template/head.php");   ?>
		<?php
		//session_name('tfgnew');
		if (!isset($_SESSION)) {
			session_start();
		}
		$paso = $_GET["paso"];

		if ($paso == 0) {
			$_SESSION['registro'] = "";
			$_SESSION['nombreegr'] = "";
			$_SESSION['id_carrera'] = "";
			$_SESSION['carreras'] = "";
			$_SESSION['modalidades'] = "";
		}
		?>
	</head>

	<body>
		<!-- Main Principal -->
		<main class="full-box main-container">
			<?php include("../template/nav-lateral.php");   ?> <!-- Menu lateral -->

			<!-- Seccion contenido principal -->
			<section class="full-box page-content">
				<?php include("../template/nav-up.php");   ?> <!-- Menu Arriba -->

				<!-- Page header -->
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; REGISTRAR NUEVO TRABAJO FINAL DE GRADO TFG
				</h3>

				<!-- Content here-->
				<div class="container-fluid">
					<?php	// muestra la linea de error si existe 
					if (isset($_SESSION['msgError']) and $_SESSION['msgError'] != "") { ?>
						<div class="alert alert-warning">
							<label><?php echo $_SESSION['msgError'] ?> </label>
						</div>
					<?php
					}
					?>

					<form action="../../CapaNegocio/TFG_Guardar.php?paso=1" class="form-neon" autocomplete="off" method="post">
						<fieldset>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="registro" class="bmd-label-floating">Registro</label>
											<input type="number" pattern="[0-9]{1,12}" class="form-control" name="registro" id="registro" value="<?php echo (isset($_SESSION['registro']) ? $_SESSION['registro'] : '') ?>" min="0" maxlength="12" required>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="nombreegr" class="bmd-label-floating">Nombre Egresado</label>
											<input type="text" class="form-control" name="nombreegr" id="nombreegr" readonly value="<?php echo (isset($_SESSION['nombreegr']) ? $_SESSION['nombreegr'] : '') ?>">
										</div>
									</div>
									<div class="col-12 col-md-4" style="display: flex; align-items: center;">
										<button type="submit" class="btn btn-raised btn-info btn-sm"> <i class="fas fa-check"></i> </button>
									</div>
								</div>
							</div>
						</fieldset>
					</form>


					<form action="../../CapaNegocio/TFG_Guardar.php?paso=2" class="form-neon" autocomplete="off" method="post">
						<fieldset>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="id_carrera" class="bmd-label-floating">Carrera</label>
											<select name="id_carrera" id="id_carrera" class="form-control" required>
												<option value=""> --Carrera-- </option>
												<?php
												if (isset($_SESSION['carreras'])) {
													$carreras = $_SESSION['carreras'];
													$id_carrera = 0;
													if (isset($_SESSION['id_carrera'])) $id_carrera = $_SESSION['id_carrera'];
													foreach ($carreras as $carr) {
												?>
														<option value="<?php echo $carr['id'] ?>"
															<?php
															if ($carr['id'] == $id_carrera)
																echo "selected";
															?>>
															<?php echo $carr['nombre'] ?> </option>
												<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-6" style="display: flex; align-items: center;">
										<button type="submit" class="btn btn-raised btn-info btn-sm"> <i class="fas fa-check"></i> </button>
									</div>
								</div>
							</div>
						</fieldset>
					</form>


					<form action="../../CapaNegocio/TFG_Guardar.php?paso=3" class="form-neon" autocomplete="off" method="post">
						<fieldset>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="select_modalidad" class="bmd-label-floating">Modalidad del TFG</label>
											<select name="select_modalidad" id="select_modalidad" class="form-control" required>
												<option value=""> --Modalidad de Graduación-- </option>
												<?php
												if (isset($_SESSION['modalidades'])) {
													$modalidades = $_SESSION['modalidades'];
													foreach ($modalidades as $mod) {
												?>
														<option value="<?php echo $mod['id'] ?>">
															<?php echo $mod['nombre_modalidad'] ?> </option>
												<?php
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label for="tema" class="bmd-label-floating">Tema o título del Trabajo Final de Grado</label>
											<input type="text" class="form-control" name="tema" id="tema" maxlength="200" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="id_tutor" class="text-primary mr-4">Tutor para el T.F.G. </label>
											<input type="radio" name="tipotutor" id="rb_tutordoc" value="I" checked> <span class="text-muted mr-4">Docente UTEPSA </span>
											<input type="radio" name="tipotutor" id="rb_tutorext" value="E"> <span class="text-muted"> Persona Externa </span> <br>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<label class="text-primary">Fecha Inicio</label>
									</div>
									<div class="col-12 col-md-3">
										<label class="text-primary">Fecha Finalización</label>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-6">
										<select name="select_interno" id="select_interno" class="form-control">
											<option value=""> --Docentes Utepsa-- </option>
											<?php
											if (isset($_SESSION['docinternos'])) {
												$docinternos = $_SESSION['docinternos'];
												foreach ($docinternos as $int) {
											?>
													<option value="<?php echo $int['id_academico'] ?>">
														<?php echo $int['nombre'] ?> </option>
											<?php
												}
											}
											?>
										</select>

										<select name="select_externo" id="select_externo" class="form-control" style="display: none;">
											<option value=""> --Persona Externa-- </option>
											<?php
											if (isset($_SESSION['docexternos'])) {
												$docexternos = $_SESSION['docexternos'];
												foreach ($docexternos as $ext) {
											?>
													<option value="<?php echo $ext['id_academico'] ?>">
														<?php echo $ext['nombre'] ?> </option>
											<?php
												}
											}
											?>
										</select>
									</div>
									<div class="col-12 col-md-3">
										<input type="Date" class="form-control" name="fechaini" id="fechaini" value="<?php echo date('Y-m-d'); ?>" required>
									</div>
									<div class="col-12 col-md-3">
										<input type="Date" class="form-control" name="fechafin" id="fechafin" required>
									</div>
								</div>

								<div class="row">
								</div>

								<div class="row mt-4">
									<div class="col-12 col-md-6 mt-4 mb-4" style="display: flex; align-items: center;">
										<button type="submit" class="btn btn-raised btn-info btn-sm"> <i class="far fa-save"></i>&nbsp; REGISTRAR </button>
									</div>
								</div>
							</div>
						</fieldset>
					</form>

				</div>
			</section>

		</main>
		<?php include("../template/scripts.php");   ?> <!-- Scrits -->

		<script>
			document.getElementById('rb_tutordoc').addEventListener('click', function() {
				var docint = document.getElementById("select_interno");
				var docext = document.getElementById("select_externo");
				docint.style.display = "block";
				docext.style.display = "none";
			});

			document.getElementById('rb_tutorext').addEventListener('click', function() {
				var docint = document.getElementById("select_interno");
				var docext = document.getElementById("select_externo");
				docint.style.display = "none";
				docext.style.display = "block";
			});

		</script>

	</body>
</php>