<?php
/**
 * Description of NoticiaItemPanelGen class
 *
 * @author jose
 */
class NoticiaItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlNoticiaView;


    public $blnExpand = false;

    /**
     *
     * @var Noticia
     */
    protected $objNoticia;

    public function __construct($objParentObject, Noticia $objNoticia = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objNoticia = $objNoticia;


            $this->strTemplate = __VIEW_DIR__.'/noticia/NoticiaItemPanel.tpl.php';
            $this->pnlNoticiaView = $this->createViewPanel();


            $this->pnlRow = new NoticiaRowPanel($this, $objNoticia);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlNoticiaView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlNoticiaView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new NoticiaViewresumenPanel($this, null, $this->objNoticia->IdNoticia);
    }
}
?>
