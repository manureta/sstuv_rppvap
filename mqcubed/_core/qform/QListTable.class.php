<?php

class QListTable extends QPanel {

    public $btnAdd;

    protected $objParent;
    protected $objDataGrid;
    protected $arrOpenMethod;
    protected $objChildsArray = array();
    protected $strConfigArray = array();
    protected $strLabelPlural;
    protected $strLabelForEl;
    protected $strLabelForEste;

    /**
     * 
     * @param QControl $objParentObject QControl $objParentObject del cual "cuelga" el QListTable
     * @param object $objParent objeto al cual hacen referencia los registros del control (hijos)
     * @param string $strConfigArray array con los strings de propiedades y métodos necesarios para la magia
     * @param string $strControlId ControlId del QListTable
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
        $strDatosFaltantes = array_diff(
            array('strEntity','strRefreshMethod','strPrimaryKeyProperty','strAddMethod','strRemoveMethod','Columns'), 
            array_keys($strConfigArray));
        if ($strDatosFaltantes)
            throw new QCallerException('Array de configuración mal formado. Faltan los siguientes datos: '.print_r($strDatosFaltantes,true));
        $this->strConfigArray = $strConfigArray;

        $strEntity = $this->strEntity;
        $this->strLabelPlural = $strEntity::NounPlural();
        $this->strLabelForEl = sprintf('%s %s', ($strEntity::GenderMale() ? 'el' : 'la'), $strEntity::Noun());
        $this->strLabelForEste = sprintf('est%s %s', ($strEntity::GenderMale() ? 'e' : 'a'), $strEntity::Noun());

        
        $this->RefreshElements();

        $this->btnAdd = new QButton($this);
        $this->btnAdd->AddCssClass('btn-xs pull-right');
        $this->btnAdd->Icon = 'plus';
        $this->btnAdd->Text = 'Asociar '.$this->strLabelPlural;
        $this->btnAdd->ToolTip = 'Asociar '.$this->strLabelPlural;
        $this->btnAdd->Visible = false;
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));

    }

    public function RefreshElements() {
        $strMethod = $this->strRefreshMethod;
        $this->objChildsArray = $this->objParent->$strMethod;
    }

    public function MarkAsModified() {
        parent::MarkAsModified();
        $this->RefreshElements();
    }

    public function SetOpenMethod($objControl, $strMethod) {
        $this->arrOpenMethod = array($objControl, $strMethod);
        $this->btnAdd->Visible = $this->blnEnabled;
    }
    
    protected function SetChangedJs(){
        $objParentControl = $this->objParentControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if (is_null($objParentControl) || $objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }
        if($objParentControl instanceof EditPanelBase)
            QApplication::ExecuteJavaScript(sprintf('qc.EditPanel.listTableChange("%s","%s");', $objParentControl->ControlId, $this->ControlId));
    }
    
    public function btnAdd_Click() {
        $this->SetChangedJs();
        return call_user_func($this->arrOpenMethod);
    }

    protected $objConditionsArray = array();

    public function SetCondition(QQCondition $objCondition) {
        $this->ResetConditions();
        $this->AddCondition($objCondition);
    }

    public function AddCondition(QQCondition $objCondition) {
        //TODO optimizar
        $this->blnModified = true;
        array_push($this->objConditionsArray, $objCondition);
    }

    public function ResetConditions() {
        $this->blnModified = true;
        return $this->objConditionsArray = array();
    }
    
    public function GetDeleteButton($intKey) {
        $strDeleteButtonId = "{$this->strControlId}btnDelete{$intKey}";
        if (!$objButton = $this->Form->GetControl($strDeleteButtonId)) {
            $objButton = new QButton($this, $strDeleteButtonId);
            $objButton->AddCssClass('btn-xs btn-danger');
            $objButton->Icon = 'remove';
            $objButton->ToolTip = 'Quitar '.$this->strLabelForEste;
            $objButton->ActionParameter = $intKey;
            $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnDelete_Click"));
            
        }
        $objButton->Visible = $this->blnEnabled;
        return $objButton;
    }

    public function btnDelete_Click($strControlId, $strFormId, $intKey) {
        $objElement = $this->objChildsArray[$intKey];
        unset($this->objChildsArray[$intKey]);
        $strRemoveMethod = $this->strRemoveMethod;
        $this->objParent->$strRemoveMethod($objElement);
        $this->SetChangedJs();
        $this->MarkAsModified();
    }

    public function GetControlHtml() {
        $this->btnAdd->Visible = $this->blnEnabled;
        $intColumnas = count($this->Columns) + 1;
        $str = sprintf('<table id="%s_table" class="table table-striped table-bordered table-hover">', $this->ControlId);
        $str .= '<thead><tr>';
        foreach ($this->Columns as $strProperty => $strTitle) {
            $str .= "<th>$strTitle</th>";
        }
        $str .= '<th>Acciones</th></tr></thead><tbody>';
        $strRow = '<tr>%s<td class="qlistpanel-btn"><div class="clearfix">%s</div></td></tr>';
        foreach ($this->objChildsArray as $intKey => $objElement) { //por cada row
            $strElem = '';
            foreach ($this->Columns as $strProperty => $strTitle) { //por cada columna
                $strElem .= sprintf('<td>%s</td>',$objElement->$strProperty);
            }
            $str .= sprintf($strRow, $strElem, $this->GetDeleteButton($intKey)->Render(false));
        }
        if (count($this->objChildsArray) == 0) {
            $str .= sprintf('<tr><td class="center" colspan="%d">La lista se encuentra vacía</td></tr>', $intColumnas);
        }//si no hay registros
        $str .= sprintf('</tbody><tfoot><tr><td colspan="%d">%s</td></tr></tfoot></table>', $intColumnas, $this->btnAdd->Render(false));
        return $str;
    }
    
    public function RenderWithName($blnDisplayOutput = true) {
        if ($this->blnModified) $this->RefreshElements();
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
            $strErrorClass = ' class="has-error"';
        } else if ($this->strWarning) {
            $strErrorMessage = sprintf('<span class="help-block">%s</span>', $this->strWarning);
            $strErrorClass = ' class="has-warning"';
        } else
            $strErrorMessage = $strErrorClass = '';

        try {
            $strToReturn .= sprintf('<div%s>%s%s%s%s</div>', $strErrorClass, $this->strHtmlBefore, $this->GetControlHtml(), $this->strHtmlAfter, $strErrorMessage);
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
            case 'DataGrid':
                return $this->objDataGrid;
            case 'SelectedItems':
                $strPk = $this->strConfigArray['strPrimaryKeyProperty'];
                $intIdsArray = array();
                foreach ($this->objChildsArray as $objChild) {
                    $intIdsArray[] = $objChild->$strPk;
                }
                return $intIdsArray;
            case 'Conditions':
                switch (count($this->objConditionsArray)) {
                    case 0:
                        return QQ::All();
                    case 1:
                        return $this->objConditionsArray[0];
                    default:
                        return QQ::AndCondition($this->objConditionsArray);
                }
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
            case 'DataGrid':
                return $this->objDataGrid = $mixValue;
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
