<?php

class QListPanel extends QPanel {

    public $btnAdd;
    public $objParent;
    protected $objChildsArray = array();
    protected $strConfigArray = array();
    protected $arrNewMethod;
    protected $arrEditMethod;
    protected $arrDeleteClickAction;
    protected $objModalPanel;
    protected $strLabelForUn;
    protected $strLabelForEl;
    protected $strLabelForEste;
    protected $blnUseRefreshMethodWithArguments = false;
    protected $arrRefreshMethodArguments = array();

    /**
     * 
     * @param QControl $objParentObject QControl $objParentObject del cual "cuelga" el QListPanel
     * @param object $objParent objeto al cual hacen referencia los registros del control (hijos)
     * @param string $strConfigArray array con los strings de propiedades y métodos necesarios para la magia
     * @param string $strControlId ControlId del QListPanel
     * @throws QCallerException
     */
    public function __construct($objParentObject, $objParent, $strConfigArray, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objParent = $objParent;

        // Verifico el array de configuración
        if (array_key_exists('arrRefreshMethodArguments', $strConfigArray)) {
            $this->arrRefreshMethodArguments = (array) $strConfigArray['arrRefreshMethodArguments'];
            $this->blnUseRefreshMethodWithArguments = true;
        }
        $strDatosFaltantes = array_diff(
                array('strEntity', 'strRefreshMethod', 'strParentPrimaryKeyProperty', 'strPrimaryKeyProperty', 'strAddMethod', 'strRemoveMethod', 'Columns'), array_keys($strConfigArray));
        if ($strDatosFaltantes)
            throw new QCallerException('Array de configuración mal formado. Faltan los siguientes datos: ' . print_r($strDatosFaltantes, true));
        $this->strConfigArray = $strConfigArray;

        $strEntity = $this->strEntity;
        $this->strLabelForUn = sprintf('un%s %s', ($strEntity::GenderMale() ? '' : 'a'), $strEntity::Noun());
        $this->strLabelForEl = sprintf('%s %s', ($strEntity::GenderMale() ? 'el' : 'la'), $strEntity::Noun());
        $this->strLabelForEste = sprintf('est%s %s', ($strEntity::GenderMale() ? 'e' : 'a'), $strEntity::Noun());

        $this->RefreshElements();

        $this->btnAdd = new QButton($this);
        $this->btnAdd->AddCssClass('btn-xs pull-right qcaddbutton');
        $this->btnAdd->Icon = 'plus';
        $this->btnAdd->Text = 'Agregar ' . $this->strLabelForUn;
        $this->btnAdd->ToolTip = 'Agregar ' . $this->strLabelForUn;
        $this->btnAdd->Visible = false;
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
        
        $this->arrDeleteClickAction = null;
    }

    public function RefreshElements() {
        $strMethod = $this->strRefreshMethod;
        if ($this->blnUseRefreshMethodWithArguments) {
            $this->objChildsArray = call_user_func_array(array($this->objParent, $strMethod), $this->arrRefreshMethodArguments);
        } else {
            $this->objChildsArray = $this->objParent->$strMethod;
        }
    }

    public function MarkAsModified() {
        parent::MarkAsModified();
        $this->RefreshElements();
    }

    public function SetNewMethod($objControl, $strMethod) {
        $this->arrNewMethod = array($objControl, $strMethod);
        $this->btnAdd->Visible = true;
    }

    public function btnAdd_Click() {
        $strParentPK = $this->strParentPrimaryKeyProperty;
        return call_user_func($this->arrNewMethod, $this->objParent->$strParentPK);
    }

    public function SetEditMethod($objControl, $strMethod) {
        $this->arrEditMethod = array($objControl, $strMethod);
    }

    public function GetEditButton($intKey) {
        $objElement = $this->objChildsArray[$intKey];
        $strEditButtonId = "{$this->strControlId}btnEdit{$intKey}";
        if (!$objButton = $this->Form->GetControl($strEditButtonId)) {
            $objButton = new QButton($this, $strEditButtonId);
            $objButton->AddCssClass('btn-xs btn-info');
            $objButton->Icon = 'edit';
            $objButton->ToolTip = 'Editar ' . $this->strLabelForEste;
            $objButton->ActionParameter = $intKey;
            $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEdit_Click'));
        }
        if ($objElement->__Restored != $objButton->Enabled)
            $objButton->Enabled = $objElement->__Restored;
        return $objButton;
    }

    public function btnEdit_Click($strControlId, $strFormId, $intKey) {
        return call_user_func($this->arrEditMethod, $intKey);
    }
    
    public function SetDeleteClickAction($objControl, $strMethod) {
        $this->arrDeleteClickAction = array($objControl, $strMethod);
    }

