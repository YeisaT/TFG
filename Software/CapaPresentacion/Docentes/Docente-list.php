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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE DOCENTES
				</h3>
				<p class="text-justify">
					Listado de Docentes que pertenecen a la UTEPSA y quienes pueden interactuar con los Trabajos Finales de Grado.
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="Docente-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DOCENTE</a>
					</li>
					<li>
						<a href="Docente-list.php" class="active"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE DOCENTES</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR DOCENTE</a>
					</li>
				</ul>	
			</div>

			<?php 
               include('../../CapaNegocio/GestorReportes.php'); 
               $rep =  new GestorReportes();
               $data = $rep->ListadoDocentes();
               //var_dump($data);
            ?>

			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="roboto-medium">
								<th>CODIGO    </th>
								<th>PREF      </th>
								<th>NOMBRES   </th>
                                <th>PATERNO   </th>
								<th>MATERNO   </th>
								<th>PROFESION </th>
								<th>TELEFONO  </th>
								<th>GENERO    </th>
								<th style="display:none;"> ID ACADEMICO </th>
								<th style="display:none;"> ID PERSONA   </th>
								<th class="text-center">   EDITAR       </th>
								<th class="text-center">   ELIMINAR     </th>
							</tr>
						</thead>
						<tbody>
                            <?php
                                foreach ($data as $reg) {
                            ?>
                                <tr>
									<td> <?php echo $reg['codigo']    ?>   </td>
									<td> <?php echo $reg['prefProf']  ?>   </td>
                                    <td> <?php echo $reg['nombres']   ?>   </td>
									<td> <?php echo $reg['apaterno']  ?>   </td>
									<td> <?php echo $reg['amaterno']  ?>   </td>
                                    <td> <?php echo $reg['profesion']  ?>   </td>
									<td> <?php echo $reg['telefono']  ?>   </td>
									<td> <?php echo $reg['sexo']  ?>       </td>
									<td style="display:none;"> <?php echo $reg['id_Academico']?> </td>
                                    <td style="display:none;"> <?php echo $reg['id'] ?>          </td>
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



