<?php
/**
 * Description of Perfil
 *
 * @author jose
 */
class PerfilRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objPerfil;

        public function __construct($objParentObject, Perfil $objPerfil = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/perfil/PerfilRowPanel.tpl.php';

            $this->objPerfil = $objPerfil;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objPerfil->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>