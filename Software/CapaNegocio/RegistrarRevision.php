<?php
include_once('../CapaDatos/class_tfg.php');

$id_tfg = $_GET["id_tfg"];
$tfg    = new class_tfg(); 

$observaciones = $_POST['comentarios'];
$resultado = $_POST['resultado'];
$id_revisor = $_POST['id'];

    

    // Llamamos al método RegistrarRevision para registrar la revisión
    $err='';
    $tfg->RegistrarRevision($observaciones, $resultado, $id_revisor, $id_tfg);
    header("Location: ../CapaPresentacion/Revision/Revision.php?id_tfg=$id_tfg&err=$err");
    die;    

    if ($tipo == 'elim') {
        $nro_revision = $_POST["nro_revision"];
         $tfg->BorrarRevision($id_tfg, $id_revisor, $nro_revision);
        $err = "alpaca"; // Codificar el mensaje de error o éxito
        header("Location: ../CapaPresentacion/Revision/Revision.php?id_tfg=$id_tfg&err=$err");
        die;
    }
    
    


    $err='';
    $tfg->ActualizarEstadoTFG($id_tfg, $nro_revision, $resultado);
    header("Location: ../CapaPresentacion/Revision/Revision.php?id_tfg=$id_tfg&err=$err");
    die;    

    // Mensaje de éxito
    echo "Revisión registrada y estado de TFG actualizado correctamente.";

?>
