<?php
/**
 * Description of PerfilItemPanelGen class
 *
 * @author jose
 */
class PerfilItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlPerfilView;


    public $blnExpand = false;

    /**
     *
     * @var Perfil
     */
    protected $objPerfil;

    public function __construct($objParentObject, Perfil $objPerfil = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objPerfil = $objPerfil;


            $this->strTemplate = __VIEW_DIR__.'/perfil/PerfilItemPanel.tpl.php';
            $this->pnlPerfilView = $this->createViewPanel();


            $this->pnlRow = new PerfilRowPanel($this, $objPerfil);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlPerfilView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlPerfilView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new PerfilViewresumenPanel($this, null, $this->objPerfil->IdPerfil);
    }
}
?>
