<?php
include_once('Conexion.php');

class Datos
{

    private Conexion $cnx;    
    
    /** Constructor */
    public function __construct() {
        $this->cnx = new Conexion();
        $this->cnx->conectar();        
    }

    /** Destructor */
    public function __destruct() {
        $this->cnx->desconectar();
    }
    
    //Dado el numero de registro obtiene el id y el nombre completo de un egresado 
    public function ObtenerEgresado($registro){  
        $consulta = "select e.id, p.nombres, p.apaterno, p.amaterno 
                            from egresado e inner join Persona p on e.id=p.id
                            Where e.registro=".$registro;
        return $this->cnx->EjecutarConsulta($consulta);
    }

    //Obtiene todas las carreras de un egresado, se le envía el id_egresado  
    public function ObtenerCarreras($id_egresado){
        $consulta = "select c.id, c.nombre
                        from carrera c
                             inner join egresado_carrera ec on c.id=ec.id_carrera
                        Where ec.id_egresado=".$id_egresado;
        return $this->cnx->EjecutarConsulta($consulta);
    }
    
    //Busca un TFG para un (egresado, carrera) Si lo encuentra retorna su estado
    public function BuscarTFG($id_egresado, $id_carrera){
        $consulta = "select e.descripcion estado
                        from tfg t inner join estado_tfg e on t.id_estado = e.id
                        where t.id_estado>1 and t.id_egresado=$id_egresado and t.id_carrera=$id_carrera";
        $res = $this->cnx->EjecutarConsulta($consulta);
        if (!empty($res))
            return $res[0]['estado'];
        else
            return '';
    }


    public function guardarTFG($tema, $fechaini, $fechafin, $tipotutor, $id_egresado, $id_academico, $id_carrera, $id_modalidad){
        $consulta = "insert into TFG(id, tema, fecha_ini, fecha_fin_est, tipo_tutor, id_egresado, id_tutor, id_carrera, id_modalidad, id_estado)
                     values (0, '$tema', '$fechaini', '$fechafin', '$tipotutor', $id_egresado, $id_academico, $id_carrera, $id_modalidad, 2) ";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    

}


?>