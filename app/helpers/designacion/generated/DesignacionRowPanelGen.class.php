<?php
/**
 * Description of Designacion
 *
 * @author jose
 */
class DesignacionRowPanelGen extends QPanel{

        public $lblBrief;

        protected $objDesignacion;

        public function __construct($objParentObject, Designacion $objDesignacion = null, $strControlId = null) {
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }

            $this->strTemplate = __VIEW_DIR__.'/designacion/DesignacionRowPanel.tpl.php';

            $this->objDesignacion = $objDesignacion;
            $this->lblBrief = new QLabel($this);
            $this->lblBrief->Text = sprintf('%s',$objDesignacion->__toString());//,$objUnidadServicio->CJornadaObject,$objUnidadServicio->CEstadoObject,$objUnidadServicio->CSubvencionObject);
            //$this->lblBrief->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'expand_click'));


        }
}
?>