<?php

abstract class RegistracionBasePanel extends QPanel {

    public $btnAyuda;
    public $lstPerfil;
    public $txtDni;
    public $txtCuit;
    public $txtNombre;
    public $txtApellido;
    public $txtEmail;
    public $txtEmailAgain;
    public $txtTelefonoCodArea;
    public $txtTelefono;
    public $txtTelefonoCelular;
    public $txtPassword;
    public $txtPasswordAgain;
    public $btnRegistrar;
    public $btnVolver;
    public $btnPrev;
    public $btnAsignarLocalizacion;
    public $txtCueanexo;
    public $strNextStep;
    public $strPrevStep;
    public $arrLocalizacion = array();
    public $arrLocalizacionPerfil = array();
    public $arrLabelLocalizacion = array();
    public $arrButtonBorrar = array();
    public $blnShowLocalizaciones;
    protected $objUsuario;
    public $lstPregunta1;
    public $txtRespuestaA;
    public $lstPregunta2;
    public $txtRespuestaB;
    public $txtCaptcha;
    
    public $mctUsuario;
    public $mctPersonal;

    protected $strNombreUsuario;
    protected $objPersonalEncontrado;

    const STEP_USUARIO = 1;
    const STEP_LOCALIZACIONES = 2;
    const STEP_FIN = 3;
    const STEP_SIN_LOCALIZACION_ASOCIADA = 4;

    public function __construct($objParentObject, $strClosePanelMethod = null, $strControlId = null, $a = null, $intCuit = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strClosePanelMethod, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->strTemplate = __VIEW_DIR__ . "/registracion/RegistracionIndexPanel.tpl.php";
        $this->metaControl_Create();

        
    }

    protected function metaControl_Create(){
         
        $this->mctUsuario = UsuarioMetaControl::Create($this);
        $this->mctPersonal = PersonalMetaControl::Create($this);
        
        $this->lstPregunta1 = $this->mctUsuario->lstPregunta1_Create();
        $this->lstPregunta2 = $this->mctUsuario->lstPregunta2_Create();

        $this->txtRespuestaA = $this->mctUsuario->txtRespuestaA_Create();
        $this->txtRespuestaB = $this->mctUsuario->txtRespuestaB_Create();

        $this->txtDni = $this->mctPersonal->txtDni_Create();     
        $this->txtDni->Required = true;
        $this->txtDni->ToolTip = "Número de documento, sin puntos.";

        $this->txtCuit = $this->mctPersonal->txtCuit_Create();
        
        $this->txtNombre = $this->mctPersonal->txtNombre_Create();
        $this->txtNombre->Required = true;

        $this->txtApellido = $this->mctPersonal->txtApellido_Create();
        $this->txtApellido->Required = true;
        
        $this->txtEmail = $this->mctUsuario->txtEmail_Create();
 
        $this->txtEmail->ToolTip = "En esta dirección de correo electrónico recibirá las notificaciones referidas al CENPE 2014.";


        $this->txtEmailAgain = new QEmailTextBox($this);
        $this->txtEmailAgain->Name = "Repetir Email";
        $this->txtEmailAgain->Required = true;

        $this->txtTelefonoCodArea = $this->mctPersonal->txtTelCodigoArea_Create();

        $this->txtTelefono = $this->mctPersonal->txtTelNumero_Create();
        $this->txtTelefono->Required = true;


        $this->txtTelefonoCelular = new QTextBox($this);
        $this->txtTelefonoCelular->Name = "Celular";
        $this->txtTelefonoCelular->MinLength = 5;
        $this->txtTelefonoCelular->MaxLength = 20;

        $this->txtPassword = $this->mctUsuario->txtPassword_Create();
        $this->txtPasswordAgain = $this->mctUsuario->txtPasswordAgain_Create();
     
        $this->btnRegistrar = new QButton($this);
        $this->btnRegistrar->Text = "Confirmar";
        $this->btnRegistrar->AddCssClass('btn-success');
        $this->btnRegistrar->Icon = 'arrow-right';

        $this->btnRegistrar->CausesValidation = $this;
        $this->btnRegistrar->AddCssClass('checkbuttonM');
        $this->btnRegistrar->AddAction(new QClickEvent(), new QAjaxControlAction($this, "RegistrarUsuario"));

        $this->btnVolver = new QButton($this);
        $this->btnVolver->Text = "Volver";
        $this->btnVolver->AddCssClass('btn-primary');
        $this->btnVolver->Icon = 'undo';

        $this->btnVolver->AddCssClass('checkbuttonM');
        $this->btnVolver->AddAction(new QClickEvent(), new QAjaxControlAction($this, "VolverLogin"));

        $this->btnAyuda = new QButton($this);
        $this->btnAyuda->Text = 'Ayuda';
        $this->btnAyuda->AddCssClass('badge badge-info');
        $this->btnAyuda->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAyuda_Click'));

        
        $this->txtCaptcha = $this->txtCaptcha_Create();
        

        //if (SERVER_INSTANCE == 'dev') {
        //    $this->txtDni->Text = rand(10000000, 99999999);
        //    $this->txtCuit->Text = '20-30039265-3';
        //    $this->txtEmail->Text = $this->txtEmailAgain->Text = 'hernol@gmail.com';
        //    $this->txtTelefono->Text = 12345678;
        //    $this->txtTelefonoCelular->Text = 12345678;
        //    $this->txtPassword->Text = $this->txtPasswordAgain->Text = '111111';
        //    $this->txtNombre->Text = 'Cosme';
        //    $this->txtApellido->Text = 'Fulanito';
        //}
    }
     
