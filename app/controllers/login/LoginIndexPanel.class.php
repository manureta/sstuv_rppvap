<?php

class LoginIndexPanel extends QPanel {

    public $txtUsuario;
    public $txtPassword;
    public $btnLogin;
    public $btnRegistro;
    public $btnOlvidoPassword;
    public $btnAyuda;
    protected $strRefererPanel;
    public $pnlNoticia;

    public function __construct($objParentObject, $strClosePanelMethod = null, $strControlId = null, $strRefererPanel = "/localizacion/index") {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        Session::SetSessionVar("DoingLoggin", 1);
        
        $this->strTemplate = __VIEW_DIR__.'/login/LoginIndexPanel.tpl.php';

        //if(((!defined('__SHOW_HOME__') || !__SHOW_HOME__)) && $strRefererPanel == "page/home//")
        //$arrNoticias = Noticia::QueryArray(QQ::Equal(QQN::Noticia()->Mostrar,true));
        $arrNoticias = array();
        if(count($arrNoticias)) {
            $strRefererPanel = "";
        } else {
            $strRefererPanel = "/";
        }
        $this->strRefererPanel = $strRefererPanel;

        $this->txtUsuario =  new QTextBox($this);
        $this->txtUsuario->Name = $this->txtUsuario->PlaceHolder = "Nombre de usuario";
        $this->txtUsuario->Icon = "user";
        $this->txtUsuario->Required = true;
        $this->txtUsuario->AddCssClass('block');

        $this->txtPassword =  new QTextBox($this);
        $this->txtPassword->TextMode = QTextMode::Password;
        $this->txtPassword->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnLogin_Click'));
        $this->txtPassword->Required = true;
        $this->txtPassword->Name = $this->txtPassword->PlaceHolder = "Contraseña";
        $this->txtPassword->Icon = "lock";
        $this->txtPassword->AddCssClass('block');
        $this->txtPassword->SetCustomAttribute("autocomplete","off");
      
        $this->btnLogin = new QButton($this);
        $this->btnLogin->Text = 'Ingresar';
        $this->btnLogin->PrimaryButton = true;
        $this->btnLogin->Icon = 'key';
        $this->btnLogin->CausesValidation = true;
        $this->btnLogin->AddCssClass('btn-white');
        $this->btnLogin->AddCssClass('pull-right');
        $this->btnLogin->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnLogin_Click'));
        /*
        $this->btnRegistro = new QBLinkButton($this);
        $this->btnRegistro->Text = 'Registrarse';
        //$this->btnRegistro->PrimaryButton = true;
        $this->btnRegistro->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRegistro_Click'));
        $this->btnRegistro->AddCssClass('pull-left');
        $this->btnRegistro->ToolTip = "";
        */
        $this->btnAyuda = new QButton($this);
        $this->btnAyuda->Text = 'Ayuda';
        //$this->btnAyuda->AddCssClass('btn-white');
        $this->btnAyuda->CssClass = ('badge badge-default');
        $this->btnAyuda->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAyuda_Click'));

        
        
        $this->btnOlvidoPassword = new QBLinkButton($this);
        $this->btnOlvidoPassword->Text = 'Olvidé mi contraseña';
        $this->btnOlvidoPassword->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnOlvidoPassword_Click'));
        $this->btnOlvidoPassword->AddCssClass('pull-right');
        
        $this->pnlNoticia = new QPanel($this);
        $this->pnlNoticia->Name = 'Noticias';        
        $this->pnlNoticia->Visible = false;
        //$arrNoticias = Noticia::QueryArray(QQ::Equal(QQN::Noticia()->Login, true));     
        if(count($arrNoticias)>0) $this->pnlNoticia->Visible = true;
        $text = '<span style="font-weight:bold">NOTICIAS</span><br>';
        foreach($arrNoticias as $objNoticia){ 
            $text .= '<span style="font-size:x-small; color:dimgrey; font-weight:bold;">'.$objNoticia->Fecha. '</span><span style="color:dodgerblue;"> | </span> <span style="font-size:x-small; color:dimgrey;">Noticia ' .$objNoticia->IdNoticia.'</span><br><span style="font-weight:bold">'. "$objNoticia->Titulo </span><br>".'<span style="font-size:x-small; color:dimgrey;">'."$objNoticia->Texto</span><br><hr>";
        }
        $this->pnlNoticia->Text = $text;
    }

    public function btnLogin_Click($strFormId, $strControlId, $strParameter) {
        try {
            $blnLogged = Authentication::LoguearUsuario($this->txtUsuario->Text, $this->txtPassword->Text);
            if ($blnLogged) {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/');
                /*
                if(Authentication::$objUsuarioLocal->IdPerfil == Perfil::OPERADOR){
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/usuario/resetearpass');
                } else if (Authentication::$objUsuarioLocal->IdPerfil == Perfil::PERSONAL) {
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/cedula');
                } else{
                
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/');
                }
                */
            } else {
                QApplication::DisplayAlert("ERROR: Usuario o Contraseña incorrectos.");
            }
        } catch (Exception $e) {
            switch(get_class($e)) {
                case 'QPostgreSqlDatabaseException':
                case 'QPostgreSqlPdoDatabaseException':
                    LogHelper::Error($e->getMessage());
                    QApplication::DisplayAlert('Se produjo un error conectando a la base de datos');
                    break;
                default:
                    QApplication::DisplayAlert($e->getMessage());
            }
        }
        return false;
    }
/*
    public function btnRegistro_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/registracion');
    }
*/
    public function btnAyuda_Click($strFormId, $strControlId, $strParameter) {
        QApplication::DisplayAlert('mensaje de ayuda');
    }
    
    public function btnOlvidoPassword_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/usuario/recuperar');
    }

}
