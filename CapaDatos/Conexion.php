<?php

class Conexion
{
    /** Recurso de Conexion */
    private mysqli $cnx;

    /** Parametros */
    private String $servername = "localhost";
    private String $database = "bd_tfg";
    private String $username = "root";
    private String $password = "";

    /** Mensaje de error */
    private $mensajeError = NULL;

    /** Constructor */
    public function __construct() {}

    /**
     * Se encarga de realizar la conexion a MySQL
     * Retorna TRUE si la conexion es exitosa, FALSE en caso contrario 
     */
    public function conectar()
    {
        $this->cnx = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->cnx->connect_errno) {
            $this->mensajeError = "No se pudo conectar a la Base de Datos: " . $this->cnx->connect_error;
            return FALSE;
        }

        return TRUE;
    }

    /**
     * Se encarga de realizar la consulta en MySQL
     * Retorna TRUE si la consulta es exitosa, 
     * Retorna ARRAY si la consulta arroja algun resultado
     * Retorna FALSE en caso contrario 
     */
    public function EjecutarConsulta($consulta)
    {
        if (($resultado = $this->cnx->query($consulta))) {

            if (is_object($resultado)) {
                return $this->__obtenerResultados($resultado);
            } else {
                return TRUE;
            }
        }

        $this->mensajeError = "No se pudo obtener el resultado de la consulta: " . $this->cnx->error;
        return FALSE;
    }

    /**
     * Se encarga de retornar el arreglo completo de resultados obtenidos
     * debido a que mysqli, no permite obtenerlos todos en un solo arreglo.
     * Liberando tambien la memoria asociada al resultado
     */
    private function __obtenerResultados(mysqli_result &$resultadoBD)
    {
        $resultadoArray = array();

        while ($fila = $resultadoBD->fetch_assoc()) {
            $resultadoArray[] = $fila;
        }

        $resultadoBD->free();
        return $resultadoArray;
    }

    /**
     * Retorna el ultimo identificador insertado en la base de datos
     */
    public function getUltimoID()
    {
        return $this->cnx->insert_id;
    }

    /**
     * Se encarga de realizar la desconexion de MySQL
     * Retorna TRUE si la desconexion es exitosa, FALSE en caso contrario 
     */
    public function desconectar()
    {

        if (is_resource($this->cnx)) {
            return mysqli_close($this->cnx);
        }

        return FALSE;
    }

    
    /**
     * Retorna el mensaje de error obtenido en la ultima operacion realizada en la base de datos
     */
    public function obtenerMensajeError()
    {
        return $this->mensajeError;
    }

    /** Destructor */
    public function __destruct()
    {
        $this->desconectar();
    }
}

?>