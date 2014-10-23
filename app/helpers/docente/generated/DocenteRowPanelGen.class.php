<?php
/**
 * Description of Docente
 *
 * @author jose
 */
class DocenteRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDocente;

        public function __construct($objParentObject, Docente $objDocente = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/docente/DocenteRowPanel.tpl.php';

            $this->objDocente = $objDocente;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDocente->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>