
<?php
include_once('Conexion.php');

class class_tfg
{
    public int $id;
    public string $tema;
    public string $fecha_ini;
    public string $fecha_fin_est;
    public string $tipo_tutor;
    public int $id_egresado;
    public int $id_tutor;
    public int $id_carrera;
    public int $id_modalidad;
    public int $id_estado;
    
    public Conexion $cnx;    
    
    /** Constructor */
    public function __construct() {
        $this->cnx = new Conexion();
        $this->cnx->conectar();        
    }

    /** Destructor */
    public function __destruct() {
        $this->cnx->desconectar();
    }
   
    public function CargarDatos(int $id_tfg){
        $consulta = "select id, tema, fecha_ini, fecha_fin_est, tipo_tutor, id_egresado, id_tutor, id_carrera, id_modalidad, id_estado 
                    from tfg where id=$id_tfg";
        $reg = $this->cnx->EjecutarConsulta($consulta);

        $this->id = $id_tfg;
        $this->tema = $reg[0]['tema'];
        $this->fecha_ini = $reg[0]['fecha_ini'];
        $this->fecha_fin_est = $reg[0]['fecha_fin_est'];
        $this->tipo_tutor = $reg[0]['tipo_tutor'];
        $this->id_egresado = $reg[0]['id_egresado'];
        $this->id_tutor = $reg[0]['id_tutor'];
        $this->id_carrera = $reg[0]['id_carrera'];
        $this->id_modalidad = $reg[0]['id_modalidad'];
        $this->id_estado = $reg[0]['id_estado'];
    }
    
    public function NombreTutor(){
        $consulta = "SELECT 	
                        case
                            when t.tipo_tutor='I' then
                                (select concat(pt.nombres,' ',pt.apaterno,' ',pt.amaterno) 
                                from persona pt inner join docente d on d.id=pt.id where d.id_Academico=t.id_tutor) 
                            else
                                (select concat(pt.nombres,' ',pt.apaterno,' ',pt.amaterno) 
                                from persona pt inner join personaexterna px on px.id=pt.id where px.id_Academico=t.id_tutor)
                        end tutor
                    FROM tfg t where t.id=$this->id";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return $reg[0]['tutor'];
    }

    public function NombreEgresado(){
        $consulta = "SELECT concat(p.nombres,' ',p.apaterno,' ',p.amaterno) nombre
                        FROM tfg t inner join persona p on p.id=t.id_egresado
                        WHERE t.id=$this->id";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return $reg[0]['nombre'];
    }

    public function NombreCarrera(){
        $consulta = "SELECT c.nombre
                        FROM tfg t inner join carrera c on c.id=t.id_carrera
                        WHERE t.id=$this->id";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return $reg[0]['nombre'];
    }

    public function Modalidad(){
        $consulta = "SELECT m.nombre_modalidad
                        FROM tfg t inner join modalidad m on m.id=t.id_modalidad
                        WHERE t.id=$this->id";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return $reg[0]['nombre_modalidad'];
    }

    public function Estado(){
        $consulta = "SELECT e.descripcion
                        FROM tfg t inner join estado_tfg e on e.id=t.id_estado
                        WHERE t.id=$this->id";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return $reg[0]['descripcion'];
    }

    public function ListarColaboradores(){
        $consulta = "SELECT a.id, a.prefProf, p.nombres, p.apaterno, p.amaterno, a.profesion, 'I' tipo
                     FROM colaborador c 
                        inner join academico a on a.id = c.id_colaborador 
                        inner join docente d   on d.id_Academico = a.id
                        inner join persona p   on p.id = d.id
                     WHERE c.id_TFG=$this->id
                     UNION
                     SELECT a.id, a.prefProf, p.nombres, p.apaterno, p.amaterno, a.profesion, 'E' tipo
                     FROM colaborador c 
                        inner join academico a on a.id = c.id_colaborador 
                        inner join personaexterna pe   on pe.id_Academico = a.id
                        inner join persona p   on p.id = pe.id
                     WHERE c.id_TFG=$this->id";
        return $this->cnx->EjecutarConsulta($consulta);
    }    
    
    public function ExisteColaborador($id_colaborador, $id_tfg){
        $consulta = "select id_colaborador from colaborador where id_colaborador=$id_colaborador and id_tfg=$id_tfg";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return (!empty($reg)); 
    }    

    public function CantColaboradores($id_tfg){
        $consulta = "select count(*) cant from colaborador  where id_tfg=$id_tfg";
        $reg = $this->cnx->EjecutarConsulta($consulta);
        return ($reg[0]['cant']); 
    }    
    
    public function InsertarColaborador($id_colaborador, $id_tfg){
        $consulta = "insert into colaborador(id_colaborador, id_TFG)
                                 values($id_colaborador, $id_tfg)";
        $this->cnx->EjecutarConsulta($consulta);
    }
    
