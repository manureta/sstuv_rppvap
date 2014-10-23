<?php
/**
 * Description of SistemaVersion
 *
 * @author jose
 */
class SistemaVersionRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objSistemaVersion;

        public function __construct($objParentObject, SistemaVersion $objSistemaVersion = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/sistemaversion/SistemaVersionRowPanel.tpl.php';

            $this->objSistemaVersion = $objSistemaVersion;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objSistemaVersion->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>