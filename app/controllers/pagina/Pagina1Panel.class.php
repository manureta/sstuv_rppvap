<?php

class Pagina1Panel extends PaginaControlPanel {

    public function __construct($objParent, $intIdPagina , $strControlId = null) {
        try {
            parent::__construct($objParent, $intIdPagina, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->strTitulo = 'Datos Personales';

    }
	
	public function GetBreadCrumb() {
        return array(
                array('Cédula','pagina'),
                'Datos Personales'
            );
    }


}
