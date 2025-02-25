<?php
include_once('../CapaDatos/class_tfg.php');

$id_tfg = $_GET["id_tfg"];
$tipo   = $_GET["tipo"];
$tfg    = new class_tfg(); 

if ($tipo=='ins'){
    $tipotutor = $_POST['tipotutor'];
    $id_revisor = 0;
    if ($tipotutor == "I"){
        if (!empty($_POST['select_interno']))
            $id_revisor = $_POST['select_interno'];
    }
    else{
        if (!empty($_POST['select_externo']))
            $id_revisor = $_POST['select_externo'];
    }

    if ($id_revisor == 0){
        $err = "Debe seleccionar un Revisor para el TFG"; 
        header("Location: ../CapaPresentacion/Revisores/Revisores.php?id_tfg=$id_tfg&err=$err");
        die;
    }

    $tfg->CargarDatos($id_tfg);
    if ($id_revisor == $tfg->id_tutor){
        $err = "Esta persona ya esta asignado como tutor, no puede ser revisor"; 
        header("Location: ../CapaPresentacion/Revisores/Revisores.php?id_tfg=$id_tfg&err=$err");
        die;
    }

    if ($tfg->ExisteRevisor($id_revisor, $id_tfg)){
        $err = "Esta persona ya esta asignado como revisor"; 
        header("Location: ../CapaPresentacion/Revisores/Revisores.php?id_tfg=$id_tfg&err=$err");
        die;        
    }

    if ($tfg->CantRevisores($id_tfg) >= 3){
        $err = "Ya existen 3 revisores para este trabajo final de grado"; 
        header("Location: ../CapaPresentacion/Revisores/Revisores.php?id_tfg=$id_tfg&err=$err");
        die;        
    }

    $err = '';
    $tfg->InsertarRevisor($id_revisor, $id_tfg); 
    header("Location: ../CapaPresentacion/Revisores/Revisores.php?id_tfg=$id_tfg&err=$err");
    die;

}




if ($tipo=='elim'){
    $id_revisor = $_GET["id_revisor"];
    echo $id_revisor,' ', $id_tfg;
    $tfg->EliminarRevisor($id_revisor, $id_tfg);
    $err='';
    header("Location: ../CapaPresentacion/Revisores/Revisores.php?id_tfg=$id_tfg&err=$err");
    die;    
}





?>