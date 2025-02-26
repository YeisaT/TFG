<?php
    include('../CapaDatos/Conexion.php');

    $nombres =  $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $fechanac = $_POST['fechanac'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];
    $anio_ingreso = $_POST['anio_ingreso'];
    $profesion = $_POST['profesion'];
    $prefProf = $_POST['prefProf'];

    $cnx = new Conexion();
    $cnx->conectar();

    $consulta = "insert into Persona(id, nombres, apaterno, amaterno, fechanac, sexo, telefono, email) 
                 values(0, '$nombres','$apaterno','$amaterno','$fechanac','$sexo','$telefono', '$email')";

    $cnx->EjecutarConsulta($consulta);
    $id_Persona = $cnx->getUltimoID();

    $consulta = "insert into Academico(id, Profesion, prefProf) 
                 values(0, '$profesion','$prefProf')";

    $cnx->EjecutarConsulta($consulta);
    $id_Academico = $cnx->getUltimoID();

    $consulta = "insert into Docente(id, codigo, anio_ingreso, id_Academico) 
                 values($id_Persona, '$codigo',$anio_ingreso, $id_Academico)";

    $cnx->EjecutarConsulta($consulta);

    $cnx->desconectar();
        
    echo '<script type="text/javascript">
              window.location = "../CapaPresentacion/Docentes/Docente-list.php"
          </script>'; 


?>


