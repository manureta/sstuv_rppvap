<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_CONTROLLERS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%= $objTable->ClassName %>IndexPanelGen.class.php"/>
<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de <%= $objTable->ClassNamePlural %>
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class <%= $objTable->ClassName %>IndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar <%= $objTable->ClassNamePlural %>
    public $dtg<%= $objTable->ClassNamePlural %>;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEdit<%= $objTable->ClassName %>;

    // Redefinicion de visibilidad de columnas y controles
    protected $strColumnsArray;
    protected $strControlsArray;    

    
    /**
     * Constructor del panel índice generado
     * 
     * @param <Panel> $objParentObject
     * @param <array> $strColumnsArray
     * @param <array> $strControlsArray
     * @param <string> $strControlId
     *
     */
    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
            $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : <%= $objTable->ClassName %>::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? <%= $objTable->ClassName %>DataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(<%= $objTable->ClassName %>EditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtg<%= $objTable->ClassName %>_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEdit<%= $objTable->ClassName %>)) {
            $this->Form->RemoveControl($this->pnlEdit<%= $objTable->ClassName %>->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', <%= $objTable->ClassName %>::GenderMale() ? '':'a', <%= $objTable->ClassName %>::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtg<%= $objTable->ClassName %>_Create() {            
        $this->dtg<%= $objTable->ClassNamePlural %> = new <%= $objTable->ClassName %>DataGrid($this, $this->strColumnsArray);
        $this->dtg<%= $objTable->ClassNamePlural %>->RowClickMethod = 'dtgRow_Click';
        return $this->dtg<%= $objTable->ClassNamePlural %>;
    }

    public function <%= $objTable->ClassName %>EditPanel_Create($<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %><%= $objColumn->VariableName; %><% } %> = null) {
        if (isset($this->pnlEdit<%= $objTable->ClassName %>))
            $this->Form->RemoveControl($this->pnlEdit<%= $objTable->ClassName %>->ControlId);
        return $this->pnlEdit<%= $objTable->ClassName %> = new <%= $objTable->ClassName %>EditPanel($this, $this->strControlsArray, $<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %><%= $objColumn->VariableName; %><% } %>);
    }
    
    public function dtgRow_Click(<%= $objTable->ClassName %> $obj<%= $objTable->ClassName %>) {
        $this-><%= $objTable->ClassName %>EditPanel_Create($obj<%= $objTable->ClassName %>-><% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %><%= $objColumn->PropertyName; %><% } %>);
        $this->dtg<%= $objTable->ClassNamePlural %>->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this-><%= $objTable->ClassName %>EditPanel_Create();
        $this->dtg<%= $objTable->ClassNamePlural %>->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtg<%= $objTable->ClassNamePlural %>;
            case 'EditPanel': return $this->pnlEdit<%= $objTable->ClassName %>;
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
