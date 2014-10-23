<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __DATA_CLASSES__ %>" TargetFileName="<%= $objTable->ClassName %>.class.php"/>
<?php
require(__DATAGEN_CLASSES__ . '/<%= $objTable->ClassName %>Gen.class.php');

class <%= $objTable->ClassName %> extends <%= $objTable->ClassName %>Gen {
    protected $strNoun = '<%= $objTable->ClassName %>';
    protected $strNounPlural = '<%= $objTable->ClassNamePlural %>';
    protected $blnGenderMale = true;

    public function __toString() {
<% foreach ($objTable->ColumnArray as $objColumn) { %>
    <% if ($objColumn->PropertyName == 'Descripcion') { %>
        return $this-><%= $objColumn->VariableName %>;
    <% } %>
<% } %>
        return sprintf('<%= $objTable->ClassName %> <% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>%s - <% } %><%---%>', <% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %> $this-><%= $objColumn->VariableName %>, <% } %><%--%>);
    }

}
?>