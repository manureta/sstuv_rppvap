<?php
/**
 * Description of MapaCuadros
 *
 * @author jose
 */
class MapaCuadrosRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objMapaCuadros;

        public function __construct($objParentObject, MapaCuadros $objMapaCuadros = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/mapacuadros/MapaCuadrosRowPanel.tpl.php';

            $this->objMapaCuadros = $objMapaCuadros;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objMapaCuadros->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>