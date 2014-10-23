<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_VIEWS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%=$objTable->ClassName%>EditPanel.tpl.php"/>
<?php
	// This is the HTML template include file (.tpl.php) for <%= QConvertNotation::UnderscoreFromCamelCase($objTable->ClassName) %>EditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
<% foreach ($objTable->ColumnArray as $objColumn) { %>
<%
if ($objColumn->PropertyName=="Datelastmod" || $objColumn->PropertyName=="Datecreated") {
%>
		<?php if ($_CONTROL->mct<%= $objTable->ClassName %>->EditMode) { ?>
<% } %>
		<?php $_CONTROL-><%= $objCodeGen->FormControlVariableNameForColumn($objColumn); %>->RenderWithName(); ?>
<%
if ($objColumn->PropertyName=="Datelastmod" || $objColumn->PropertyName=="Datecreated") {
%>
<?php } ?>
<% } %>
<% } %>
<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %>
<% if ($objReverseReference->Unique) { %>
		<?php $_CONTROL-><%= $objCodeGen->FormControlVariableNameForUniqueReverseReference($objReverseReference); %>->RenderWithName(); ?>

<% } %>
<% } %>
<% foreach ($objTable->ManyToManyReferenceArray as $objManyToManyReference) { %>
		<?php $_CONTROL-><%= $objCodeGen->FormControlVariableNameForManyToManyReference($objManyToManyReference); %>->RenderWithName(true, "Rows=7"); ?>

<% } %>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>