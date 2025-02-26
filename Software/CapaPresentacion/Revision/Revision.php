<!DOCTYPE php>
<php lang="es">
<head>
    <title>Registrar Revisión</title>
    <?php include("../template/head.php");   ?>
    <?php include("../../CapaDatos/class_tfg.php");   ?>
    <?php include("../../CapaDatos/Listados.php");   ?>
    <?php
        $id_tfg = $_GET['id_tfg'];
        $err = $_GET['err'];

        $tfg = new class_tfg();
        $tfg->CargarDatos($id_tfg);
        $listaRevisiones = $tfg->ListarRevisiones();
        $revisores = $tfg->ObtenerRevisoresAsignados($id_tfg); 

        
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; REGISTRAR REVISIONES 
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
            



            <form action="../../CapaNegocio/RegistrarRevision.php?id_tfg=<?php echo $id_tfg ?>&tipo=ins" class="form-neon mt-1" autocomplete="off" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="text-primary">Comentarios de la Revisión</label>
                                <textarea name="comentarios" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <!-- Menú desplegable de revisores -->
                        <div class="col-12 col-md-4">
                            <label class="text-primary">Revisor</label>
                            <select name="id" class="form-control" required>
                                <?php
                                    // Asegúrate de que $revisores contenga los revisores asignados al TFG actual
                                    foreach ($revisores as $revisor): ?>
                                        <option value="<?php echo $revisor['id']; ?>">
                                            <?php echo $revisor['prefProf'] . ' ' . $revisor['nombres'] . ' ' . $revisor['apaterno']; ?>
                                        </option>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="text-primary">Resultado</label>
                            <select name="resultado" class="form-control" required>
                                <option value="A">Aprobado</option>
                                <option value="R">Rechazado</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-raised btn-info btn-sm mt-4">Registrar Revisión</button>
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
                                <th>FECHA DE REVISIÓN</th>
                                <th>NÚMERO DE REVISIÓN</th>
                                <th>OBSERVACIONES</th>
                                <th>RESULTADO</th>
                                <th>REVISOR</th>
                                
                              
                            </tr>
                        </thead>
                        <tbody>
                        <?php
if ($listaRevisiones && is_array($listaRevisiones)) {
    foreach ($listaRevisiones as $revision) {
?>
    <tr>
        <td><?php echo $revision['fecha_revision'] ?></td>
        <td><?php echo $revision['nro_revision'] ?></td>
        <td><?php echo $revision['observaciones'] ?></td>
        <td><?php echo $revision['resultado'] ?></td>
        <td><?php echo $revision['Revisor'] ?></td>
        <td class="text-center">
        
</form>



        </td>
    </tr>
      
    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No hay revisiones disponibles.</td></tr>";
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



