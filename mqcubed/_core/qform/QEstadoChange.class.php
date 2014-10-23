<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QEstadoChangeclass
 *
 * @author www-data
 */
class QEstadoChange extends QPanel {

    public $lblEstado;
    public $btnChange;

    public function __construct($objParentObject, EstadoTipo $objEstado, $strLinkToRedirect ,$strControlId = null){

        // Call the Parent
        try {
                parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
        }
        
        $this->strTemplate = __VIEW_DIR__ . "/qform/QEstadoChange.tpl.php";

        $this->lblEstado = new QLabel($this);
        $this->lblEstado->Text = $objEstado->__toString();

        $this->btnChange = new QButton($this);
        $this->btnChange->Text = 'Cambiar Estado';
        $this->btnChange->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='". __VIRTUAL_DIRECTORY__ . $strLinkToRedirect ."';"));

        if($objEstado->CEstado == EstadoTipo::BAJA || !Authentication::PuedeEditar())
            $this->btnChange->Visible = false;

    }
}
?>
