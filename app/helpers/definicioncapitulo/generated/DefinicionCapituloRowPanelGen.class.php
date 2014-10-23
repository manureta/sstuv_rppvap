<?php
/**
 * Description of DefinicionCapitulo
 *
 * @author jose
 */
class DefinicionCapituloRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDefinicionCapitulo;

        public function __construct($objParentObject, DefinicionCapitulo $objDefinicionCapitulo = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/definicioncapitulo/DefinicionCapituloRowPanel.tpl.php';

            $this->objDefinicionCapitulo = $objDefinicionCapitulo;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDefinicionCapitulo->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>