    protected function txtCaptcha_Create(){
        $this->txtCaptcha = new QCaptchaTextbox($this) ;	
         $this->txtCaptcha->Name = "Código de Seguridad";
        $this->txtCaptcha->ForeColor = array(0, 0, 0) ;			
        $this->txtCaptcha->BackgroundColor = array(225, 225,225) ;			
        $this->txtCaptcha->SignColor = array(255, 255,255) ;			
        $this->txtCaptcha->Length = 5 ;								
        $this->txtCaptcha->AddBlur = true ;
        $this->txtCaptcha->AllowNumbers = false;
        $this->txtCaptcha->AllowLowerCaseLetter = false;
        $this->txtCaptcha->CaseSensitive = false;
        $this->txtCaptcha->AllowUpperCaseLetter = false;
        $this->txtCaptcha->AddNoise = false;
        $this->txtCaptcha->AllowNumbers = true;
        $this->txtCaptcha->Width = 100;
        return $this->txtCaptcha;
    }

    public function VolverLogin($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__ . '/login');
    }

    public function btnAyuda_Click($strFormId, $strControlId, $strParameter) {
        QApplication::DisplayAlert('Ingrese todos los datos solicitados, presione <b><FONT COLOR="#6A0070">CONFIRMAR</font></b> al finalizar.
    <br>Si presiona <b><FONT COLOR="#6A0070">VOLVER</font></b> volverá a la pantalla de inicio, tenga en cuenta que perderá lo ingresado hasta el momento.
    <br>La contraseña combinada con su usuario le permitirá tener acceso exclusivo a sus datos. Usted puede poner la contraseña que desee, combinando números y letras.
    <UL type = square>
    <LI><b><FONT COLOR="#6A0070">DOCUMENTO DE IDENTIDAD:</font></b> Número de  su documento, sin puntos.
    <LI><b><FONT COLOR="#6A0070">CUIL/CUIT:</font></b> Número de su CUIL o CUIT, sin guiones.
    <LI><b><FONT COLOR="#6A0070">EMAIL:</font></b> En esta dirección de correo electrónico recibirá las notificaciones referidas al CENPE 2014 y las respuestas a sus consultas y reclamos, si los hubiera.
    <LI><b><FONT COLOR="#6A0070">TELÉFONO - CÓDIGO DE ÁREA:</font></b> complete el código incluyendo el 0 (cero) sin paréntesis ni guiones.
    <LI><b><FONT COLOR="#6A0070">TELÉFONO - NÚMERO:</font></b>Complete el número de teléfono sin guiones ni espacios. En este número de teléfono recibirá las comunicaciones referidas al CENPE 2014. Si es un celular no olvide anteponer el 15 a su número.
    </UL>
    <b><FONT COLOR="#6A0070"><u>IMPORTANTE:</FONT></b></u>
    <UL type = square>      
    <LI><b><FONT COLOR="#6A0070">TODOS LOS CAMPOS SON OBLIGATORIOS.</font></b> Si no completa alguno el sistema no le permitirá continuar con el registro.
    <LI><b><FONT COLOR="#6A0070">TOME NOTA DE SU USUARIO Y CONTRASEÑA</font></b> que le informa el Sistema al confirmar el registro, estos datos le permitirán ingresar para operar con el sistema.
    <LI><b><FONT COLOR="#6A0070">RECUERDE LAS PREGUNTAS SELECCIONADAS Y SUS RESPUESTAS.</font></b> Le serán solicitadas por el sistema para confirmar su identidad en caso de <b><FONT COLOR="#6A0070">OLVIDAR SU CONTRASEÑA</font></b> para generar una nueva.</ul>');
    }

    public function ValidateControlAndChildren() {

        $blnValid = true;
        foreach ($this->GetChildControls() as $objChildControl) {
            if (($objChildControl->Visible) && ($objChildControl->Enabled) && ($objChildControl->RenderMethod) && ($objChildControl->OnPage)) {
                if (!$this->Form->ValidateControlAndChildren($objChildControl)) {
                    $blnValid = false;
                }
            }
        }
        $this->txtNombre->Text = mb_strtoupper($this->txtNombre->Text, 'utf-8');
        $this->txtApellido->Text = mb_strtoupper($this->txtApellido->Text, 'utf-8');

        if ($this->txtEmail->Text != $this->txtEmailAgain->Text) {
            $this->txtEmail->ValidationError = 'Las direcciones de correo no coinciden';
            $blnValid = false;
        }
        if ($this->txtPassword->Text != $this->txtPasswordAgain->Text) {
            $this->txtPassword->ValidationError = "Las contraseñas no coinciden.";
            $blnValid = false;
        }

        if (!$this->txtCaptcha->Validate()) {
            $this->txtCaptcha = $this->txtCaptcha_Create();
            $this->txtCaptcha->ValidationError = "Código de Seguridad Erróneo";
            $blnValid = false;
        }
        if (!$blnValid) return false; //corto la ejecución para evitar el costo de los demás chequeos

        $strCuit = str_replace('-', '', $this->txtCuit->Text);
        $objUsuario = Usuario::LoadByNombre($strCuit);
        if ($objUsuario instanceof Usuario) {
            $this->txtCuit->ValidationError = 'Ya se encuentra registrado un Usuario en el sistema con ese CUIL/CUIT';
            $blnValid = false;
        }
       
        if (strlen($strCuit) && !$this->txtCuit->ValidationError) {
            $objPersonal = Personal::LoadByCuit($strCuit);
            if (!$objPersonal) {
                $objPersonal = Personal::BuscarPersonal($this->txtApellido->Text, $this->txtDni->Text);
                if ($objPersonal) {
                    $objPersonal->Cuit = $strCuit;
                    $objPersonal->Save();
                }
            }
            $this->objPersonalEncontrado = $objPersonal;

        }
        return $blnValid;
    }

    protected function getPerfilRegistracion() {
        $objPerfil = Perfil::LoadByNombre($this->strPerfil);
        return $objPerfil;
    }

    abstract protected function CrearUsuario() ;
    public function RegistrarUsuario() {
        try {
            $this->CrearUsuario();

            QApplication::ExecuteJavascript(
                    'bootbox.dialog({
                message: "Ya puede ingresar al sistema con el Usuario:  <b>' . str_replace('-', '', $this->strNombreUsuario) . '</b> y la Contraseña que especificó",
                title: "Registro exitoso!",
                closeButton: false,
                buttons: {
                  success: {
                    label: "Aceptar",
                    className: "btn-success",
                    callback: function() {
                      window.location="' . __VIRTUAL_DIRECTORY__ . '/login";
                    }
                  }
                }
              });'
            );
        } catch (Exception $e) {
            QApplication::DisplayAlert("Ocurrio un error registrando el usuario: " . $e->getMessage());
            LogHelper::Log("Error registrando usuario: " . $e->getMessage());
            error_log("Error registrando usuario: " . $e->getMessage());
            return false;
        }
    }

}

?>
