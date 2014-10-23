<?php
/**
 * Description of DefinicionFilaItemPanelGen class
 *
 * @author jose
 */
class DefinicionFilaItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDefinicionFilaView;


    public $blnExpand = false;

    /**
     *
     * @var DefinicionFila
     */
    protected $objDefinicionFila;

    public function __construct($objParentObject, DefinicionFila $objDefinicionFila = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDefinicionFila = $objDefinicionFila;


            $this->strTemplate = __VIEW_DIR__.'/definicionfila/DefinicionFilaItemPanel.tpl.php';
            $this->pnlDefinicionFilaView = $this->createViewPanel();


            $this->pnlRow = new DefinicionFilaRowPanel($this, $objDefinicionFila);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDefinicionFilaView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDefinicionFilaView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DefinicionFilaViewresumenPanel($this, null, $this->objDefinicionFila->IdDefinicionFila);
    }
}
?>
