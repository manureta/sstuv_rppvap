<?php
class ErrorReportarPanel extends QPanel {


    public $txtCuit;
    public $txtCue;
    public $txtAnexo;
    public $txtDescripcion;
    public $lstMotivo;
    public $btnReportar;
    public $txtEmail;
    const NO_EXISTE_CUE                 = 'No se encuentra CUE';
    const NO_EXISTE_ANEXO               = 'No se encuentra ANEXO';
    const NO_EXISTE_PERSONAL            = 'No se encuentra Personal';
    const NO_EXISTE_UNIDAD_SERVICIO     = 'No se encuentra una Unidad de Servicio';
    const LOCALIZACION_DE_MAS           = 'Localización sobrante en CUE';
    const ERROR_EN_REGISTRACION         = 'Error en Registración';
    const ERROR_EN_ASIGNACION_CUE       = 'Error en Asignacion de CUE';

    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
        // Call the Parent

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Template = __VIEW_DIR__.'/error/ErrorReportarPanel.tpl.php';
        $this->txtEmail = new QEmailTextBox($this);
        $this->txtEmail->Name = 'Email';
        $this->txtEmail->Required = true;


        $this->txtCuit = new QTextBox($this);
        $this->txtCuit->Name = 'CUIL/CUIT';
        $this->txtCuit->Required = true;

        $arrUsuarioInfo = Session::GetUsuario();
        if ($objPersonal = Personal::LoadByCuit($arrUsuarioInfo['Cuit'])) {
            $this->txtCuit->Text = $objPersonal->Cuit;
        }

        $this->lstMotivo = new QListBox($this);
        $this->lstMotivo->Name = 'Error a reportar';
        $this->lstMotivo->AddItem(self::NO_EXISTE_CUE, self::NO_EXISTE_CUE);
        $this->lstMotivo->AddItem(self::NO_EXISTE_ANEXO, self::NO_EXISTE_ANEXO);
        $this->lstMotivo->AddItem(self::NO_EXISTE_PERSONAL, self::NO_EXISTE_PERSONAL);
        $this->lstMotivo->AddItem(self::NO_EXISTE_UNIDAD_SERVICIO, self::NO_EXISTE_UNIDAD_SERVICIO);
        $this->lstMotivo->AddItem(self::LOCALIZACION_DE_MAS, self::LOCALIZACION_DE_MAS);
        $this->lstMotivo->AddItem(self::ERROR_EN_REGISTRACION, self::ERROR_EN_REGISTRACION);
        $this->lstMotivo->AddItem(self::ERROR_EN_ASIGNACION_CUE, self::ERROR_EN_ASIGNACION_CUE);
        $this->lstMotivo->Required = true;


        $this->txtCue = new QIntegerTextBox($this);
        $this->txtCue->Name = 'CUE';
        $this->txtCue->MaxLength = 7;
        $this->txtCue->MinLength = 7;
        $this->txtCue->Required = false;

        $this->txtAnexo = new QIntegerTextBox($this);
        $this->txtAnexo->Name = 'ANEXO';
        $this->txtAnexo->MaxLength = 2;
        $this->txtAnexo->MinLength = 2;
        $this->txtAnexo->Required = false;

        $this->txtDescripcion = new QTextBox($this);
        $this->txtDescripcion->Name = 'Descripción del reporte';
        $this->txtDescripcion->TextMode = QTextMode::MultiLine;
        $this->txtDescripcion->Rows = 25;
        $this->txtDescripcion->Columns= 10;

        $this->btnReportar = new QButton($this);
        $this->btnReportar->Text = 'Reportar';
        $this->btnReportar->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'Reportar'));

    }

    public function Reportar($strFormId, $strControlId, $strParameter) {
        if (SERVER_INSTANCE == 'dev') {
            $strStmpHost = 'tls://smtp.gmail.com';
            $strFrom = 'sistemasdiniece@gmail.com';
            $strTo = 'sistemasdiniece@gmail.com';
            $strSmtpUserName = 'sistemasdiniece@gmail.com';
            $strSmtpUserPassword = 'SISDNC10';
            $intSmtpPort  = 465;
            $blnSmtpAuthPlain = false;
            $blnSmtpAuthLogin = true;
            QEmailServer::$SmtpServer = $strStmpHost;
            QEmailServer::$SmtpUsername = $strSmtpUserName;
            QEmailServer::$SmtpPassword = $strSmtpUserPassword;
            QEmailServer::$SmtpPort = $intSmtpPort;
            QEmailServer::$AuthLogin = $blnSmtpAuthLogin;
            QEmailServer::$AuthPlain = $blnSmtpAuthPlain;
        } else {
            QEmailServer::$SmtpServer = __EMAIL_SMTP_SERVER__;
            QEmailServer::$SmtpUsername = __SMTP_USERNAME__;
            QEmailServer::$SmtpPassword = __SMTP_USERPASSWORD__;
            QEmailServer::$SmtpPort = __SMTP_PORT__;
            QEmailServer::$AuthLogin = __SMTP_AUTHLOGIN__;
            QEmailServer::$AuthPlain = __SMTP_AUTHPLAIN__;
        }
        $strMailBody = '<h4>Reporte de error</h4>';
        $strMailBody .= 'EMAIL: '.$this->txtEmail->Text."\r\n<br>";
        $strMailBody .= 'CUI: '.$this->txtCuit->Text."\r\n<br>";
        $strMailBody .= 'MOTIVO: '.$this->lstMotivo->Value."\r\n<br>";
        $strMailBody .= 'CUE: '.$this->txtCue->Text."\r\n<br>";
        $strMailBody .= 'ANEXO: '.$this->txtAnexo->Text."\r\n<br>";
        $strMailBody .= 'DESCRIPCIÓN: '.$this->txtDescripcion->Text."\r\n<br>";
        try {
            if (!extension_loaded("openssl")) {dl(((PHP_SHLIB_SUFFIX === 'dll') ? 'php_' : '' )."openssl.".PHP_SHLIB_SUFFIX);}
            $objMessage = new QEmailMessage();
            $objMessage->From = __EMAIL_FROM__;
            $objMessage->To = 'hernol@gmail.com';
            $objMessage->Subject = 'Reporte de error';
            $objMessage->HtmlBody = $strMailBody;
            QEmailServer::Send($objMessage);
            return true;
        } catch (Exception $e) {
            #error_log('Exception $e');
            QApplication::DisplayAlert($e->getMessage());
            return false;
        }

    }

}
?>
