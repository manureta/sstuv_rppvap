<?php

class QCollapsableItemPanel extends QPanel {

    protected $objContent;
    protected $objTitulo;
    protected $blnCollapsed = true;
    protected $blnCollapsableLink = true;

    public function __construct($objParentObject, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }

    public function GetControlHtml() {
        $strToReturn = '';
        if ($this->blnCollapsableLink) {
            $strToReturn .= sprintf('<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseCuadro%s"><i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>', $this->strControlId);
            if ($this->objTitulo instanceof QControl) {
                $strToReturn .= $this->objTitulo->Render(false);
            }
            $strToReturn .= '</a></h4></div>';
        }
        $strToReturn .= sprintf('<div class="panel-collapse collapse%s" id="collapseCuadro%s"><div class="panel-body">', (!$this->blnCollapsed ? ' in' : ''), $this->strControlId);
        $strToReturn .= $this->objContent->Render(false);
        $strToReturn .= '</div></div></div>';
        return $strToReturn;
    }

    public function __get($strName) {
        switch ($strName) {
            case 'Collapsed':
                return $this->blnCollapsed;
            case 'CollapsableLink':
                return $this->blnCollapsableLink = $mixValue;
            case 'Content':
                return $this->objContent;
            case 'Titulo':
                return $this->objTitulo;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case 'Collapsed':
                return $this->blnCollapsed = $mixValue;
            case 'CollapsableLink':
                return $this->blnCollapsableLink = $mixValue;
            case 'Content':
                return $this->objContent = $mixValue;
            case 'Titulo':
                if (is_string($mixValue)) {
                    $this->objTitulo = new QTitulo($this, $mixValue);
                } elseif ($mixValue instanceof QTitulo) {
                    $this->objTitulo = $mixValue;
                } else {
                    throw new QCallerException('Titulo debe ser un String o una instancia de QTitulo');
                }
                return $this->objTitulo;
            default:
                try {
                    return parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

}
