<?php
/**
 * Description of DatoInteger
 *
 * @author jose
 */
class DatoIntegerRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDatoInteger;

        public function __construct($objParentObject, DatoInteger $objDatoInteger = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/datointeger/DatoIntegerRowPanel.tpl.php';

            $this->objDatoInteger = $objDatoInteger;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDatoInteger->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>