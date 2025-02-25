<?php
include_once('../CapaDatos/class_tfg.php');

$id_tfg = $_GET["id_tfg"];
$tipo   = $_GET["tipo"];
$tfg    = new class_tfg(); 

if ($tipo=='ins'){
    $tipotutor = $_POST['tipotutor'];
    $id_colaborador = 0;
    if ($tipotutor == "I"){
        if (!empty($_POST['select_interno']))
            $id_colaborador = $_POST['select_interno'];
    }
    else{
        if (!empty($_POST['select_externo']))
            $id_colaborador = $_POST['select_externo'];
    }

    if ($id_colaborador == 0){
        $err = "Debe seleccionar un Colaborador para el TFG"; 
        header("Location: ../CapaPresentacion/Colaboradores/Colaboradores.php?id_tfg=$id_tfg&err=$err");
        die;
    }

    $tfg->CargarDatos($id_tfg);
    if ($id_colaborador == $tfg->id_tutor){
        $err = "Esta persona ya esta asignado como tutor, no puede ser colaborador"; 
        header("Location: ../CapaPresentacion/Colaboradores/Colaboradores.php?id_tfg=$id_tfg&err=$err");
        die;
    }

    if ($tfg->ExisteColaborador($id_colaborador, $id_tfg)){
        $err = "Esta persona ya esta asignado como colaborador"; 
        header("Location: ../CapaPresentacion/Colaboradores/Colaboradores.php?id_tfg=$id_tfg&err=$err");
        die;        
    }

    if ($tfg->CantColaboradores($id_tfg) >= 3){
        $err = "Ya existen 3 colaboradores para este trabajo final de grado"; 
        header("Location: ../CapaPresentacion/Colaboradores/Colaboradores.php?id_tfg=$id_tfg&err=$err");
        die;        
    }

    $err='';
    $tfg->InsertarColaborador($id_colaborador, $id_tfg);
    header("Location: ../CapaPresentacion/Colaboradores/Colaboradores.php?id_tfg=$id_tfg&err=$err");
    die;    
}




if ($tipo=='elim'){
    $id_colaborador = $_GET["id_colaborador"];
    echo $id_colaborador,' ', $id_tfg;
    $tfg->EliminarColaborador($id_colaborador, $id_tfg);
    $err='';
    header("Location: ../CapaPresentacion/Colaboradores/Colaboradores.php?id_tfg=$id_tfg&err=$err");
    die;    
}





?>