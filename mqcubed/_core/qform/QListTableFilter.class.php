<?php

class QListTableFilter extends QPanel {

    public $btnAdd;
    public $objParent;
    public $chkAll;
    public $objParentObject;
    protected $dtgCondition;
    protected $blnDefaultChecked = false;
    protected $objDataGrid;
    protected $objChildArray = array();
    protected $strConfigArray = array();
    protected $arrNewMethod;
    protected $arrLoadMethod;
    protected $arrAddMethod;
    protected $objModalPanel;
    protected $strLabelForUn;
    protected $strLabelForEl;
    protected $strLabelForEste;

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
        $this->objParentObject = $objParentObject;
        $this->objParent = $objParent;
        
        $this->dtgCondition = QQ::All();
        
        $this->chkAll = new QCheckBox($this);
        $this->chkAll->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'chkAll_Change'));
        // Verifico el array de configuración
        $strDatosFaltantes = array_diff(array('strEntity', 'strRefreshProperty', 'strParentPrimaryKeyProperty', 'strPrimaryKeyProperty', 'strAddMethod', 'strRemoveMethod', 'strUniqueObject','strUniqueId', 'strUniqueEntity', 'strChildMetaControl', 'Columns', 'Controls'), array_keys($strConfigArray));
        if ($strDatosFaltantes)
            throw new QCallerException('Array de configuración mal formado. Faltan los siguientes datos: ' . print_r($strDatosFaltantes, true));
        $this->strConfigArray = $strConfigArray;

        $strEntity = $this->strEntity;
        $this->strLabelForUn = sprintf('un%s %s', ($strEntity::GenderMale() ? '' : 'a'), $strEntity::Noun());
        $this->strLabelForEl = sprintf('%s %s', ($strEntity::GenderMale() ? 'el' : 'la'), $strEntity::Noun());
        $this->strLabelForEste = sprintf('est%s %s', ($strEntity::GenderMale() ? 'e' : 'a'), $strEntity::Noun());
        $this->btnAdd = new QButton($this);
        $this->btnAdd->AddCssClass('btn-xs pull-right qcaddbutton');
        $this->btnAdd->Icon = 'plus';
        $this->btnAdd->Text = 'Agregar ' . $this->strLabelForUn;
        $this->btnAdd->ToolTip = 'Agregar ' . $this->strLabelForUn;
        $this->btnAdd->Visible = false;
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
    }
    
    public function SetChangedJs(){
        $objParentControl = $this->objParentControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if (is_null($objParentControl) || $objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }
        QApplication::ExecuteJavaScript(sprintf('qc.EditPanel.listTableChange("%s","%s");', $objParentControl->ControlId, $this->ControlId));
    }
    
    public function chkAll_Change($strControlId, $strFormId, $intKey) {
        foreach($this->objChildArray as $arr)
            $arr['chk']->Checked = $this->chkAll->Checked;
        $this->MarkAsModified();
    }
    
    public function chk_Change($strControlId, $strFormId, $intKey) {
        // por el momento no hago nada
        $this->MarkAsModified();
    }

    public function RefreshElements() {
        $strProperty = $this->strRefreshProperty;
        $strUniqueId = $this->strConfigArray['strUniqueId'];
        $arrChildsToRemove = $this->objChildArray; //Array de controles inicial (voy sacando del array los que siguen estando para evaluar los que no van más)
        $blnVacio = true;
        foreach ($this->objParent->$strProperty as $obj) {
            $blnVacio = false;
            unset($arrChildsToRemove[$obj->$strUniqueId]);
            if (array_key_exists($obj->$strUniqueId, $this->objChildArray)) continue;
            $this->objChildArray[$obj->$strUniqueId] = $this->SetControls($obj);
            $this->objChildArray[$obj->$strUniqueId]['chk']->Checked = true;
        }
        
        foreach ($this->Load() as $obj) {
            unset($arrChildsToRemove[$obj->$strUniqueId]);
            if (array_key_exists($obj->$strUniqueId, $this->objChildArray)) continue;
            $this->objChildArray[$obj->$strUniqueId] = $this->SetControls($obj);
            if($blnVacio)
                $this->objChildArray[$obj->$strUniqueId]['chk']->Checked = false;
        }
        foreach (array_keys($arrChildsToRemove) as $strKey)
            unset($this->objChildArray[$strKey]);
    }      

    protected function Load(){
        return call_user_func($this->arrLoadMethod, $this->Conditions);
    }
    
    protected function SetControls($obj) {
        $strMct = $this->strConfigArray['strChildMetaControl'];

        $mct = new $strMct($this, $obj);
        $chk = new QCheckBox($this);
        $chk->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'chk_Change'));
        $strPK = $this->strConfigArray['strPrimaryKeyProperty'];
        $chk->ActionParameter = $obj->$strPK;
        $chk->Checked = $this->blnDefaultChecked;

        $arrControls = array();
        foreach (array_keys($this->Columns) as $strProperty) {
            if($this->strConfigArray['strUniqueObject'] == $strProperty) continue;
            $strCreateMethod = $this->strConfigArray['Controls'][$strProperty];
            $arrControls[$strProperty] = $mct->$strCreateMethod();
            $arrControls[$strProperty]->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'SetChangedJs'));
        }
        return array('chk' => $chk, 'mct' => $mct, 'controls' => $arrControls);
    }


    public function MarkAsModified() {
        parent::MarkAsModified();
        $this->RefreshElements();
        $this->SetChangedJs();
    }

    public function SetNewMethod($objControl, $strMethod) {
        $this->arrNewMethod = array($objControl, $strMethod);
        $this->btnAdd->Visible = true;
    }

    public function btnAdd_Click() {
        $strParentPK = $this->strParentPrimaryKeyProperty;
        return call_user_func($this->arrNewMethod, $this->objParent->$strParentPK);
    }
    
    public function SetLoadMethod($objControl, $strMethod) {
        $this->arrLoadMethod = array($objControl, $strMethod);
    }
    
    public function SetAddMethod($obj, $strMethod){
        $this->arrAddMethod = array($obj, $strMethod);
    }
    
    public function GetControlHtml() {
        $this->RefreshElements();
        $strObj = 'obj' . $this->strConfigArray['strEntity'];
        $this->btnAdd->Visible = $this->blnEnabled;
        $intColumnas = count($this->Columns) + 1;
        $str = sprintf('<table id="%s" class="table table-striped table-bordered table-hover">', $this->ControlId);
        $str .= '<thead><tr>';
        $str .= sprintf('<th>%s</th>', $this->chkAll->Render(false));
        foreach ($this->Columns as $strProperty => $strTitle) {
            $str .= "<th>$strTitle</th>";
        }
        $str .= '</tr></thead><tbody>';
        $strRow = '<tr><td>%s</td>%s</tr>';
        foreach ($this->objChildArray as $strKey => $obj) { //por cada row 
            $strElem = '';
            foreach ($this->Columns as $strProperty => $strTitle) { //por cada columna
                $strCol = ($obj['chk']->Checked && $this->strConfigArray['strUniqueObject'] != $strProperty) ? $obj['controls'][$strProperty]->Render(false) : $obj['mct']->$strObj->$strProperty;
                $strElem .= sprintf('<td>%s</td>', $strCol);
            }
            $str .= sprintf($strRow, $obj['chk']->Render(false), $strElem);
        }
        if (count($this->objChildArray) == 0) {
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
    
    protected $objConditionsArray = array();

    public function SetCondition(QQCondition $objCondition) {
        $this->ResetConditions();
        $this->AddCondition($objCondition);
        $this->RefreshElements();
    }
    
    public function SetDataGridCondition(QQCondition $objCondition){
        $this->dtgCondition = $objCondition;               
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
    
    public function AddChild($obj){
        $strAddMethod = $this->strConfigArray['strAddMethod'];
        $this->objParent->$strAddMethod($obj);
        $this->RefreshElements();
        if(method_exists($this->arrAddMethod[0], $this->arrAddMethod[1]))
            call_user_func($this->arrAddMethod);
        $this->SetChangedJs();
    }

    public function __get($strName) {
        if (array_key_exists($strName, $this->strConfigArray)) {
            return $this->strConfigArray[$strName];
        }
        switch ($strName) {
            case 'DataGridCondition':
                return $this->dtgCondition;
            case 'DefaultChecked':
                return $this->blnDefaultChecked;
            case 'SelectedItems':
                $strObj = 'obj' . $this->strConfigArray['strEntity'];
                $strId = $this->strConfigArray['strUniqueId'];
                $intIdsArray = array();
                foreach ($this->objChildArray as $objChild) {
                    $intIdsArray[] = $objChild['mct']->$strObj->$strId;
                }
                return $intIdsArray;
            case 'DataGrid':
                return $this->objDataGrid;
            case 'Childs':
                return $this->objChildArray;
            case 'ModalPanel':
                return $this->objModalPanel;
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
            case 'DefaultChecked':
                $this->blnDefaultChecked = (bool) $mixValue;
            case 'DataGrid':
                return $this->objDataGrid = $mixValue;
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
    
    public function Save(){
        $strObj = 'obj' . $this->strConfigArray['strEntity'];
        $strPK = $this->strConfigArray['strPrimaryKeyProperty'];
        foreach($this->objChildArray as $obj){
            if($obj['chk']->Checked)
                $obj['mct']->Save();
            else{
                if($obj['mct']->$strObj->$strPK){
                    $strRemoveMethod = $this->strConfigArray['strRemoveMethod'];
                    $this->objParent->$strRemoveMethod($obj['mct']->$strObj);
                    $obj['mct']->$strObj->Delete();
                    $obj['mct']->Save();
                }
            }
        }
    }

}
