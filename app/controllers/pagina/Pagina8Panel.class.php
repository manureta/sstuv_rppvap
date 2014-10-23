<?php

class Pagina8Panel extends PaginaControlPanel {
    public $btnAgregar;

    public function __construct($objParent, $intIdPagina , $strControlId = null) {
        try {
            parent::__construct($objParent, $intIdPagina, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        $this->btnAgregar = new QButton($this->objCollapsablePanel,'agregarcursos');
        $this->btnAgregar->Name = 'Agregar';
        $this->btnAgregar->Text = 'Agregar';
        $this->btnAgregar->AddCssClass('btn-info');
        $this->btnAgregar->Icon = 'plus-sign';
        $this->btnAgregar->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'Agregar'));

    }
    
    public function Agregar($strFormId, $strControlId, $strParameter) {
                
        $objCollapsableItem = self::GetBloquePanel($this->objCollapsablePanel, 8,  8,$this->intIndexBloquesClonaos);
        $intSecuencia = $this->intIndexBloquesClonaos + 1;
        $objCollapsableItem->Titulo = "Cursos de capacitacion /otras actividades de desarrollo profesional N°".$intSecuencia;
        $this->pnlBloquesClonaosArray[$this->intIndexBloquesClonaos] = $objCollapsableItem->Content;
        $this->intIndexBloquesClonaos++;
        $this->Refresh();
        
    }
	public function GetBreadCrumb() {
        return array(
                array('Cédula','pagina'),
		'Cursos de capacitacion /otras actividades de desarrollo profesional'
            );
    }


}
