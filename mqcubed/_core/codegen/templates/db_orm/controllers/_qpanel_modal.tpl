<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_CONTROLLERS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%= $objTable->ClassName %>ModalPanelGen.class.php"/>
<?php
class <%= $objTable->ClassName %>ModalPanelGen extends EditPanelBase {

    public $mct<%= $objTable->ClassName %>;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>
    protected $<%= $objColumn->VariableName; %>;
<% } %>

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
<% foreach ($objTable->ColumnArray as $objColumn) { %>
        '<%= $objCodeGen->FormControlVariableNameForColumn($objColumn); %>' => <% if (!$objColumn->Identity) { %>true<% } %><% if ($objColumn->Identity) { %>false<% } %>,
<% } %>
<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %>
<% if ($objReverseReference->Unique) { %>
        '<%= $objCodeGen->FormControlVariableNameForUniqueReverseReference($objReverseReference); %>' => true,
<% } %>
<% } %>
<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %>
<% if (!$objReverseReference->Unique) { %>
        'lst<%= $objReverseReference->ObjectDescription %>' => false,
<% } %>
<% } %>
<% foreach ($objTable->ManyToManyReferenceArray as $objManyToManyReference) { %>
        '<%= $objCodeGen->FormControlVariableNameForManyToManyReference($objManyToManyReference); %>' => false,
<% } %>
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $obj<%= $objTable->ClassName %> = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(<%= $objTable->ClassName %>ModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$obj<%= $objTable->ClassName %>)
            $obj<%= $objTable->ClassName %> = new <%= $objTable->ClassName %>();
        
<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>
        $this-><%= $objColumn->VariableName; %> = $obj<%= $objTable->ClassName %>-><%= $objColumn->PropertyName; %>;
<% } %>
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(<%= $objTable->ClassName %>::Noun());
        $this->metaControl_Create($strControlsArray, $obj<%= $objTable->ClassName %>);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $obj<%= $objTable->ClassName %>){

        $this->mct<%= $objTable->ClassName %> = new <%= $objTable->ClassName %>MetaControl($this, $obj<%= $objTable->ClassName %>);

        // Call MetaControl's methods to create qcontrols based on <%= $objTable->ClassName %>'s data fields
<% foreach ($objTable->ColumnArray as $objColumn) { %>
        if (in_array('<%= $objCodeGen->FormControlVariableNameForColumn($objColumn); %>',$strControlsArray)) 
            $this->objControlsArray['<%= $objCodeGen->FormControlVariableNameForColumn($objColumn); %>'] = $this->mct<%= $objTable->ClassName %>-><%= $objCodeGen->FormControlVariableNameForColumn($objColumn); %>_Create();
<% } %>
<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %>
<% if ($objReverseReference->Unique) { %>
        if (in_array('<%= $objCodeGen->FormControlVariableNameForUniqueReverseReference($objReverseReference); %>',$strControlsArray)) 
            $this->objControlsArray['<%= $objCodeGen->FormControlVariableNameForUniqueReverseReference($objReverseReference); %>'] = $this->mct<%= $objTable->ClassName %>-><%= $objCodeGen->FormControlVariableNameForUniqueReverseReference($objReverseReference); %>_Create();
<% } %>
<% } %>
<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %>
<% if (!$objReverseReference->Unique) { %>
        if (in_array('lst<%= $objReverseReference->ObjectDescription %>',$strControlsArray))
            $this->objControlsArray['lst<%= $objReverseReference->ObjectDescription %>'] = $this->mct<%= $objTable->ClassName %>->lst<%= $objReverseReference->ObjectDescription %>_Create();
<% } %>
<% } %>
<% foreach ($objTable->ManyToManyReferenceArray as $objManyToManyReference) { %>
        if (in_array('<%= $objCodeGen->FormControlVariableNameForManyToManyReference($objManyToManyReference); %>',$strControlsArray)) 
            $this->objControlsArray['<%= $objCodeGen->FormControlVariableNameForManyToManyReference($objManyToManyReference); %>'] = $this->mct<%= $objTable->ClassName %>-><%= $objCodeGen->FormControlVariableNameForManyToManyReference($objManyToManyReference); %>_Create();
<% } %>

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mct<%= $objTable->ClassName %>->obj<%= $objTable->ClassName %>->__Restored)
            $this->objParentControl->objParentControl->lst<%= $objTable->ClassName %>AsId->objParent->Add<%= $objTable->ClassName %>AsId($this->mct<%= $objTable->ClassName %>->obj<%= $objTable->ClassName %>);
        $this->mct<%= $objTable->ClassName %>->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mct<%= $objTable->ClassName %>->obj<%= $objTable->ClassName %>);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mct<%= $objTable->ClassName %> = null;
        $this->blnChangesMade = false;
        $this->objParentControl->HideDialogBox();
    }
    
    // Close Myself and Call ClosePanelMethod Callback
    public function Close() {
        $objParentControl = $this->objParentControl;
        if (!$objParentControl)
            throw new QCallerException('Error llamando al metodo Close de un ModalPanel huerfano');
        while (!$objParentControl instanceof EditPanelBase) {
            if (is_null($objParentControl) ||
                $objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }
        QApplication::ExecuteJavaScript(sprintf('qcodo.EditPanel.ModalClose("%s", "%s", %d);', 
                $this->objCallerControl->ControlId, $objParentControl->ControlId, ($this->blnChangesMade ? 1 : 0)));
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
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
        $this->blnModified = true;
        if (is_array($this->objControlsArray) &&
                $mixValue instanceof QControl) { //solo dejo agregar controles
            return $this->objControlsArray[$strName] = $mixValue;
        }
        try {
            parent::__set($strName, $mixValue);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }
    
     public function GetEndScript() {
        return parent::GetEndScript() . sprintf('$("#%s").attr("onclick","%s");', $this->objParentControl->btnClose->ControlId, sprintf("$('#%s').click();", $this->btnCancel->ControlId));
    }

}
?>
