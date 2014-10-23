<?php
/**
 * Description of DatoItemPanelGen class
 *
 * @author jose
 */
class DatoItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDatoView;


    public $blnExpand = false;

    /**
     *
     * @var Dato
     */
    protected $objDato;

    public function __construct($objParentObject, Dato $objDato = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDato = $objDato;


            $this->strTemplate = __VIEW_DIR__.'/dato/DatoItemPanel.tpl.php';
            $this->pnlDatoView = $this->createViewPanel();


            $this->pnlRow = new DatoRowPanel($this, $objDato);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDatoView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDatoView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DatoViewresumenPanel($this, null, $this->objDato->IdDato);
    }
}
?>
