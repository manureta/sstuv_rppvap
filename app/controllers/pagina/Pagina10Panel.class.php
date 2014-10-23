<?php

class Pagina10Panel extends PaginaControlPanel {

    public function __construct($objParent, $intIdPagina , $strControlId = null) {
        try {
            parent::__construct($objParent, $intIdPagina, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->btnGuardar->AddAction(new QClickEvent(), new QServerControlAction($this, 'SaveAndShow'));
        $this->btnSiguiente->Visible = false;
        
    }
    
    public function GetBreadCrumb() {
        return array(
                array('Cédula','pagina'),
		'Designaciones/Puestos de Trabajo/Nombramientos/Cargos'
            );
    }
    


}
