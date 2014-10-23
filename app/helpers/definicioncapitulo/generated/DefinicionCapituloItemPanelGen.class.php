<?php
/**
 * Description of DefinicionCapituloItemPanelGen class
 *
 * @author jose
 */
class DefinicionCapituloItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDefinicionCapituloView;


    public $blnExpand = false;

    /**
     *
     * @var DefinicionCapitulo
     */
    protected $objDefinicionCapitulo;

    public function __construct($objParentObject, DefinicionCapitulo $objDefinicionCapitulo = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDefinicionCapitulo = $objDefinicionCapitulo;


            $this->strTemplate = __VIEW_DIR__.'/definicioncapitulo/DefinicionCapituloItemPanel.tpl.php';
            $this->pnlDefinicionCapituloView = $this->createViewPanel();


            $this->pnlRow = new DefinicionCapituloRowPanel($this, $objDefinicionCapitulo);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDefinicionCapituloView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDefinicionCapituloView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DefinicionCapituloViewresumenPanel($this, null, $this->objDefinicionCapitulo->IdDefinicionCapitulo);
    }
}
?>
