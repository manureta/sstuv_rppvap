<?php
/**
 * Description of DefcuadroDefcolumna
 *
 * @author jose
 */
class DefcuadroDefcolumnaRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDefcuadroDefcolumna;

        public function __construct($objParentObject, DefcuadroDefcolumna $objDefcuadroDefcolumna = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/defcuadrodefcolumna/DefcuadroDefcolumnaRowPanel.tpl.php';

            $this->objDefcuadroDefcolumna = $objDefcuadroDefcolumna;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDefcuadroDefcolumna->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>