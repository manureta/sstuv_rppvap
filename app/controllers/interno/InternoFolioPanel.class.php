<?php
/**
 * Este es un panel índice que hereda de NomenclaturaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class InternoFolioPanel extends UsoInternoEditPanel {

    public $strTitulo = 'Uso interno';
    protected $obj;
    

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
        
        try {
           $this->obj=UsoInterno::QuerySingle(QQ::Equal(QQN::UsoInterno()->IdFolio,QApplication::QueryString("id")));
            parent::__construct($objParentObject, $strControlsArray,$this->obj->IdFolio);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        

    }

 
}
?>