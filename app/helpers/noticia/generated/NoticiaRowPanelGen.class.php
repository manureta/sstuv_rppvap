<?php
/**
 * Description of Noticia
 *
 * @author jose
 */
class NoticiaRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objNoticia;

        public function __construct($objParentObject, Noticia $objNoticia = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/noticia/NoticiaRowPanel.tpl.php';

            $this->objNoticia = $objNoticia;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objNoticia->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>