    public function EliminarColaborador($id_colaborador, $id_tfg){
        $consulta = "delete from colaborador where id_colaborador=$id_colaborador and id_tfg=$id_tfg";
        $this->cnx->EjecutarConsulta($consulta);
    }

        //GESTIÓN DE REVISORES//////////////////////////////////////////////////////////////////////////////////////

        public function ListarRevisores(){
            $consulta = "SELECT a.id, a.prefProf, p.nombres, p.apaterno, p.amaterno, a.profesion, 'I' tipo
                         FROM revisor r
                            inner join academico a on a.id = r.id_revisor
                            inner join docente d   on d.id_Academico = a.id
                            inner join persona p   on p.id = d.id
                         WHERE r.id_TFG=$this->id
                         UNION
                         SELECT a.id, a.prefProf, p.nombres, p.apaterno, p.amaterno, a.profesion, 'E' tipo
                         FROM revisor r
                            inner join academico a on a.id = r.id_revisor
                            inner join personaexterna pe   on pe.id_Academico = a.id
                            inner join persona p   on p.id = pe.id
                         WHERE r.id_TFG=$this->id";
            return $this->cnx->EjecutarConsulta($consulta);
        }    
        
        public function ExisteRevisor($id_revisor, $id_tfg){
            $consulta = "select id_revisor from revisor where id_revisor=$id_revisor and id_tfg=$id_tfg";
            $reg = $this->cnx->EjecutarConsulta($consulta);
            return (!empty($reg)); 
        }    
    
        public function CantRevisores($id_tfg){
            $consulta = "select count(*) cant from revisor  where id_tfg=$id_tfg";
            $reg = $this->cnx->EjecutarConsulta($consulta);
            return ($reg[0]['cant']); 
        }    
    
        public function InsertarRevisor($id_revisor, $id_tfg) {
            $consulta = "INSERT INTO Revisor (id_revisor, id_TFG) VALUES ($id_revisor, $id_tfg)";
            $this->cnx->EjecutarConsulta($consulta);
        }
        
        
        public function EliminarRevisor($id_revisor, $id_tfg){
            $consulta = "delete from revisor where id_revisor=$id_revisor and id_tfg=$id_tfg";
            $this->cnx->EjecutarConsulta($consulta);
        }
    
        //REVISION DE TFG/////////////////////////////////////////////////////////////////////////////////////
    
      
        public function ListarRevisiones() {
            $consulta = "SELECT 
                            r.fecha_revision, 
                            r.nro_revision, 
                            r.observaciones, 
                            r.resultado, 
                            CONCAT(p.nombres, ' ', p.apaterno, ' ', IFNULL(p.amaterno, '')) AS Revisor
                        FROM 
                            revision r
                        JOIN 
                            docente d ON r.id_revisor = d.id_academico
                        JOIN 
                            persona p ON d.id = p.id
                        WHERE 
                            r.id_TFG = $this->id
    
                        UNION ALL
    
                        SELECT 
                            r.fecha_revision, 
                            r.nro_revision, 
                            r.observaciones, 
                            r.resultado, 
                            CONCAT(p_nombres.nombres, ' ', p_nombres.apaterno, ' ', IFNULL(p_nombres.amaterno, '')) AS Revisor
                        FROM 
                            revision r
                        JOIN 
                            personaexterna pe ON r.id_revisor = pe.id_academico
                        JOIN 
                            persona p_nombres ON pe.id_academico = p_nombres.id  --  'p_nombres' para evitar confusión
                        WHERE 
                            r.id_TFG = $this->id
                        LIMIT 0, 25;";
           return $this->cnx->EjecutarConsulta($consulta);
        }
    
    
        public function ObtenerRevisoresAsignados() {
            $consulta = "SELECT a.id, a.prefProf, p.nombres, p.apaterno, p.amaterno
                        FROM revisor r 
                        JOIN academico a ON a.id = r.id_revisor
                        JOIN docente d ON d.id_Academico = a.id
                        JOIN persona p ON p.id = d.id
                        WHERE r.id_TFG = $this->id
                        
                        UNION
                        
                        SELECT a.id, a.prefProf, p.nombres, p.apaterno, p.amaterno
                        FROM revisor r 
                        JOIN academico a ON a.id = r.id_revisor
                        JOIN personaexterna pe ON pe.id_Academico = a.id
                        JOIN persona p ON p.id = pe.id
                        WHERE r.id_TFG = $this->id";
            return $this->cnx->EjecutarConsulta($consulta);
        }
        
