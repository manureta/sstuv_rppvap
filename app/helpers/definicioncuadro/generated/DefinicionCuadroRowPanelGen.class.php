<?php
/**
 * Description of DefinicionCuadro
 *
 * @author jose
 */
class DefinicionCuadroRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDefinicionCuadro;

        public function __construct($objParentObject, DefinicionCuadro $objDefinicionCuadro = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/definicioncuadro/DefinicionCuadroRowPanel.tpl.php';

            $this->objDefinicionCuadro = $objDefinicionCuadro;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDefinicionCuadro->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>