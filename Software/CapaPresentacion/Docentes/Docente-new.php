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
						<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DOCENTE
					</h3>
					<p class="text-justify">
						Se registra los datos de la Persona, el docente y lo que corresponde a Academico
					</p>
				</div>

				<div class="container-fluid">
					<ul class="full-box list-unstyled page-nav-tabs">
						<li>
							<a class="active" href="Docente-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DOCENTE</a>
						</li>
						<li>
							<a href="Docente-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE DOCENTES</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR DOCENTE</a>
						</li>
					</ul>
				</div>

				<!-- Content here-->
				<div class="container-fluid">
					<form action="../../CapaNegocio/Docente_guardar.php" class="form-neon" autocomplete="off" method="post">
						<fieldset>
							<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
							<div class="container-fluid">

								<div class="row">
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="nombres" class="bmd-label-floating">Nombres</label>
											<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="nombres" id="nombres" maxlength="30" required>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="apaterno" class="bmd-label-floating">Apellido Paterno</label>
											<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="apaterno" id="apaterno" maxlength="30" required>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="amaterno" class="bmd-label-floating">Apellido Materno</label>
											<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="amaterno" id="amaterno" maxlength="30" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="fechanac" class="bmd-label-floating">Fecha de Nacimiento</label>
											<input type="date" class="form-control" name="fechanac" id="fechanac" min="1950-01-01" max="2030-12-31" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="sexo" class="bmd-label-floating">Genero</label>
											<select name="sexo" id="sexo" class="form-control" required>
												<option value="">  --Genero-- </option>
												<option value="M"> Masculino  </option>
												<option value="F"> Femenino   </option>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="telefono" class="bmd-label-floating">Teléfono</label>
											<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,15}" class="form-control" name="telefono" id="telefono" maxlength="15">
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="email" class="bmd-label-floating">Correo electronico</label>
											<input type="email" class="form-control" name="email" id="email" maxlength="30">
										</div>
									</div>
								</div>
							</div>

							<legend><i class="fas fa-user"></i> &nbsp; Información docente</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="codigo" class="bmd-label-floating">Código</label>
											<input type="text"  class="form-control" name="codigo" id="codigo" maxlength="10" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="anio_ingreso" class="bmd-label-floating">Año Ingreso</label>
											<input type="number" class="form-control" name="anio_ingreso" id="anio_ingreso" min="1970" max="2030" value="2024" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="profesion" class="bmd-label-floating">Profesión</label>
											<input type="text" class="form-control" name="profesion" id="profesion" maxlength="50">
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="prefProf" class="bmd-label-floating">Prefijo Profesión</label>
											<input type="text" class="form-control" name="prefProf" id="prefProf" maxlength="8">
										</div>
									</div>									
								</div>
							</div>
							
						</fieldset>
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