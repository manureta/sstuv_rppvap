<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_CONTROLLERS__ %>/<%= strtolower($objTable->ClassName) %>" TargetFileName="<%= $objTable->ClassName %>EditPanel.class.php"/>
<?php
class <%= $objTable->ClassName %>EditPanel extends <%= $objTable->ClassName %>EditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, <% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>$<%= $objColumn->VariableName; %> = null, <% } %>$strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , <% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>$<%= $objColumn->VariableName; %> , <% } %>$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>