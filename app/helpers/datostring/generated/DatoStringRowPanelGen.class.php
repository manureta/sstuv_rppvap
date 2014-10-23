<?php
/**
 * Description of DatoString
 *
 * @author jose
 */
class DatoStringRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDatoString;

        public function __construct($objParentObject, DatoString $objDatoString = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/datostring/DatoStringRowPanel.tpl.php';

            $this->objDatoString = $objDatoString;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDatoString->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>