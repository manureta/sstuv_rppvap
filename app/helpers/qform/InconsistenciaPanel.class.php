<?php

class InconsistenciaPanel extends QPanel {

    protected $arrInconsistencias = array();
    protected $arrInconsistenciasHijos = array();


    public function __construct($objParent, $strControlId = null) {
        try {
            parent::__construct($objParent, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->strTemplate = __VIEW_DIR__ . '/cuadros/InconsistenciaPanel.tpl.php';
        $this->strStyleSheets = __VIRTUAL_DIRECTORY__ . '/css/cuadros.css';
    }

    public function AddInconsistencia($objInconsistencia) {
        $this->Visible = true;
        return $this->arrInconsistencias[] = $objInconsistencia;
    }

    public function AddInconsistenciaHijo($objInconsistencia) {
        $this->Visible = true;
        return $this->arrInconsistenciasHijos[] = $objInconsistencia;
    }

    public function Reset() {
        $this->arrInconsistencias = array();
        $this->arrInconsistenciasHijos = array();
        $this->Visible = false;
    }

    public function GetCssClass($objInconsistencia) {
        switch (get_class($objInconsistencia)) {
            case 'InconsistenciaError':
            case 'InconsistenciaFaltante':
                return 'inconsistencia_error';
            case 'InconsistenciaAdvertencia':
                return 'inconsistencia_atencion';
        }
    }

    public function GetInconsistenciasArray() {
        return $this->arrInconsistencias;
    }
    
    public function GetInconsistenciasRenderArray() {
        $arrInconsistenciaArray = array();
        
        foreach($this->arrInconsistencias as $objInconsistencia){
            if(!isset($arrInconsistenciaArray[$objInconsistencia->Descripcion])){
                $arrInconsistenciaArray[$objInconsistencia->Descripcion] = array("cant"=>0, "obj"=>$objInconsistencia);
            }
            $arrInconsistenciaArray[$objInconsistencia->Descripcion]["cant"]++;
        }
        return $arrInconsistenciaArray;
    }

    public function GetInconsistenciasHijosArray() {
        return $this->arrInconsistenciasHijos;
    }

}
?>