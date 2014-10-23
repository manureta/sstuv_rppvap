<?php
/**
 * Description of TipoDatoValor
 *
 * @author jose
 */
class TipoDatoValorRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objTipoDatoValor;

        public function __construct($objParentObject, TipoDatoValor $objTipoDatoValor = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/tipodatovalor/TipoDatoValorRowPanel.tpl.php';

            $this->objTipoDatoValor = $objTipoDatoValor;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objTipoDatoValor->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>