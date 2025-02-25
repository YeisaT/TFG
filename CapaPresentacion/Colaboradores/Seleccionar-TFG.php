<!DOCTYPE php>
<php lang="es">
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; GESTIONAR COLABORADORES DE TRABAJO FINAL DE GRADO
				</h3>
				<p class="text-justify">
					Seleccionar el trabajo Final de Grado para el cual gestionará sus colaboradores.
				</p>
			</div>

			<?php 
               include('../../CapaNegocio/GestorReportes.php'); 
               $rep =  new GestorReportes();
               $lista = $rep->ListadoTFGEnCurso();
            ?>

			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm" style="font-size: 14px;">
						<thead>
							<tr class="roboto-medium">
								<th>FECHA INI  </th>
								<th>CARRERA    </th>
								<th>MODALIDAD  </th>
								<th>EGRESADO   </th>
								<th>TEMA       </th>
								<th>TPT        </th>
								<th>TUTOR      </th>
								<th>ESTADO     </th>
								<th style="display:none;"> ID</th>
								<th class="text-center">   SELECT       </th>
							</tr>
						</thead>
						<tbody>
                            <?php
                                foreach ($lista as $reg) {
                            ?>
                                <tr>
									<td> <?php echo $reg['fecha_ini']        ?>   </td>
									<td> <?php echo $reg['carrera']          ?>   </td>
									<td> <?php echo $reg['nombre_modalidad'] ?>   </td>
                                    <td> <?php echo $reg['egresado']         ?>   </td>									
									<td> <?php echo $reg['tema']             ?>   </td>
                                    <td> <?php echo $reg['tipo_tutor']       ?>   </td>
									<td> <?php echo $reg['tutor']            ?>   </td>
									<td> <?php echo $reg['estado']           ?>       </td>
                                    <td style="display:none;"> <?php echo $reg['id'] ?>          </td>
                                    <td class="text-center">
                                        <a href="Colaboradores.php?id_tfg=<?php echo $reg['id']?>&err=" class="btn btn-success">
                                            <i class="fas fa-hand-pointer"></i>	
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>                        
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>            

        </section>

    </main>
    <?php include("../template/scripts.php");   ?>		<!-- Scrits -->
</body>
</php>



