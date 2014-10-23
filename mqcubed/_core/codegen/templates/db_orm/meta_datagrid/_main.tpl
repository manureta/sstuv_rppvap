<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __DATAGEN_META_CONTROLS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%= $objTable->ClassName %>DataGridGen.class.php"/>
<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the <%= $objTable->ClassName %> class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of <%= $objTable->ClassName %> objects.  It includes
 * functionality to perform pagination and sorting on columns.
 *
 * To take advantage of some (or all) of these control objects, you
 * must create an instance of this DataGrid in a QForm or QPanel.
 *
 * Any and all changes to this file will be overwritten with any subsequent re-
 * code generation.
 *
 * @package <%= QCodeGen::$ApplicationName; %>
 * @subpackage MetaControls
 *
 */
class <%= $objTable->ClassName %>DataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
<% foreach ($objTable->ColumnArray as $objColumn) { %>
<% if (!$objColumn->Reference || $objColumn->Reference->IsType) { %>
        '<%= $objColumn->PropertyName %>' => <% if (!$objColumn->Identity) { %>true<% } %><% if ($objColumn->Identity) { %>false<% } %>,
<% } %>
<% if ($objColumn->Reference && !$objColumn->Reference->IsType) { %>
        '<%= $objColumn->Reference->PropertyName %>' => true,
<% } %><% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %><% if ($objReverseReference->Unique) { %>
        '<%= $objReverseReference->ObjectDescription %>' => true,
<% } %><% } %>
<% } %>
    );
    
<%@ constructor('objTable'); %>

<%@ meta_all_column('objTable'); %>

<%@ meta_add_edit_column('objTable'); %>

<%@ meta_data_binder('objTable'); %>

<%@ resolve_content_item('objTable'); %>

    public static function SetValor($strColumnName, $mixValue) {
        <%= $objTable->ClassName %>DataGrid::$strColumnsArray[$strColumnName] = false;
        <%= $objTable->ClassName %>DataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::<%= $objTable->ClassName %>()->$strColumnName, $mixValue);
    }


}
?>