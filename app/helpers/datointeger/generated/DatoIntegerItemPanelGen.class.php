<?php
/**
 * Description of DatoIntegerItemPanelGen class
 *
 * @author jose
 */
class DatoIntegerItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDatoIntegerView;


    public $blnExpand = false;

    /**
     *
     * @var DatoInteger
     */
    protected $objDatoInteger;

    public function __construct($objParentObject, DatoInteger $objDatoInteger = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDatoInteger = $objDatoInteger;


            $this->strTemplate = __VIEW_DIR__.'/datointeger/DatoIntegerItemPanel.tpl.php';
            $this->pnlDatoIntegerView = $this->createViewPanel();


            $this->pnlRow = new DatoIntegerRowPanel($this, $objDatoInteger);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDatoIntegerView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDatoIntegerView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DatoIntegerViewresumenPanel($this, null, $this->objDatoInteger->IdDatoInteger);
    }
}
?>
