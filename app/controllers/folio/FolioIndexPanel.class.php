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
           // $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Folio::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? FolioDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(FolioEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgFolio_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditFolio)) {
            $this->Form->RemoveControl($this->pnlEditFolio->ControlId);
        }

        
    }


    protected function dtgFolio_Create() {            
        $this->dtgFolios = new FolioDataGrid($this);
        $this->dtgFolios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgFolios;
    }
}
?>