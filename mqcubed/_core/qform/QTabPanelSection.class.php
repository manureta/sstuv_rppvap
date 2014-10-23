<?php

class QTabPanelSection extends QPanel {

    protected $strTitle;
    protected $intCurrentSection;
    protected $strParentControlId;
    //protected $arrControls = array();

    protected $blnShown = false;
    protected $lnkButton;

    public function __construct($objParentObject, $strTabTitle = null, $strControlId = null) {

        if (!($objParentObject instanceof QTabPanel))
            throw new QCallerException('ParentObject of QTabPanelSection must be a QTabPanel');

        $this->CurrentSection = $objParentObject->CurrentSection;
        $this->ParentControlId = $objParentObject->ControlId;
        $this->strTitle = $strTabTitle;
        //$this->AutoRenderChildren=true;

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->incrementOffset();
            throw $objExc;
        }
    }

    // And our public getter/setters
    public function __get($strName) {
        switch ($strName) {
            case 'Title': return $this->strTitle;
            case 'CurrentSection': return $this->intCurrentSection;
            case 'ParentControlId': return $this->strParentControlId;
            case 'Shown': return $this->blnShown;
            case 'ButtonLink': return $this->lnkButton;
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
        // Whenever we set a property, we must set the Modified flag to true
        $this->blnModified = true;

        try {
            switch ($strName) {
                case 'Title': return ($this->strTitle = QType::Cast($mixValue, QType::String));
                case 'CurrentSection': return ($this->intCurrentSection = QType::Cast($mixValue, QType::Integer));
                case 'ParentControlId': return ($this->strParentControlId = QType::Cast($mixValue, QType::String));
                case 'Shown': return ($this->blnShown = QType::Cast($mixValue, QType::Boolean));
                default:
                    return (parent::__set($strName, $mixValue));
            }
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    public function AddControl($objControl) {
        if ($objControl->objParentControl &&
                $objControl->objParentControl !== $this) {
            $objControl->objParentControl->RemoveChildControl($objControl->ControlId, false);
        }
        $this->AddChildControl($objControl);
    }

    public function AddControls(array $objControlsArray) {
        foreach ($objControlsArray as $objControl) {
            if ($objControl instanceof QControl)
                $this->AddControl($objControl);
        }
    }

    public function RemoveChildControl($strControlId, $blnRemoveFromForm) {
        if(is_array($this->strSortArray)){
            foreach ($this->strSortArray as $i => $objControl) {
                if ($strControlId === $objControl->ControlId){
                    unset($this->strSortArray[$i]);
                    break;
                }
            }
        }
        parent::RemoveChildControl($strControlId, $blnRemoveFromForm);
    }
  
    public $strSortArray;

    public function SetOrder($arr) {
        $this->strSortArray = $arr;
    }

    public function Render($blnDisplayOutput = true) {
        $this->RenderHelper(func_get_args(), __FUNCTION__);
        $strToReturn = '';

        if($this->strSortArray){
            foreach ($this->objChildControlArray as $objControl) {
                if (!in_array($objControl, $this->strSortArray)) {
                    $this->strSortArray[] = $objControl;
                }
            }
        }else{
           $this->strSortArray = $this->objChildControlArray;
        }
        if(count($this->strSortArray) != count($this->objChildControlArray)){
            foreach($this->strSortArray as $i => $objControl){
                if(!in_array($objControl, $this->objChildControlArray))
                    unset($this->strSortArray[$i]);
            }
        }

        foreach ($this->strSortArray as $i => $objControl) {
            //if ($objControl instanceof QTabPanel || $objControl instanceof QTabPanelSection) {
            if ($objControl instanceof QPanel) {
                if (!$objControl->Rendered) {
                    $strToReturn.= $objControl->Render(false);
                }
            } else {
                if (!$objControl->Rendered) {
                    $strToReturn.= $objControl->RenderWithName(false);
                }
            }
        }

        $this->blnRendering = false;
        $this->blnOnPage = true;
        $this->blnRendered = true;
        
        if ($blnDisplayOutput) {
            print ($strToReturn);
            return null;
        } else {
            return $strToReturn;
        }
    }
}

?>
