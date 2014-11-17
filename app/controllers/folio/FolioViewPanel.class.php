<?php
/**
 * Este es un panel índice que hereda de NomenclaturaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class FolioViewPanel extends FolioEditPanel{

    public $strTitulo = 'Folio';
    public $strSubtitulo = '';

   

    public static $strControlsArray = array(
        'lblId' => false,
        'txtCodFolio' => true,
        'lstIdPartidoObject' => true,
        'lstIdLocalidadObject' => true,
        'txtMatricula' => true,
        'calFecha' => false,
        'txtEncargado' => true,
        'txtNombreBarrioOficial' => true,
        'txtNombreBarrioAlternativo1' => true,
        'txtNombreBarrioAlternativo2' => true,
        'txtAnioOrigen' => true,
        'txtSuperficie' => true,
        'txtCantidadFamilias' => true,
        'lstTipoBarrioObject' => true,
        'txtObservacionCasoDudoso' => true,
        'txtJudicializado' => true,
        'txtDireccion' => true,
        'txtNumExpedientes' => true,
        'lstCondicionesSocioUrbanisticasAsId' => false,
        'lstRegularizacionAsId' => false,
        'lstUsoInterno' => false,
        'lstNomenclaturaAsId' => false,
    );

    
    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(FolioEditPanel::$strControlsArray, true) : $strControlsArray;
        
        // Call the Parent
        try {
           
            parent::__construct($objParentObject,$strControlsArray = array(),QApplication::QueryString("id"), $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
       
    
       

    }

   

}
?>