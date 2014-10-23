<?php

class Pagina7Panel extends PaginaControlPanel {

    public function __construct($objParent, $intIdPagina , $strControlId = null) {
        try {
            $strControlId = "ctlPagina".$intIdPagina."Panel";
            parent::__construct($objParent, $intIdPagina, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }


    }
    
    public function Agregar($strFormId, $strControlId, $strParameter) {
                
        $objCollapsableItem = self::GetBloquePanel($this->objCollapsablePanel, 7,  7,$this->intIndexBloquesClonaos);
        $objCollapsableItem->Titulo = "Estudios de posgrado en el nivel superior y universitario N°".$this->intIndexBloquesClonaos;
        $this->pnlBloquesClonaosArray[$this->intIndexBloquesClonaos] = $objCollapsableItem->Content;
        $this->intIndexBloquesClonaos++;
        $this->Refresh();
        
    }
	
	public function GetBreadCrumb() {
        return array(
                array('Cédula','pagina'),
		'Estudios de posgrado/postitulo en el nivel superior y universitario'
            );
    }


}
