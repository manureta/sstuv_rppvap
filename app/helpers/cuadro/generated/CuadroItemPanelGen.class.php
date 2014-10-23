<?php
/**
 * Description of CuadroItemPanelGen class
 *
 * @author jose
 */
class CuadroItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlCuadroView;


    public $blnExpand = false;

    /**
     *
     * @var Cuadro
     */
    protected $objCuadro;

    public function __construct($objParentObject, Cuadro $objCuadro = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objCuadro = $objCuadro;


            $this->strTemplate = __VIEW_DIR__.'/cuadro/CuadroItemPanel.tpl.php';
            $this->pnlCuadroView = $this->createViewPanel();


            $this->pnlRow = new CuadroRowPanel($this, $objCuadro);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlCuadroView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlCuadroView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new CuadroViewresumenPanel($this, null, $this->objCuadro->IdCuadro);
    }
}
?>
