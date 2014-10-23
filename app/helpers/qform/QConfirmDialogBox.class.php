<?php

class QConfirmDialogBox extends QDialogBox {
    
    protected function GetControlHtml() {
        return sprintf('<div style="display:none; background-color: #8a1f11;" class="qdialogbox" id="%s">%s<div style="clear:both"></div></div>', $this->ControlId, (($this->Visible) ? $this->RenderChildren(false) : ''));
    }


}

?>
