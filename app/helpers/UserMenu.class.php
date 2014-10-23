<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserMenu
 *
 * @author marcos
 */
class UserMenu extends QJqueryDropDownMenu {

//protected $objMenuArray = array();
//protected $objMenuItemsArray = array();

    public function __construct($objParentObject, $strControlId = null) {
         try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset(); throw $objExc;

        }

        $itemInicio = $this->addMenuItem();
        $itemInicio->Title = "Inicio";
        $itemInicio->Link = __VIRTUAL_DIRECTORY__ ."/";

        //$menuUsuarios = $menuConfiguarcion->Menu_create();
        //$itemUsuariosAdministrar = $menuConfiguarcion->addMenuItem();
        //$itemUsuariosAdministrar->Title = "Administrar usuarios";
        //$itemUsuariosAdministrar->Link = __VIRTUAL_DIRECTORY__."/usuarios";

        $itemConfiguracion = $this->addMenuItem();
        $itemConfiguracion->Title = "Usuario";
        $menuConfiguarcion = $itemConfiguracion->Menu_create();
        $itemConfiguracionBackup = $menuConfiguarcion->addMenuItem();
        if (!Authentication::UsuarioLogueado()) {
            $itemConfiguracionBackup->Title = "Login";
            $itemConfiguracionBackup->Link = __VIRTUAL_DIRECTORY__."/login";
        } else {
            $itemConfiguracionBackup->Title = "Logout";
            $itemConfiguracionBackup->Link = __VIRTUAL_DIRECTORY__."/logout";
        }
        if (Permission::GetAtributoUsuario("SuperAdmin")) {
            $itemAdminUsuario = $menuConfiguarcion->addMenuItem();
            $itemAdminUsuario->Title = "Administrar usuarios";
            $itemAdminUsuario->Link = __VIRTUAL_DIRECTORY__."/usuario";
        }

/*        $itemConfiguracionBackup = $menuConfiguarcion->addMenuItem();
        $itemConfiguracionBackup->Title = "Registrar usuario";
        $itemConfiguracionBackup->Link = __VIRTUAL_DIRECTORY__."/registracion";*/
    }
    public function ParsePostData() {
    }
    protected function GetControlHtml() {
        return parent::GetControlHtml();
    }
    public function boton_click(){
        QApplication::DisplayAlert("hice click enel boton");
    }
}
?>
