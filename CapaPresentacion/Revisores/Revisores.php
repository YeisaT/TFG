<!DOCTYPE php>
<php lang="es">
<head>
    <title>Revisores</title>
    <?php include("../template/head.php");   ?>
    <?php include("../../CapaDatos/class_tfg.php");   ?>
    <?php include("../../CapaDatos/Listados.php");   ?>
    <?php
        $id_tfg = $_GET['id_tfg'];
        $err = $_GET['err'];

        $tfg = new class_tfg();
        $tfg->CargarDatos($id_tfg);
        $listaRevisores = $tfg->ListarRevisores();

        $list = new Listados();
        $docinternos = $list->ListarDocentesCorto();
        $docexternos = $list->ListarExternosCorto();
        
    ?>
</head>

<body>
	<!-- Main Principal -->
	<main class="full-box main-container">
        <?php include("../template/nav-lateral.php");   ?>    <!-- Menu lateral -->

		<!-- Seccion contenido principal -->
		<section class="full-box page-content">
			<?php include("../template/nav-up.php");   ?>     <!-- Menu Arriba -->

			<!-- Page header -->
			<div class="full-box mt-3 mb-3">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; GESTIONAR REVISORES DE TRABAJO FINAL DE GRADO
				</h3>
			</div>


            <div class="container-fluid form-neon">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Nombre Egresado </label>
                        <input type="text" class="form-control" value="<?php echo $tfg->NombreEgresado(); ?>" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Registro</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->id; ?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Carrera</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->NombreCarrera(); ?>" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Modalidad</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->Modalidad(); ?>" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Estado</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->Estado(); ?>" readonly>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label class="text-primary"> Tema</label>
                        <input type="text" class="form-control"value="<?php echo $tfg->tema; ?>" readonly>
                    </div>
                </div>                  
                
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Tutor</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->NombreTutor(); ?>" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Estado</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->Estado(); ?>" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="text-primary"> Fecha de Inicio</label>
                        <input type="text" class="form-control" value="<?php echo $tfg->fecha_ini; ?>" readonly>
                    </div>
                </div>                
            </div>
            
            <form action="../../CapaNegocio/Gestionrevisores.php?id_tfg=<?php echo $id_tfg?>&tipo=ins" class="form-neon mt-1" autocomplete="off" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="text-primary mr-4">Revisor para el T.F.G. </label>
                                <input type="radio" name="tipotutor" id="rb_tutordoc" value="I" checked> <span class="text-muted mr-4">Docente UTEPSA  </span>
                                <input type="radio" name="tipotutor" id="rb_tutorext" value="E">         <span class="text-muted">     Persona Externa </span> <br>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <select name="select_interno" id="select_interno" class="form-control">
                                <option value=""> --Docentes Utepsa-- </option>
                                <?php foreach ($docinternos as $int) {  ?>
                                        <option value="<?php echo $int['id_academico'] ?>">
                                            <?php echo $int['nombre'] ?> </option>
                                <?php } ?>
                            </select>

                            <select name="select_externo" id="select_externo" class="form-control" style="display: none;">
                                <option value=""> --Persona Externa-- </option>
                                <?php foreach ($docexternos as $ext) { ?>
                                        <option value="<?php echo $ext['id_academico'] ?>">
                                            <?php echo $ext['nombre'] ?> </option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="col-12 col-md-2">
                            <div class="col-12 col-md-6">
                                <button type="submit" class="btn btn-raised btn-info btn-sm">  ADICIONAR </button>
                            </div>
                        </div>                     
                    </div>
                </div>
            </form>

            <?php	// muestra la linea de error si existe 
                if ($err != "") { ?>
                    <div class="alert alert-warning">
                        <label><?php echo $err ?> </label>
                    </div>
                <?php
                }
            ?>            

            <div class="container-fluid form-neon">
                <div class="table-responsive">
                    <table class="table table-dark table-sm">
                        <thead>
                            <tr class="roboto-medium">
                                <th>PREF      </th>
                                <th>NOMBRES   </th>
                                <th>PATERNO   </th>
                                <th>MATERNO   </th>
                                <th>PROFESION </th>
                                <th>TIPO      </th>
                                <th style="display:none;"> ID ACADEMICO </th>
                                <th class="text-center">   ELIMINAR     </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listaRevisores as $reg) {
                            ?>
                                <tr>
                                    <td> <?php echo $reg['prefProf']  ?>   </td>
                                    <td> <?php echo $reg['nombres']   ?>   </td>
                                    <td> <?php echo $reg['apaterno']  ?>   </td>
                                    <td> <?php echo $reg['amaterno']  ?>   </td>
                                    <td> <?php echo $reg['profesion'] ?>   </td>
                                    <td> <?php echo $reg['tipo']      ?>   </td>
                                    <td style="display:none;"> <?php echo $reg['id'] ?> </td>
                                    <td class="text-center">
                                        <form action="../../CapaNegocio/GestionRevisores.php?id_tfg=<?php echo $id_tfg?>&tipo=elim&id_revisor=<?php echo $reg['id'] ?>" method="post">
                                            <button type="submit" class="btn btn-warning">
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
            </div>

        </section>
    </main>

    <?php include("../template/scripts.php");   ?>		<!-- Scrits -->
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



