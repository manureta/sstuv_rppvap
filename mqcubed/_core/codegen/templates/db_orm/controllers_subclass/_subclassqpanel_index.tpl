<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_CONTROLLERS__ %>/<%= strtolower($objTable->ClassName) %>" TargetFileName="<%= $objTable->ClassName %>IndexPanel.class.php"/>
<?php
/**
 * Este es un panel índice que hereda de <%= $objTable->ClassName %>IndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class <%= $objTable->ClassName %>IndexPanel extends <%= $objTable->ClassName %>IndexPanelGen {

    public $strTitulo = '<%= $objTable->ClassName %>';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                '<%= $objTable->ClassName %>'
            );
    }

}
?>