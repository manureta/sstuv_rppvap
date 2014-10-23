<?php
/**
 * Description of Dato
 *
 * @author jose
 */
class DatoRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDato;

        public function __construct($objParentObject, Dato $objDato = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/dato/DatoRowPanel.tpl.php';

            $this->objDato = $objDato;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDato->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>