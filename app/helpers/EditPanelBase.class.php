<?php

class EditPanelBase extends QPanel {
    protected $strJavaScripts = '_core/editpanel.js';

    // Buttons
    public $pnlButtons;
    public $btnSave;
    public $btnCancel;
    public $btnDelete;

    // Tabs
    public $pnlTabs;

    // Ventana Modal (para Crear o Editar Listas Reversas)
    protected $mdlPanel;
    
    // Controles
    protected $objControlsArray = array();

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
    
    public function RemoveCustomControl(QControl $objControl, $objMetaControl = null) {
        $this->blnModified = true;
        foreach ($this->objControlsArray as $strControlName => $objControlAux) {
            if ($objControl === $objControlAux) {
                //$objControl->objParentControl = null;
                unset($this->objControlsArray[$strControlName]);
                if ($objMetaControl)
                    $objMetaControl->UnsetControl($strControlName);
                $this->objForm->RemoveControl($objControl->ControlId);
                break;
            }
        }        
        //$objControl->objParentControl->RemoveChildControl($objControl->ControlId, true);
    }
    
    protected function buttons_Create($blnDelete = true) {
        $this->pnlButtons = new QPanel($this);
        $this->pnlButtons->AddCssClass('botones-form');
        $this->pnlButtons->AutoRenderChildren = true;

        // Create Buttons and Actions on this Form
        $this->btnSave = new QSaveButton($this->pnlButtons, $this, 'btnSave_Click');
        $this->btnCancel = new QCancelButton($this->pnlButtons, $this, 'btnCancel_Click');
        if ($blnDelete) {
            $this->btnDelete = new QButton($this->pnlButtons);
            $this->btnDelete->Text = 'Borrar';
            $this->btnDelete->AddCssClass('btn-danger');
            $this->btnDelete->Icon = 'trash';
        }
    }
    
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        QApplication::ExecuteJavaScript(sprintf('qcodo.EditPanel.ResetButtons("%s");', $this->ControlId));
    }
    
    public function btnCancel_Click() {
        try {
            if ($this->Form->pnlAppController->DataGrid)
                $this->Form->pnlAppController->DataGrid->Visible = true;
        } catch (Exception $e) {}
        try {
            if ($this->Form->pnlAppController->EditPanel) {
                $this->Form->pnlAppController->EditPanel->RemoveChildControls(true);
                $this->Form->RemoveControl($this->Form->pnlAppController->EditPanel->ControlId);
            }
        } catch (Exception $e) {}
        if (isset($this->Form->pnlAppController->btnCreateNew))
            $this->Form->pnlAppController->btnCreateNew->Visible = true;
        if (isset($this->Form->pnlAppController->btnVolver)) 
            $this->Form->pnlAppController->btnVolver->Visible = true;
        $this->Form->pnlAppController->Refresh();
    }
    
    // Controles y lógica para el trabajo con Referencias
    public function mdlPanel_Create(){
        $this->mdlPanel = new QDialogBox($this);
        $this->mdlPanel->RemoveChildsOnHide = true;
    }
    
    //Referencias Inversas (entidades débiles que dependen de Alumno)

    protected $objModifiedChildsArray = array();

    public function AddModifiedChild($obj) {
        if (!in_array($obj, $this->objModifiedChildsArray))
            $this->objModifiedChildsArray[] = $obj;
    }

    public function ValidateControlAndChildren() {
        // Initially Assume Validation is True
        $blnToReturn = true;

        foreach ($this->GetChildControls() as $objChildControl) {
            // Only Enabled and Visible and Rendered controls should be validated
            if (($objChildControl->Visible) && ($objChildControl->Enabled) && 
                    ($objChildControl->RenderMethod) && ($objChildControl->OnPage)) {
                if (!$this->Form->ValidateControlAndChildren($objChildControl)) {
                    if (!isset($objPrimerControlConError)) $objPrimerControlConError = $objChildControl;
                    $blnToReturn = false;
                }
            }
        }
        if (!$blnToReturn) {
            QApplication::ExecuteJavaScript('qcodo.EditPanel.GoToFirstErrorTab()');
            QApplication::DisplayNotification("Se produjeron errores de validación.\nPor favor revise los errores e inténtelo nuevamente.", 'W');
        }
        return $blnToReturn;
    }

    /**
     * Los EditPanel trabajan la validación ocupándose de validar su código
     * propio y el de sus childs.
     * Se define como FINAL para evitar sobrecargar Validate.
     * El método que se debe sobrecargar es ValidateControlAndChildren.
     * @return boolean
     */
    final public function Validate() {
        return $this->ValidateControlAndChildren();
    }
    
    public function GetEndScript() {
        return parent::GetEndScript() . sprintf('qcodo.EditPanel.Init("%s");', $this->ControlId);
    }
}

