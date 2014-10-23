<?php
/**
 * Description of DefcuadroDefcolumnaItemPanelGen class
 *
 * @author jose
 */
class DefcuadroDefcolumnaItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDefcuadroDefcolumnaView;


    public $blnExpand = false;

    /**
     *
     * @var DefcuadroDefcolumna
     */
    protected $objDefcuadroDefcolumna;

    public function __construct($objParentObject, DefcuadroDefcolumna $objDefcuadroDefcolumna = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDefcuadroDefcolumna = $objDefcuadroDefcolumna;


            $this->strTemplate = __VIEW_DIR__.'/defcuadrodefcolumna/DefcuadroDefcolumnaItemPanel.tpl.php';
            $this->pnlDefcuadroDefcolumnaView = $this->createViewPanel();


            $this->pnlRow = new DefcuadroDefcolumnaRowPanel($this, $objDefcuadroDefcolumna);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDefcuadroDefcolumnaView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDefcuadroDefcolumnaView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DefcuadroDefcolumnaViewresumenPanel($this, null, $this->objDefcuadroDefcolumna->IdDefinicionCuadro, $this->objDefcuadroDefcolumna->IdDefinicionColumna);
    }
}
?>
