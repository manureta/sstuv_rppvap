<?php
/**
 * Description of DefinicionFila
 *
 * @author jose
 */
class DefinicionFilaRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDefinicionFila;

        public function __construct($objParentObject, DefinicionFila $objDefinicionFila = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/definicionfila/DefinicionFilaRowPanel.tpl.php';

            $this->objDefinicionFila = $objDefinicionFila;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDefinicionFila->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>