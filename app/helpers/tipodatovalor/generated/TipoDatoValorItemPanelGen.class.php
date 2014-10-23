<?php
/**
 * Description of TipoDatoValorItemPanelGen class
 *
 * @author jose
 */
class TipoDatoValorItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlTipoDatoValorView;


    public $blnExpand = false;

    /**
     *
     * @var TipoDatoValor
     */
    protected $objTipoDatoValor;

    public function __construct($objParentObject, TipoDatoValor $objTipoDatoValor = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objTipoDatoValor = $objTipoDatoValor;


            $this->strTemplate = __VIEW_DIR__.'/tipodatovalor/TipoDatoValorItemPanel.tpl.php';
            $this->pnlTipoDatoValorView = $this->createViewPanel();


            $this->pnlRow = new TipoDatoValorRowPanel($this, $objTipoDatoValor);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlTipoDatoValorView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlTipoDatoValorView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new TipoDatoValorViewresumenPanel($this, null, $this->objTipoDatoValor->IdTipoDatoValor);
    }
}
?>
