<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
        
<section class="full-box nav-lateral">
	<div class="full-box nav-lateral-bg show-nav-lateral"></div>
	<div class="full-box nav-lateral-content">
		<figure class="full-box nav-lateral-avatar">
			<i class="far fa-times-circle show-nav-lateral"></i>
			<?php if ($_SESSION['sexo']=="F"){  ?>
				<img src="../Utils/assets/avatar/Avatar-mujer.png" class="img-fluid" alt="Avatar">
			<?php }else {  ?>
				<img src="../Utils/assets/avatar/Avatar-hombre.png" class="img-fluid" alt="Avatar">
			<?php  }  ?>
			<figcaption class="roboto-medium text-center">
				<?php echo $_SESSION['Nombre_Completo']  ?> <br><small class="roboto-condensed-light">Usuario</small>
			</figcaption>
		</figure>
		<div class="full-box nav-lateral-bar"></div>
		<nav class="full-box nav-lateral-menu">
			<ul>
				<li>
					<a href="../home/home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
				</li>

				<li>
					<a href="#" class="nav-btn-submenu"><i class="fas fa-pen-square fa-fw"></i> &nbsp; Registros <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li>
							<a href="../Egresados/Egresados-list.php"><i class="fas fa-user-graduate fa-fw"></i> &nbsp; Egresados</a>
						</li>
						<li>
							<a href="../Modalidad/Modalidad-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modalidad de Graduación</a>
						</li>
						<li>
							<a href="../Carreras/Carreras-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Carreras</a>
						</li>
						<li>
							<a href="../Docentes/Docente-list.php"><i class="fas fa-user-tie fa-fw"></i> &nbsp; Docentes</a>
						</li>
						<li>
							<a href="../PersonasExternas/Externos-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Personas Externas</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#" class="nav-btn-submenu"><i class="fas fa-graduation-cap fa-fw"></i> &nbsp; Gestión T.F.G. <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-graduation-cap fa-fw"></i> &nbsp; Inicio de T.F.G. <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../InicioTFG/TFG-new.php?paso=0"><i class="fas fa-plus fa-fw"></i> &nbsp; Registrar TFG</a>
								</li>
								<li>
									<a href="../InicioTFG/TFG-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Listado de TFG</a>
								</li>
								<li>
									<a href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Cambiar Tema o Tutor</a>
								</li>
							</ul>

						</li>
						<li>
							<a href="../Colaboradores/Seleccionar-TFG.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Docentes Colaboradores</a>
						</li>
						<li>
							<a href="../Revisores/seleccionar-TFG.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Docentes Revisores</a>
						</li>
						<li>
							<a href="../Revision/seleccionar-TFG.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Registrar Revisión TFG</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Aprobar Perfil TFG</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Defensa Interna</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Defensa Externa</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Registrar Calificación</a>
						</li>						
					</ul>
				</li>

				<li>
					<a href="#" class="nav-btn-submenu"><i class="fas fa-file-contract fa-fw"></i> &nbsp; Reportes <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li>
							<a href="#p"><i class="fas fa-clipboard fa-fw"></i> &nbsp; Tutor Y Colaboradores Por TFG</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-clipboard fa-fw"></i> &nbsp; Fechas de Defensas Por TFG</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-clipboard fa-fw"></i> &nbsp; Defensas Por Rango de Fechas</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-clipboard fa-fw"></i> &nbsp; Registrar Revisión TFG</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-clipboard fa-fw"></i> &nbsp; TFG Aprobados</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-clipboard fa-fw"></i> &nbsp; Estudiantes Con TFG Finalizado</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#" class="nav-btn-submenu"><i class="fas fa-lock fa-fw"></i> &nbsp; Seguridad del Sistema <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li>
							<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Administrar Usuario</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Perfiles de usuario y Roles</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-coins fa-fw"></i> &nbsp; Administrar Bitacoreas</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Acerca de...</a>
				</li>				
			</ul>
		</nav>
	</div>
</section>