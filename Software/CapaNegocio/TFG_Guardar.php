<?php
include_once('../CapaDatos/Datos.php');
include_once('../CapaDatos/Listados.php');

//session_name('tfgnew'); 
if (!isset($_SESSION)) {
    session_start();
}
$paso = $_GET["paso"];
$datos = new Datos();

if ($paso==1){
    $registro = $_POST['registro'];
    $_SESSION['registro'] = $registro; 
    $egr = $datos->ObtenerEgresado($registro);
    if (!empty($egr)) {
        $_SESSION['nombreegr'] = $egr[0]['nombres'].' '.$egr[0]['apaterno'].' '.$egr[0]['amaterno'];
        $_SESSION['id_egresado'] = $egr[0]['id']; 
        $_SESSION['carreras'] = $datos->ObtenerCarreras( $egr[0]['id'] );
        $_SESSION['msgError'] = ""; 
    }
    else{
        $_SESSION['nombreegr'] = "";
        $_SESSION['id_egresado'] = "0"; 
        $_SESSION['msgError'] = "El número de Registro es incorrecto."; 
    }
    header("Location: ../CapaPresentacion/InicioTFG/TFG-new.php?paso=1");
    die;
}


if ($paso==2){
    $id_carrera = $_POST['id_carrera'];
    $id_egresado = $_SESSION['id_egresado'];

    $estado = $datos->BuscarTFG($id_egresado, $id_carrera);
    if ($estado != '') {
        $_SESSION['msgError'] = "El estudiante tiene un TFG en estado ".$estado; 
        header("Location: ../CapaPresentacion/InicioTFG/TFG-new.php?paso=1");
        die; 
    }
    else{
        $_SESSION['id_carrera'] = $id_carrera;
        $_SESSION['msgError'] = "";
        $lista = new Listados();
        $_SESSION['modalidades'] = $lista->ListarModalidadesGraduacion();
        $_SESSION['docinternos'] = $lista->ListarDocentesCorto();
        $_SESSION['docexternos'] = $lista->ListarExternosCorto();
        header("Location: ../CapaPresentacion/InicioTFG/TFG-new.php?paso=2");
        die; 
    }
}

if ($paso==3){
    $id_modalidad = $_POST['select_modalidad'];
    $tema         = $_POST['tema'];
    $tipotutor    = $_POST['tipotutor'];
    $id_academico = 0;
    if ($tipotutor == "I"){
        if (!empty($_POST['select_interno']))
            $id_academico = $_POST['select_interno'];
    }
    else{
        if (!empty($_POST['select_externo']))
            $id_academico = $_POST['select_externo'];
    }

    if ($id_academico == 0){
        $_SESSION['msgError'] = "Debe seleccionar un Tutor para el TFG"; 
        header("Location: ../CapaPresentacion/InicioTFG/TFG-new.php?paso=2");
        die;
    }

    $fechaini = $_POST['fechaini'];
    $fechafin = $_POST['fechafin'];

    if ($fechafin < $fechaini){
        $_SESSION['msgError'] = "La fecha probable de finalización debe ser mayor a la fecha inicial"; 
        header("Location: ../CapaPresentacion/InicioTFG/TFG-new.php?paso=2");
        die;        
    }

    $resp = $datos->guardarTFG($tema, $fechaini, $fechafin, $tipotutor, $_SESSION['id_egresado'], $id_academico, $_SESSION['id_carrera'], $id_modalidad);
    if ($resp == true){
        //session_destroy();
        header("Location: ../CapaPresentacion/InicioTFG/TFG-list.php");
    }
    else{
        $_SESSION['msgError'] = "Error al guardar los datos del Trabajo Final de Grado"; 
        header("Location: ../CapaPresentacion/InicioTFG/TFG-new.php?paso=2");
        die; 
    }

}

?>