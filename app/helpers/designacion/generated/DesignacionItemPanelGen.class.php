<?php
/**
 * Description of DesignacionItemPanelGen class
 *
 * @author jose
 */
class DesignacionItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDesignacionView;


    public $blnExpand = false;

    /**
     *
     * @var Designacion
     */
    protected $objDesignacion;

    public function __construct($objParentObject, Designacion $objDesignacion = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDesignacion = $objDesignacion;


            $this->strTemplate = __VIEW_DIR__.'/designacion/DesignacionItemPanel.tpl.php';
            $this->pnlDesignacionView = $this->createViewPanel();


            $this->pnlRow = new DesignacionRowPanel($this, $objDesignacion);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDesignacionView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDesignacionView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DesignacionViewresumenPanel($this, null, $this->objDesignacion->IdDesignacion);
    }
}
?>
