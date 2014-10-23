<?php
/**
 * Description of Usuario
 *
 * @author jose
 */
class UsuarioRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objUsuario;

        public function __construct($objParentObject, Usuario $objUsuario = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/usuario/UsuarioRowPanel.tpl.php';

            $this->objUsuario = $objUsuario;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objUsuario->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>