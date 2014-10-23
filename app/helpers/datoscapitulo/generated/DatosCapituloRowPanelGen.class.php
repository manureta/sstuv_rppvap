<?php
/**
 * Description of DatosCapitulo
 *
 * @author jose
 */
class DatosCapituloRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDatosCapitulo;

        public function __construct($objParentObject, DatosCapitulo $objDatosCapitulo = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/datoscapitulo/DatosCapituloRowPanel.tpl.php';

            $this->objDatosCapitulo = $objDatosCapitulo;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDatosCapitulo->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>