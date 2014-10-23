<?php
/**
 * Description of UsuarioItemPanelGen class
 *
 * @author jose
 */
class UsuarioItemPanelGen extends QPanel {

    public $pnlRow;
    public $pnlUsuarioView;


    public $blnExpand = false;

    /**
     *
     * @var Usuario
     */
    protected $objUsuario;

    public function __construct($objParentObject, Usuario $objUsuario = null, $strControlId = null) {
            // Call the Parent
            try {
                    parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
            $this->objUsuario = $objUsuario;


            $this->strTemplate = __VIEW_DIR__.'/usuario/UsuarioItemPanel.tpl.php';
            $this->pnlUsuarioView = $this->createViewPanel();


            $this->pnlRow = new UsuarioRowPanel($this, $objUsuario);
            $this->pnlRow->AddAction(new QClickEvent(), new QJQToggleEffectAction($this->pnlUsuarioView, "blind", "",500));

            QApplication::ExecuteJavaScript("$('#". $this->pnlUsuarioView->ControlId ."').css('display', 'none');");
    }

    public function createViewPanel() {
        return new UsuarioViewresumenPanel($this, null, $this->objUsuario->IdUsuario);
    }
}
?>
