<?php
/**
 * Description of DatoStringItemPanelGen class
 *
 * @author jose
 */
class DatoStringItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDatoStringView;


    public $blnExpand = false;

    /**
     *
     * @var DatoString
     */
    protected $objDatoString;

    public function __construct($objParentObject, DatoString $objDatoString = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDatoString = $objDatoString;


            $this->strTemplate = __VIEW_DIR__.'/datostring/DatoStringItemPanel.tpl.php';
            $this->pnlDatoStringView = $this->createViewPanel();


            $this->pnlRow = new DatoStringRowPanel($this, $objDatoString);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDatoStringView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDatoStringView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DatoStringViewresumenPanel($this, null, $this->objDatoString->IdDatoString);
    }
}
?>
