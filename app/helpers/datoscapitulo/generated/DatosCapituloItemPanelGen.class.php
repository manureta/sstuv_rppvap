<?php
/**
 * Description of DatosCapituloItemPanelGen class
 *
 * @author jose
 */
class DatosCapituloItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDatosCapituloView;


    public $blnExpand = false;

    /**
     *
     * @var DatosCapitulo
     */
    protected $objDatosCapitulo;

    public function __construct($objParentObject, DatosCapitulo $objDatosCapitulo = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDatosCapitulo = $objDatosCapitulo;


            $this->strTemplate = __VIEW_DIR__.'/datoscapitulo/DatosCapituloItemPanel.tpl.php';
            $this->pnlDatosCapituloView = $this->createViewPanel();


            $this->pnlRow = new DatosCapituloRowPanel($this, $objDatosCapitulo);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDatosCapituloView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDatosCapituloView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DatosCapituloViewresumenPanel($this, null, $this->objDatosCapitulo->IdDatosCapitulo);
    }
}
?>
