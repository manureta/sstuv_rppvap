<?php

require('../app/Bootstrap.php');
Bootstrap::Initialize();

if (file_exists(__CONFIG_DIR__.'/PROYECTOBLOQUEADO')) {
    if(isset($_POST['Qform__FormCallType']) &&  $_POST['Qform__FormCallType'] == 'Ajax') {
        echo '<?xml version="1.0" encoding="UTF-8"?><response><commands><command>alert("Sistema Bloqueado");location.href="'.__VIRTUAL_DIRECTORY__.'/php/proyectobloqueado.php";</command></commands></response>';
    }
}

class FrontController extends FrontControllerBase {

    // Controls
    public $pnlAppController;
    public $pnlLoadingPanel;
    // Properties
    //public static $strTemplateIndex = '../app/views/index.tpl.php';
    //public static $strTemplateCuadernillo = '../app/views/cuadernillo.tpl.php';
    public $strPageTitle;
    public $UserMenu;
    public $pnlUserMenu;
    public $arrMenuLinks = array();
    public $pnlBreadCrumb;
    private $arrNoLoginControllers = array(
        'inicializacion/index',
        'registracion/index',
        'registracion/director',
        'registracion/personal',
        'usuario/asociardocente',
        'usuario/inicializacion',
        'articulacionpadron/index',
        'usuario/recuperar',
        'login/index'
        );

    protected function Form_Create() {
        // Run the dispatcher and retrieve the requested controller name
        $this->pnlLoadingPanel = new QLoadingPanel($this);
        $this->pnlLoadingPanel->Image = __VIRTUAL_DIRECTORY__."/assets/images/cargando.gif";
        DispatchHelper::Initialize();
        if (file_exists(__CONFIG_DIR__.'/PROYECTOBLOQUEADO')) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/php/proyectobloqueado.php');
        }

        // Load the controller into the pnlAppcontroller
        if (strtolower(DispatchHelper::$strController) == 'stresstest') {
            switch (strtolower(DispatchHelper::$strAction)) {
                case 'batch':
                    $this->pnlAppController = new StresstestBatchPanel($this);
                break;
                default:
                    $this->pnlAppController = new StresstestIndexPanel($this);
                break;
            }
        } else {

            if ((!Authentication::UsuarioLogueado()) && !in_array(strtolower(DispatchHelper::$strController."/".DispatchHelper::$strAction), $this->arrNoLoginControllers)) {

                $strRefererPanel = strtolower(DispatchHelper::$strController."/".DispatchHelper::$strAction."/".DispatchHelper::$intId."/".DispatchHelper::$intId2);
                if (strpos($strRefererPanel, "login") !== false) {
                    $strRefererPanel = "/";
                }

                $this->pnlAppController = new LoginIndexPanel($this, null, null, $strRefererPanel);
            } else {
                $this->pnlUserMenu = new UserMenuPanel($this);
                $this->pnlAppController = DispatchHelper::getControllerInstance($this);
                $arrUsuInfo = Authentication::GetUsuarioInfo();
            }            

            $this->pnlBreadCrumb = new QBreadCrumb($this);
            $this->pnlBreadCrumb->AddItem(array('Inicio','page/home'));
            if (method_exists($this->pnlAppController, 'GetBreadCrumb')) {
                foreach($this->pnlAppController->GetBreadCrumb() as $objPage) {
                    $this->pnlBreadCrumb->AddItem($objPage);                
                }
            }
            
        }
    }

    protected function Form_PreRender() {
        // Check if the page title was set
        if ($this->strPageTitle == '') {
            $this->strPageTitle = __APP_NAME__;
        }
    }

    public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            parent::Run('FrontController', '../app/views/index.tpl.php');
            //Session::End();
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

FrontController::$FormStateHandler = __FORM_STATE_HANDLER__;
FrontController::Run();

