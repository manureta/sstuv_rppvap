<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_CONTROLLERS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%= $objTable->ClassName %>EditPanelGen.class.php"/>
<?php
class <%= $objTable->ClassName %>EditPanelGen extends EditPanelBase {
    // Local instance of the <%= $objTable->ClassName %>MetaControl
    public $mct<%= $objTable->ClassName %>;

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

    public function __construct($objParentObject, $strControlsArray = array(), <% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>$<%= $objColumn->VariableName; %> = null, <% } %>$strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(<%= $objTable->ClassName %>EditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>
        $this-><%= $objColumn->VariableName; %> = $<%= $objColumn->VariableName; %>;
<% } %>
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(<%= $objTable->ClassName %>::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the <%= $objTable->ClassName %>MetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mct<%= $objTable->ClassName %> = <%= $objTable->ClassName %>MetaControl::Create($this<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>, $this-><%= $objColumn->VariableName; %><% } %>);

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
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (<%= $objTable->ClassName %>::GenderMale() ? 'e' : 'a'), <%= $objTable->ClassName %>::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mct<%= $objTable->ClassName %>->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the <%= $objTable->ClassName %>MetaControl
        $this->mct<%= $objTable->ClassName %>->Save();
<% if (count($objTable->ReverseReferenceArray)>0) { %>
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
<% } %>
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the <%= $objTable->ClassName %>MetaControl
        $this->mct<%= $objTable->ClassName %>->Delete<%= $objTable->ClassName %>();
        $this->btnCancel_Click();
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
            case 'Modal': 
                if (!isset($this->mdlPanel)) $this->mdlPanel_Create();
                return $this->mdlPanel;
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

}
?>
