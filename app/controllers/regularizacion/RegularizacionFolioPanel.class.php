<?php
/**
 * Este es un panel índice que hereda de NomenclaturaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class RegularizacionFolioPanel extends RegularizacionEditPanel {

    public $strTitulo = 'Regularizacion';
    public $strSubtitulo = '';
    public $strTrmplate;
    public $objFolio;
    protected $objRegularizacion;
    //protected $pnlEditRegularizacion;
    

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(RegularizacionEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            $this->objRegularizacion=Regularizacion::QuerySingle(QQ::Equal(QQN::Regularizacion()->IdFolio,QApplication::QueryString("id")));
            parent::__construct($objParentObject, $strControlsArray,$this->objRegularizacion->Id);
            $this->strTemplate=__VIEW_DIR__."/regularizacion/RegularizacionFolioPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        

    }
}
?>