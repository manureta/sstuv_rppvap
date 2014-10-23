<?php

class QCollapsablePanel extends QPanel {

    //protected $objChildrenArray = array();
    protected $objTitulo;

    /**
     * 
     * @param QControl $objParentObject QControl $objParentObject del cual "cuelga" el QListPanel
     * @param object $objParent objeto al cual hacen referencia los registros del control (hijos)
     * @param string $strConfigArray array con los strings de propiedades y métodos necesarios para la magia
     * @param string $strControlId ControlId del QListPanel
     * @throws QCallerException
     */
    public function __construct($objParentObject, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->blnAutoRenderChildren = true;

    }

    public function GetControlHtml() {
        $strToReturn = '<div class="row"><div class="col-sm-12"><div id="accordion" class="accordion-style1 panel-group">';
        if ($this->Titulo) {
            $strToReturn .= $this->Titulo->Render(false);
        }
            $strToReturn .= parent::GetControlHtml();
            $strToReturn .= '</div></div></div></div>';

        return $strToReturn;
    }

    public function RenderWithName($blnDisplayOutput = true) {
        $this->RenderHelper(func_get_args(), __FUNCTION__);
        $this->blnIsBlockElement = true;

        // Render the Control's Dressing
        try {
            $strToReturn .= sprintf('%s', $this->GetControlHtml());
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        ////////////////////////////////////////////
        // Call RenderOutput, Returning its Contents
        return $this->RenderOutput($strToReturn, $blnDisplayOutput);
        ////////////////////////////////////////////
    }

    public function AddCollasableItem($objControl) {
        if (!$objControl instanceof QCollapsableItemPanel) {
            throw new QCallerException('Intenta agregar un hijo a QCollapsablePanel que no es instancia de QCollapsableItemPanel');
        }
        $this->objChildrenArray[$objControl->ControlId] = $objControl;
        $this->MarkAsModified();
    }

    public function RemoveCollapsableItem($objControl) {
        if (array_key_exists($objControl->ControlId, $objChildrenArray)) {
            unset($this->objChildrenArray[$objControl->ControlId]);
            unset($objControl);
            $this->MarkAsModified();
        }
    }

    public function __get($strName) {
        switch ($strName) {
//            case 'ChildrenArray':
//                return $this->objChildrenArray;
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
//            case 'ChildrenArray':
//                return $this->objChildrenArray = $mixValue;
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
