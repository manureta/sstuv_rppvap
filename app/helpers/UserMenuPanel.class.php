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
        
        $btnInicio = new QButton($this);
        $btnInicio->Text = 'Inicio';
        $btnInicio->Icon = 'home';
        $btnInicio->AddCssClass('btn-white');
        $btnInicio->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnHome_Click'));

        $btnFolio = new QButton($this);
        $btnFolio->Text = 'Folios';
        $btnFolio->Icon = 'edit';
        $btnFolio->AddCssClass('btn-white');
        $btnFolio->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnFolio_Click'));
        //$btnFolio->Visible = Permission::EsDirector();

        $btnIncidente = new QButton($this);
        $btnIncidente->Text = 'Peticiones';
        $btnIncidente->Icon = 'bolt';
        $btnIncidente->AddCssClass('btn-warning');
        $btnIncidente->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnIncidente_Click'));
        $btnIncidente->Visible = (Permission::EsDirector() || Permission::EsSupervisor() || Permission::EsOperador()); 
        
        if(Permission::EsSupervisor()){
            $btnIncidente = new QButton($this);
            $btnIncidente->Text = 'Desvinculación';
            $btnIncidente->Icon = 'minus-sign';
            $btnIncidente->AddCssClass('btn-grey');
            $btnIncidente->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnDesvinculacion_Click'));
        }
        /*
        $btnCedula = new QButton($this);
        
        $btnCedula->Icon = 'edit';
        $btnCedula->AddCssClass('btn-white');
        */
        //El operador, en vez de acceso a Cedula, tiene acceso a pantalla Reseteo de Contraseñas
        if(Permission::EsOperador() || Permission::EsSupervisor()){
            $btnInformacionGeneral = new QButton($this);
            $btnInformacionGeneral->Text = 'Información Global';
            $btnInformacionGeneral->Icon = 'book';
            $btnInformacionGeneral->AddCssClass('btn-warning');
            $btnInformacionGeneral->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnInformacionGlobal_Click'));
            
            $btnAdmNominas = new QButton($this);
            $btnAdmNominas->Text = 'Adm. Nominas';
            $btnAdmNominas->Icon = 'book';
            $btnAdmNominas->AddCssClass('btn-white');
            $btnAdmNominas->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnAdmNominas_Click'));
        }
/*
        if(Permission::EsOperador() || Permission::EsSupervisor()){
            $btnCedula->Text = 'Resetear Passwords';
            $btnCedula->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnResetearPassword_Click'));
        } else {
            $btnCedula->Text = 'Folios';
            $btnCedula->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnCedula_Click'));
        }
*/        
        
        $btnEditarPerfil = new QButton($this);
        $btnEditarPerfil->Text = 'Editar Perfil';
        $btnEditarPerfil->Icon = 'user';
        $btnEditarPerfil->AddCssClass('btn-white');
        $btnEditarPerfil->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'btnEditarPerfil_Click'));
        
        $btnCerrarSesion = new QButton($this);
        $btnCerrarSesion->Text = 'Salir';
        $btnCerrarSesion->Icon = 'off';
        $btnCerrarSesion->AddCssClass('btn-white');
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
    
    public function btnIncidente_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/incidente');
    }
    
    public function btnDesvinculacion_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/establecimiento/desvincular');
    }

    public function btnFolio_Click() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/folio');
    }
    
    public function btnInformacionGlobal_Click(){
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/informacionglobal');
    }
    
    public function btnAdmNominas_Click(){
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/admnomina');
    }
/*
    public function btnCedula_Click() {
        //QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/cedula');
        $arrInfoUsuario = Session::GetUsuario();
        $objPersonalEstablecimientoUnidadServicioArray = PersonalEstablecimientoUnidadServicio::LoadArrayByIdPersonal($arrInfoUsuario['IdPersonal']);
        if (count($objPersonalEstablecimientoUnidadServicioArray) > 0) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/folio');
        } else {
            QApplication::DisplayAlert('Usted no posee Ofertas para cargar');
        }
    }
*/    
     public function btnResetearPassword_Click() {
         QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/usuario/resetearpass');
     }
    
    
    public function lnkRedirect_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect($strParameter);
    }
}
