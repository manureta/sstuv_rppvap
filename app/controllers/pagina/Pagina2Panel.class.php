<?php

class Pagina2Panel extends PaginaControlPanel {

    public function __construct($objParent, $intIdPagina, $strControlId = null) {
        try {
            parent::__construct($objParent, $intIdPagina, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }


    }
	
	public function GetBreadCrumb() {
        return array(
                array('Cédula','pagina'),
                'Características del hogar'
            );
    }


}