        /**
         * Registrar una nueva revisión para un TFG.
         *//*
        public function RegistrarRevision($observaciones, $resultado, $id_revisor, $id_tfg) {
            // Obtener el número de revisión específico para el revisor y el TFG
            $consultaNumeroRevision = "SELECT COUNT(*) + 1 as numero_revision 
                                       FROM revision 
                                       WHERE id_TFG = $id_tfg AND id_revisor = $id_revisor";
            $result = $this->cnx->EjecutarConsulta($consultaNumeroRevision);
            $nro_revision = $result[0]['numero_revision'];
        
            // Asignar fecha actual en el formato correcto
            $fecha_revision = date('Y-m-d');
        
            // Preparar el valor de resultado ('A' o 'R')
            $resultadoAbreviado = ($resultado === 'A' || strtolower($resultado) === 'aprobado') ? 'A' : 'R';
        
            // Consulta para insertar la revisión
            $consulta = "INSERT INTO revision (fecha_revision, nro_revision, observaciones, resultado, id_revisor, id_TFG)
                         VALUES ('$fecha_revision', $nro_revision, '$observaciones', '$resultadoAbreviado', $id_revisor, $id_tfg)";
        
            // Ejecutar la consulta de inserción
            $this->cnx->EjecutarConsulta($consulta);
        }
    */
        public function RegistrarRevision($observaciones, $resultado, $id_revisor, $id_tfg) {
            // Obtener la cantidad de revisiones para el revisor y el TFG
            $cantRevisiones = $this->CantRevisiones($id_tfg, $id_revisor);
            
            // Verificar si se alcanzó el límite de 3 revisiones
            if ($cantRevisiones >= 3) {
                return "Error: Ya existen 3 revisiones para este revisor.";
            }
        
            // Obtener el número de revisión específico para el revisor y el TFG
            $consultaNumeroRevision = "SELECT COUNT(*) + 1 as numero_revision 
                                       FROM revision 
                                       WHERE id_TFG = $id_tfg AND id_revisor = $id_revisor";
            $result = $this->cnx->EjecutarConsulta($consultaNumeroRevision);
            $nro_revision = $result[0]['numero_revision'];
        
            // Asignar fecha actual en el formato correcto
            $fecha_revision = date('Y-m-d');
        
            // Preparar el valor de resultado ('A' o 'R')
            $resultadoAbreviado = ($resultado === 'A' || strtolower($resultado) === 'aprobado') ? 'A' : 'R';
        
            // Consulta para insertar la revisión
            $consulta = "INSERT INTO revision (fecha_revision, nro_revision, observaciones, resultado, id_revisor, id_TFG)
                         VALUES ('$fecha_revision', $nro_revision, '$observaciones', '$resultadoAbreviado', $id_revisor, $id_tfg)";
        
            // Ejecutar la consulta de inserción
            $this->cnx->EjecutarConsulta($consulta);
        }
        
        public function CantRevisiones($id_tfg, $id_revisor) {
            $consulta = "SELECT COUNT(*) cant FROM revision WHERE id_TFG = $id_tfg AND id_revisor = $id_revisor";
            $reg = $this->cnx->EjecutarConsulta($consulta);
            return ($reg[0]['cant']);
        }
    
        public function BorrarRevision($id_tfg, $id_revisor, $nro_revision) {
            // Obtener la cantidad de revisiones existentes
            $cantRevisiones = $this->CantRevisiones($id_tfg, $id_revisor);
            
            // Verificar si la revisión a eliminar es válida
            if ($nro_revision > $cantRevisiones || $nro_revision < 1) {
                return "Error: No se puede borrar la revisión porque no existe.";
            }
            
            // Verificar que se esté intentando borrar de manera descendente
            if ($nro_revision < $cantRevisiones) {
                return "Error: Solo puedes borrar la revisión {$cantRevisiones} primero.";
            }
        
            // Preparar la consulta para borrar la revisión
            $consulta = "DELETE FROM revision WHERE id_TFG = $id_tfg AND id_revisor = $id_revisor AND nro_revision = $nro_revision";
            $resultado = $this->cnx->EjecutarConsulta($consulta);
        
            // Comprobar si la eliminación fue exitosa
            if ($resultado) {
                return "Revisión {$nro_revision} eliminada exitosamente.";
            } else {
                return "Error: No se pudo eliminar la revisión.";
            }
        }
        
        
        /**
         * Actualizar el estado del TFG basado en el número de revisión y el resultado.
         */
        public function ActualizarEstadoTFG($id_tfg, $nro_revision, $resultado) {
            $nuevoEstado = $this->DeterminarEstado($id_tfg, $nro_revision, $resultado);
            if (!$nuevoEstado) return false; // Salir si no se determina un nuevo estado
    
            $consulta = "UPDATE TFG SET id_estado = ? WHERE id = ?";
            $this->cnx->EjecutarConsulta($consulta);
        }
    
        /**
         * Determina el estado adecuado basado en el número de revisión y el resultado.
         */
        private function DeterminarEstado($id_tfg, $nro_revision, $resultado) {
            if ($resultado == 'A') { // Si el resultado es "Aprobado"
                return match ($nro_revision) {
                    1 => 3, // REVISION PRIMERA ETAPA
                    2 => 4, // REVISION SEGUNDA ETAPA
                    3 => 5, // REVISION TERCERA ETAPA
                    default => false,
                };
            }
            return 2; // Estado "INICIADO" si no se aprueba
        }
    

}


?>