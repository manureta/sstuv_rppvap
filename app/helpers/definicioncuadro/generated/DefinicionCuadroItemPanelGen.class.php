<?php
/**
 * Description of DefinicionCuadroItemPanelGen class
 *
 * @author jose
 */
class DefinicionCuadroItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDefinicionCuadroView;


    public $blnExpand = false;

    /**
     *
     * @var DefinicionCuadro
     */
    protected $objDefinicionCuadro;

    public function __construct($objParentObject, DefinicionCuadro $objDefinicionCuadro = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDefinicionCuadro = $objDefinicionCuadro;


            $this->strTemplate = __VIEW_DIR__.'/definicioncuadro/DefinicionCuadroItemPanel.tpl.php';
            $this->pnlDefinicionCuadroView = $this->createViewPanel();


            $this->pnlRow = new DefinicionCuadroRowPanel($this, $objDefinicionCuadro);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDefinicionCuadroView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDefinicionCuadroView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DefinicionCuadroViewresumenPanel($this, null, $this->objDefinicionCuadro->IdDefinicionCuadro);
    }
}
?>
