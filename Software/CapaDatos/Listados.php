<?php
include_once('Conexion.php');

class Listados
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
    
    public function ListarDocentes(){
        $consulta = "SELECT p.id, p.nombres, p.apaterno, p.amaterno, p.fechanac, p.sexo, p.telefono, p.email, 
                            d.codigo, a.id id_Academico, a.prefProf, a.profesion
                     FROM docente d 
                          inner join persona p   on p.id = d.id
                          inner join academico a on a.id = d.id_Academico";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarPersonasExternas(){
        $consulta = "SELECT p.id, p.nombres, p.apaterno, p.amaterno, p.fechanac, p.sexo, p.telefono, p.email, 
                            x.institucion, a.id id_Academico, a.prefProf, a.profesion
                     FROM PersonaExterna x 
                          inner join persona p   on p.id = x.id
                          inner join academico a on a.id = x.id_Academico";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarModalidadesGraduacion(){
        $consulta = "SELECT id, nombre_modalidad FROM Modalidad";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarDocentesCorto(){
        $consulta = "SELECT d.id_academico, concat(a.prefProf,' ',p.nombres,' ',p.apaterno,' ',p.amaterno) nombre
                     FROM docente d 
                          inner join persona p   on p.id = d.id
                          inner join academico a on a.id = d.id_Academico";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarExternosCorto(){
        $consulta = "SELECT x.id_academico, concat(a.prefProf,' ',p.nombres,' ',p.apaterno,' ',p.amaterno) nombre
                     FROM PersonaExterna x 
                          inner join persona p   on p.id = x.id
                          inner join academico a on a.id = x.id_Academico";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarTFG(){
        $consulta = "SELECT t.id, t.tema, t.fecha_ini, concat(pe.nombres,' ',pe.apaterno,' ',pe.amaterno) egresado, m.nombre_modalidad, t.tipo_tutor, 
                        case
                            when t.tipo_tutor='I' then
                                (select concat(pt.nombres,' ',pt.apaterno,' ',pt.amaterno) 
                                from persona pt inner join docente d on d.id=pt.id where d.id_Academico=t.id_tutor) 
                            else
                                (select concat(pt.nombres,' ',pt.apaterno,' ',pt.amaterno) 
                                from persona pt inner join personaexterna px on px.id=pt.id where px.id_Academico=t.id_tutor)
                        end tutor,
                        c.nombre carrera, e.descripcion estado
                    FROM tfg t
                        inner join persona pe   on  pe.id = t.id_egresado
                        inner join carrera c    on  c.id  = t.id_carrera
                        inner join modalidad m  on  m.id  = t.id_modalidad
                        inner join estado_tfg e on  e.id  = t.id_estado
                    where t.id_estado<>1 and t.id_estado<>9
                    order by t.fecha_ini, t.id_carrera, t.id_modalidad";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarEgresados(){
        $consulta = "SELECT e.id, concat(p.nombres,' ',p.apaterno,' ',p.amaterno) nombre, e.registro, c.nombre nombrecarrera
                     FROM egresado e 
                          INNER JOIN persona p   ON p.id = e.id
                          INNER JOIN egresado_carrera ec ON ec.id_egresado=e.id
                          INNER JOIN carrera c ON c.id=ec.id_carrera";
        return $this->cnx->EjecutarConsulta($consulta);
    }

    public function ListarCarrerasLargo(){
        $consulta = "SELECT id, nombre, codigo, duraccion, facultad FROM carrera";
        return $this->cnx->EjecutarConsulta($consulta);
    }

}


?>