<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaginaIndexPanel
 *
 * @author dsamardzija
 */
class PaginaIndexPanel extends QPanel {

    public $blnEstaDeLicenciaEnTodosLosCargos;
    public function __construct($objParent, $strControlId = null) {
        try {
            parent::__construct($objParent, null);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/cedula');
        return;
        $this->strTemplate = __VIEW_DIR__.'/pagina/PaginaIndexPanel.tpl.php';
        $arrInfoUsuario = Session::GetUsuario();

        $this->blnEstaDeLicenciaEnTodosLosCargos = PersonalEstablecimientoUnidadServicio::EstaDeLicenciaEnTodoLosCargos($arrInfoUsuario['IdPersonal']);

    }
	
	public function GetBreadCrumb() {
        return array(
                'Cédula'
            );
    }

}

?>
