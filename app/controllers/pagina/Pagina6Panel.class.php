<?php

class Pagina6Panel extends PaginaControlPanel {

    public $btnAgregar;
    public function __construct($objParent, $intIdPagina , $strControlId = null) {
        
        try {
            $strControlId = "ctlPagina".$intIdPagina."Panel";
            parent::__construct($objParent, $intIdPagina, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->strTitulo = 'Estudios de grado en el nivel superior<br>Ud. deber&aacute; completar para cada una de las titulaciones que sean completadas, incompletas o en curso.';
        
        
        
    }
    public function Agregar($strFormId, $strControlId, $strParameter) {
                
        $objCollapsableItem = self::GetBloquePanel($this->objCollapsablePanel, 6,  6,$this->intIndexBloquesClonaos);
        $objCollapsableItem->Titulo = "Estudios de grado en el nivel superior N°".$this->intIndexBloquesClonaos;
        $this->pnlBloquesClonaosArray[$this->intIndexBloquesClonaos] = $objCollapsableItem->Content;
        $this->intIndexBloquesClonaos++;
        $this->Refresh();
        
    }
	
	public function GetBreadCrumb() {
        return array(
                array('Cédula','pagina'),
		'Estudios de grado en el nivel superior'
            );
    }


}
