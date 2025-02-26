<?php
    include('../CapaDatos/Conexion.php');

    $modalidad = $_POST['modalidad'];

    $cnx = new Conexion();
    $cnx->conectar();

    $consulta = "insert into Modalidad (id, nombre_modalidad) values(0, '$modalidad')";

    $cnx->EjecutarConsulta($consulta);

    $cnx->desconectar();
        
    echo '<script type="text/javascript">
              window.location = "../CapaPresentacion/Modalidad/Modalidad-list.php"
          </script>'; 


?>


