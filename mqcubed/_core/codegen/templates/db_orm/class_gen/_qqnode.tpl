<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __DATAGEN_CLASSES__ %>" TargetFileName="QQNode<%= $objTable->ClassName%>.class.php"/>
<?php
class QQNode<%= $objTable->ClassName %> extends QQNode {
		protected $strTableName = '<%= $objTable->Name %>';
		protected $strPrimaryKey = '<%= $objTable->PrimaryKeyColumnArray[0]->Name %>';
		protected $strClassName = '<%= $objTable->ClassName %>';
		public function __get($strName) {
			switch ($strName) {
<% foreach ($objTable->ColumnArray as $objColumn) { %>
				case '<%= $objColumn->PropertyName %>':
					return new QQNode('<%= $objColumn->Name %>', '<%= $objColumn->PropertyName %>', '<%= $objColumn->VariableType %>', $this);
	<% if (($objColumn->Reference) && (!$objColumn->Reference->IsType)) { %>
				case '<%= $objColumn->Reference->PropertyName %>':
					return new QQNode<%= $objColumn->Reference->VariableType; %>('<%= $objColumn->Name %>', '<%= $objColumn->Reference->PropertyName %>', '<%= $objColumn->VariableType %>', $this);
	<% } %>
<% } %>
<% foreach ($objTable->ManyToManyReferenceArray as $objReference) { %>
				case '<%= $objReference->ObjectDescription %>':
					return new QQNode<%= $objTable->ClassName %><%= $objReference->ObjectDescription %>($this);
<% } %><% foreach ($objTable->ReverseReferenceArray as $objReference) { %>
				case '<%= $objReference->ObjectDescription %>':
					return new QQReverseReferenceNode<%= $objReference->VariableType %>($this, '<%= strtolower($objReference->ObjectDescription); %>', 'reverse_reference', '<%= $objReference->Column %>'<%= ($objReference->Unique) ? ", '" . $objReference->ObjectDescription . "'" : null; %>);
<% } %><% $objPkColumn = $objTable->PrimaryKeyColumnArray[0]; %>
				case '_PrimaryKeyNode':
					return new QQNode<% if (($objPkColumn->Reference) && (!$objPkColumn->Reference->IsType)) return $objPkColumn->Reference->VariableType; %>('<%= $objPkColumn->Name %>', '<%= $objPkColumn->PropertyName %>', '<%= $objPkColumn->VariableType %>', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>