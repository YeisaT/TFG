<!DOCTYPE html>
<html lang="es">
<head>
    <title>Home</title>
    <?php include("../template/head.php");   ?>
</head>

<body>
	<!-- Main Principal -->
	<main class="full-box main-container">
        <?php include("../template/nav-lateral.php");   ?>    <!-- Menu lateral -->

		<!-- Seccion contenido principal -->
		<section class="full-box page-content">
			<?php include("../template/nav-up.php");   ?>     <!-- Menu Arriba -->

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; GESTIÓN DE TRABAJOS FINALES DE GRADO (TFG) PARA UTEPSA
				</h3>
				<p class="text-justify">
					Este software gestiona los Trabajos Finales de Grado (TFG) de los egresados de todas las carreras de la UTEPSA, 
					el cual permite realizar un seguimiento en línea de cada etapa en que se encuentren los egresados. 
					Brindando información oportuna y segura al publico. 
				</p>				
			</div>
			
			<!-- Content -->
			<div class="full-box tile-container">

                <a href="#" class="tile">
                    <div class="tile-tittle">Registros</div>
                    <div class="tile-icon">
                        <i class="fas fa-pen-square fa-fw"></i>
                        <p>Registrar Datos</p>
                    </div>
                </a>

                <a href="#" class="tile">
                    <div class="tile-tittle">Gestión de TFG</div>
                    <div class="tile-icon">
                        <i class="fas fa-graduation-cap fa-fw"></i>
                        <p>Gestion de TFG</p>
                    </div>
                </a>

				<a href="#" class="tile">
					<div class="tile-tittle">Reportes</div>
					<div class="tile-icon">
						<i class="fas fa-file-contract fa-fw"></i>
						<p>Repostes</p>
					</div>
				</a>

				<a href="#" class="tile">
					<div class="tile-tittle">Seguridad</div>
					<div class="tile-icon">
						<i class="fas fa-lock fa-fw"></i>
						<p>Seguridad del sistema</p>
					</div>
				</a>

			</div>			
		</section>

	</main>
	<?php include("../template/scripts.php");   ?>		<!-- Scrits -->
</body>
</html>
