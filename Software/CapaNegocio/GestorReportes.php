<?php

include('../../CapaDatos/Listados.php');

class GestorReportes
{
    /** Atributos */

    /** Constructor */
    public function __construct() {
    }

    /** Destructor */
    public function __destruct() {
    }
    

    public function ListadoDocentes(){
        $list = new Listados();
        return $list->ListarDocentes();
    }

    public function ListadoPersonasExternas(){
        $list = new Listados();
        return $list->ListarPersonasExternas();
    }

    public function ListadoModalidades(){
        $list = new Listados();
        return $list->ListarModalidadesGraduacion();
    }    

    public function ListadoTFGEnCurso(){
        $list = new Listados();
        return $list->ListarTFG();
    }

    public function ListadoEgresados(){
        $list = new Listados();
        return $list->ListarEgresados();
    }

    public function ListadoDeCarreras(){
        $list = new Listados();
        return $list->ListarCarrerasLargo();
    }


}



?>