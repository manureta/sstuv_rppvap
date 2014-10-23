<?php
/**
 * Description of DefinicionCelda
 *
 * @author jose
 */
class DefinicionCeldaRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDefinicionCelda;

        public function __construct($objParentObject, DefinicionCelda $objDefinicionCelda = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/definicioncelda/DefinicionCeldaRowPanel.tpl.php';

            $this->objDefinicionCelda = $objDefinicionCelda;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDefinicionCelda->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>