<?php
/**
 * Este es un panel índice que hereda de FolioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class FolioIndexPanel extends FolioIndexPanelGen {

      public $lblTitulo;

    // Instancia local de un DataGrid para listar Folios
    public $dtgFolios;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditFolio;

    // Redefinicion de visibilidad de columnas y controles
    protected $strColumnsArray;
    protected $strControlsArray;    
    public $strTemplate;

    
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
        
        $this->strTemplate=__VIEW_DIR__."/folio/FolioIndexPanel.tpl.php";

        
        $this->lblTitulo->Visible=false;
        
        $this->strColumnsArray = is_null($strColumnsArray) ? FolioDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(FolioEditPanel::$strControlsArray, true) : $strControlsArray;

        if(!Permission::EsAdministrador()){
            $this->dtgFolios->AddCondition(QQ::NotEqual(QQN::Folio()->UsoInterno->EstadoFolio,EstadoFolio::NO_CORRESPONDE));    
        }
        
        if (isset($this->pnlEditFolio)) {
            $this->Form->RemoveControl($this->pnlEditFolio->ControlId);
        }
        if(Permission::EsVisualizador() || (Permission::EsUsoInterno() && !Permission::EsAdministrador())) {
            $this->btnCreateNew->Enabled = false;
        }

        $this->dtgFolios->ShowFilter = true;

    }


    protected function dtgFolio_Create() {            
        $this->dtgFolios = new FolioDataGrid($this);
        //$this->dtgFolios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgFolios;
    }

}
?>
