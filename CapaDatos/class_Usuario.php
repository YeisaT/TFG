<?php
include_once('Conexion.php');

class class_Usuario
{
    public int $id;
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
   
    public function ObtenerUsuario($usuario, $clave){
        $consulta = "SELECT U.username, concat(P.nombres,' ',P.apaterno,' ',P.amaterno) As nombre_completo, P.sexo 
                       FROM Usuario U INNER JOIN persona P ON U.id_persona=P.id
                         WHERE U.estado='A' AND U.username='$usuario' AND U.password='$clave'";
        return $this->cnx->EjecutarConsulta($consulta);
    }

}


?>