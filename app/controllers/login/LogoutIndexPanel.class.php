<?php

class LogoutIndexPanel {

    public function __construct($objParentObject, $strClosePanelMethod = null, $strControlId = null, $strRefererPanel = "/") {
        Authentication::LogoutUsuario();
        QApplication::Redirect(__VIRTUAL_DIRECTORY__==''?'/':__VIRTUAL_DIRECTORY__);

    }

}

?>