    public function GetDeleteButton($intKey) {
        $strDeleteButtonId = "{$this->strControlId}btnDelete{$intKey}";
        if (!$objButton = $this->Form->GetControl($strDeleteButtonId)) {
            $objButton = new QButton($this, $strDeleteButtonId);
            $objButton->AddCssClass('btn-xs btn-danger');
            $objButton->Icon = 'trash';
            $objButton->ToolTip = 'Borrar ' . $this->strLabelForEste;
            $objButton->ActionParameter = $intKey;
            $strEntity = $this->strEntity;
            $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que quiere BORRAR est%s %s?\\r\\nEsta acción no se puede deshacer", ($strEntity::GenderMale() ? 'e' : 'a'), $strEntity::Noun())));
            $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnDelete_Click"));
        }
        $objButton->Visible = $this->blnEnabled;
        return $objButton;
    }
    

    public function btnDelete_Click($strControlId, $strFormId, $intKey) {
        $objElement = $this->objChildsArray[$intKey];
        unset($this->objChildsArray[$intKey]);
        $strRemoveMethod = $this->strConfigArray['strRemoveMethod'];
        $this->objParent->$strRemoveMethod($objElement);
        $this->blnModified = true;
        if($this->arrDeleteClickAction){
            return call_user_func($this->arrDeleteClickAction, $intKey);
        }
    }

    public function GetControlHtml() {
        $this->btnAdd->Visible = $this->blnEnabled;
        $intColumnas = count($this->Columns) + 1;
        $str = sprintf('<table id="%s" class="table table-striped table-bordered table-hover"  style="width:50%%">', $this->ControlId);
        $str .= '<thead><tr>';
        foreach ($this->Columns as $strProperty => $strTitle) {
            $str .= "<th>$strTitle</th>";
        }
        $str .= '<th>Acciones</th></tr></thead><tbody>';
        $strRow = '<tr>%s<td class="qlistpanel-btn"><div class="clearfix">%s%s</div></td></tr>';
        foreach ($this->objChildsArray as $intKey => $objElement) { //por cada row
            $strElem = '';
            foreach ($this->Columns as $strProperty => $strTitle) { //por cada columna
                $strElem .= sprintf('<td>%s</td>', $objElement->$strProperty);
            }
            $str .= sprintf($strRow, $strElem, $this->GetEditButton($intKey)->Render(false), $this->GetDeleteButton($intKey)->Render(false));
        }
        if (count($this->objChildsArray) == 0) {
            $str .= sprintf('<tr><td class="center" colspan="%d">La lista se encuentra vacía</td></tr>', $intColumnas);
        }//si no hay registros
        $str .= sprintf('</tbody><tfoot><tr><td colspan="%d">%s</td></tr></tfoot></table>', $intColumnas, $this->btnAdd->Render(false));
        return $str;
    }

    public function RenderWithName($blnDisplayOutput = true) {
        if ($this->blnModified)
            $this->RefreshElements();
        $this->RenderHelper(func_get_args(), __FUNCTION__);
        $this->blnIsBlockElement = true;

        // Render the Control's Dressing
        $strToReturn = '<div class="renderWithName qlistpanel">';

        // Render the Left side
        $strLeftClass = "";
        if ($this->blnRequired)
            $strLeftClass .= ' required';
        if (!$this->blnEnabled)
            $strLeftClass .= ' disabled';

        if ($this->strInstructions)
            $strInstructions = '<br/><span class="instructions">' . $this->strInstructions . '</span>';
        else
            $strInstructions = '';

        $strToReturn .= sprintf('<div class="%s"><label for="%s">%s</label>%s</div>', $strLeftClass, $this->strControlId, $this->strName, $strInstructions);

        // Render the Right side
        if ($this->strValidationError) {
            $strErrorMessage = sprintf('<span class="help-block">%s</span>', $this->strValidationError);
            $strErrorClass = ' has-error';
        } else if ($this->strWarning) {
            $strErrorMessage = sprintf('<span class="help-block">%s</span>', $this->strWarning);
            $strErrorClass = ' has-warning';
        } else
            $strErrorMessage = $strErrorClass = '';

        try {
            $strToReturn .= sprintf('<div class="%s">%s%s%s%s</div>', $strErrorClass, $this->strHtmlBefore, $this->GetControlHtml(), $this->strHtmlAfter, $strErrorMessage);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $strToReturn .= '</div>';

        ////////////////////////////////////////////
        // Call RenderOutput, Returning its Contents
        return $this->RenderOutput($strToReturn, $blnDisplayOutput);
        ////////////////////////////////////////////
    }

    public function __get($strName) {
        if (array_key_exists($strName, $this->strConfigArray)) {
            return $this->strConfigArray[$strName];
        }
        switch ($strName) {
            case 'ModalPanel':
                return $this->objModalPanel;
            case 'SelectedItems':
                $strPk = $this->strConfigArray['strPrimaryKeyProperty'];
                $intIdsArray = array();
                foreach ($this->objChildsArray as $objChild) {
                    $intIdsArray[] = $objChild->$strPk;
                }
                return $intIdsArray;
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
        if (array_key_exists($strName, $this->strConfigArray)) {
            return $this->strConfigArray[$strName] = $mixValue;
        }
        switch ($strName) {
            case 'ModalPanel':
                if (!$mixValue instanceof EditPanelBase)
                    throw new QCallerException('La propiedad ModalPanel debe ser un objeto que hereda de EditPanelBase');
                return $this->objModalPanel = $mixValue;
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
