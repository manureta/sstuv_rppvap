<?php

class UserMenuPanel extends QPanel {

    public $pnlTareasPendientes;
    public $pnlNotificaciones;
    public $pnlMensajes;
    public $pnlUsuario;

    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
        // Call the Parent

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
//        $this->Template = __PROJECT_DIR__ . '/public/tmp/menu-usuario.html';
        $this->blnAutoRenderChildren = true;

        $btnInicio = new QLinkButton($this);
        $btnInicio->Text = 'Inicio';
        $btnInicio->Icon = 'home';
        $btnInicio->AddCssClass('navbar-link');
        //$btnInicio->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnHome_Click'));
        $btnInicio->Link='';

        $btnMapa = new QLinkButtonTargetBlank($this);
        $btnMapa->Text = 'Mapa';
        $btnMapa->Icon = 'map-marker';
        $btnMapa->AddCssClass('navbar-link');
        //$btnMapa->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnMapa_Click'));
        $btnMapa->Link = "/mapa/";

        $btnFolio = new QLinkButton($this);
        $btnFolio->Text = 'Folios';
        $btnFolio->Icon = 'edit';
        $btnFolio->AddCssClass('navbar-link');
        //$btnFolio->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnFolio_Click'));
        $btnFolio->Link='folio';

        if(!Permission::EsVisualizadorBasico()){
         $btnReportes = new QLinkButton($this);
         $btnReportes->Text = 'Reportes';
         $btnReportes->Icon = 'download';
         $btnReportes->AddCssClass('navbar-link');
         //$btnReportes->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnReportes_Click'));
         $btnReportes->Link='page/reportes';
        }

        if(Permission::PuedeConsultarTripartito()){
         $btnTripartito = new QLinkButton($this);
         $btnTripartito->Text = 'Tripartito';
         $btnTripartito->Icon = 'search';
         $btnTripartito->AddCssClass('navbar-link');
         //$btnTripartito->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnTripartito_Click'));
         $btnTripartito->Link='page/tripartito';
        }

        if(Permission::EsSuperAdministrador()){
         $btnUsuarios = new QLinkButton($this);
         $btnUsuarios->Text = 'Usuarios';
         $btnUsuarios->Icon = 'user';
         $btnUsuarios->AddCssClass('navbar-link');
         //$btnUsuarios->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnUsuarios_Click'));
         $btnUsuarios->Link='usuario';
        }

        $btnCerrarSesion = new QLinkButton($this);
        $btnCerrarSesion->Text = 'Salir';
        $btnCerrarSesion->Icon = 'off';
        $btnCerrarSesion->AddCssClass('navbar-link');
        $btnCerrarSesion->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnCerrarSesion_Click'));

    }

    public function btnHome_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/');
    }

    public function btnCerrarSesion_Click() {
        Session::End();
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/');
    }

    public function btnEditarPerfil_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/usuario/perfil');
    }



    public function btnFolio_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/folio');
    }




    public function lnkRedirect_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect($strParameter);
    }

     public function btnMapa_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/page/mapa');
    }


     public function btnReportes_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/page/reportes');
    }

    public function btnTripartito_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/page/tripartito');
    }

    public function btnUsuarios_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/usuario');
    }
}
