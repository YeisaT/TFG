<!DOCTYPE php>
<php lang="es">
<head>
    <title>Egresados</title>
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ESTUDIANTES EGRESADOS
				</h3>
				<p class="text-justify">
					Listado de estudiantes egresados, esta lista es obtenido del sistema academico cuando el estudiante ha terminado su plan de estudios en alguna carrera. 
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR EGRESADO</a>
					</li>
					<li>
						<a href="Egresados-list.php" class="active"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE EGRESADOS</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR EGRESADO</a>
					</li>
				</ul>	
			</div>

			<?php 
               include('../../CapaNegocio/GestorReportes.php'); 
               $rep =  new GestorReportes();
               $data = $rep->ListadoEgresados();
               //var_dump($data);
            ?>

			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="roboto-medium">
								<th>ID                </th>
								<th>NOMBRE ESTUDIANTE EGRESADO  </th>
                                <th>REGISTRO          </th>
                                <th>CARRERA           </th>
								<th class="text-center">   EDITAR       </th>
								<th class="text-center">   ELIMINAR     </th>
							</tr>
						</thead>
						<tbody>
                            <?php
                                foreach ($data as $reg) {
                            ?>
                                <tr>
									<td> <?php echo $reg['id']             ?>   </td>
									<td> <?php echo $reg['nombre']         ?>   </td>
                                    <td> <?php echo $reg['registro']       ?>   </td>
                                    <td> <?php echo $reg['nombrecarrera']  ?>   </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success">
                                            <i class="fas fa-sync-alt"></i>	
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="">
                                            <button type="button" class="btn btn-warning">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
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



