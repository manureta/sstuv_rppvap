<?php
/**
 * Description of DefinicionCeldaItemPanelGen class
 *
 * @author jose
 */
class DefinicionCeldaItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDefinicionCeldaView;


    public $blnExpand = false;

    /**
     *
     * @var DefinicionCelda
     */
    protected $objDefinicionCelda;

    public function __construct($objParentObject, DefinicionCelda $objDefinicionCelda = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDefinicionCelda = $objDefinicionCelda;


            $this->strTemplate = __VIEW_DIR__.'/definicioncelda/DefinicionCeldaItemPanel.tpl.php';
            $this->pnlDefinicionCeldaView = $this->createViewPanel();


            $this->pnlRow = new DefinicionCeldaRowPanel($this, $objDefinicionCelda);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDefinicionCeldaView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDefinicionCeldaView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DefinicionCeldaViewresumenPanel($this, null, $this->objDefinicionCelda->IdDefinicionCelda);
    }
}
?>
