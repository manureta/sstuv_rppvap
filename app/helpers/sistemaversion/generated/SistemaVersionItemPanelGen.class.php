<?php
/**
 * Description of SistemaVersionItemPanelGen class
 *
 * @author jose
 */
class SistemaVersionItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlSistemaVersionView;


    public $blnExpand = false;

    /**
     *
     * @var SistemaVersion
     */
    protected $objSistemaVersion;

    public function __construct($objParentObject, SistemaVersion $objSistemaVersion = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objSistemaVersion = $objSistemaVersion;


            $this->strTemplate = __VIEW_DIR__.'/sistemaversion/SistemaVersionItemPanel.tpl.php';
            $this->pnlSistemaVersionView = $this->createViewPanel();


            $this->pnlRow = new SistemaVersionRowPanel($this, $objSistemaVersion);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlSistemaVersionView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlSistemaVersionView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new SistemaVersionViewresumenPanel($this, null, $this->objSistemaVersion->IdSistemaVersion);
    }
}
?>
