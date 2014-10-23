<?php
/**
 * Description of Cuadro
 *
 * @author jose
 */
class CuadroRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objCuadro;

        public function __construct($objParentObject, Cuadro $objCuadro = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/cuadro/CuadroRowPanel.tpl.php';

            $this->objCuadro = $objCuadro;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objCuadro->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>