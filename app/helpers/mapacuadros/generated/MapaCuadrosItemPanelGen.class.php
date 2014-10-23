<?php
/**
 * Description of MapaCuadrosItemPanelGen class
 *
 * @author jose
 */
class MapaCuadrosItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlMapaCuadrosView;


    public $blnExpand = false;

    /**
     *
     * @var MapaCuadros
     */
    protected $objMapaCuadros;

    public function __construct($objParentObject, MapaCuadros $objMapaCuadros = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objMapaCuadros = $objMapaCuadros;


            $this->strTemplate = __VIEW_DIR__.'/mapacuadros/MapaCuadrosItemPanel.tpl.php';
            $this->pnlMapaCuadrosView = $this->createViewPanel();


            $this->pnlRow = new MapaCuadrosRowPanel($this, $objMapaCuadros);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlMapaCuadrosView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlMapaCuadrosView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new MapaCuadrosViewresumenPanel($this, null, $this->objMapaCuadros->IdDefinicionCuadro, $this->objMapaCuadros->COferta, $this->objMapaCuadros->CEstado);
    }
}
?>
