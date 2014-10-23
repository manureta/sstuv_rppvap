<?php
/**
 * Description of DocenteItemPanelGen class
 *
 * @author jose
 */
class DocenteItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlDocenteView;


    public $blnExpand = false;

    /**
     *
     * @var Docente
     */
    protected $objDocente;

    public function __construct($objParentObject, Docente $objDocente = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objDocente = $objDocente;


            $this->strTemplate = __VIEW_DIR__.'/docente/DocenteItemPanel.tpl.php';
            $this->pnlDocenteView = $this->createViewPanel();


            $this->pnlRow = new DocenteRowPanel($this, $objDocente);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlDocenteView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlDocenteView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new DocenteViewresumenPanel($this, null, $this->objDocente->IdDocente);
    }
}
?>
