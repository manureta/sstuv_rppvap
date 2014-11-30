<?php
	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Usuario class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Usuario object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UsuarioMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 */
	class UsuarioMetaControl extends UsuarioMetaControlGen {

            public $lstPregunta1;
            public $lstPregunta2;
            public $txtPasswordAgain;
            protected $arrPreguntas = array (
                'Apellido de su abuelo materno',
                'Deporte favorito',
                'Comida preferida',
                'País que más desearía conocer',
                'Marca de su primer auto',
                'Canción que más le gusta'
            );

		protected function lstLocalizaciones_Update() {
			if ($this->lstLocalizaciones) {
				$this->objUsuario->UnassociateAllLocalizaciones();
				$objSelectedListValues = $this->lstLocalizaciones->SelectedValues;
				if ($objSelectedListValues) foreach ($objSelectedListValues as $strIdLocalizacion) {
					$this->objUsuario->AssociateLocalizacion(Localizacion::Load($strIdLocalizacion));
				}
			}
		}


                public function lstPregunta1_Create($strControlId = null){
                    $this->lstPregunta1 = new QListBox($this->objParentObject);
                    $this->lstPregunta1->Name = 'Pregunta Secreta 1';
                    $this->lstPregunta1->AddItem('Seleccione', '');
                    $this->lstPregunta1->Required = true;
                    
                    for ($i = 0; $i < count($this->arrPreguntas) / 2; $i++) {
                        $this->lstPregunta1->AddItem($this->arrPreguntas[$i], $i);
                    }
                    return $this->lstPregunta1;                  
                }
                
                public function lstPregunta2_Create($strControlId = null){
                    $this->lstPregunta2 = new QListBox($this->objParentObject);
                    $this->lstPregunta2->Name = 'Pregunta Secreta 2';
                    $this->lstPregunta2->Required = true;
                    $this->lstPregunta2->AddItem('Seleccione', '');
                    
                    for ($i = count($this->arrPreguntas) / 2; $i < count($this->arrPreguntas); $i++) {
                        $this->lstPregunta2->AddItem($this->arrPreguntas[$i], $i);
                    }
                    return $this->lstPregunta2;                  
                }
                /**
                * Create and setup QTextBox txtRespuestaA
                * @param string $strControlId optional ControlId to use
                * @return QTextBox
                */
               public function txtRespuestaA_Create($strControlId = null) {
                   $this->txtRespuestaA = new QTextBox($this->objParentObject, $strControlId);
                   $this->txtRespuestaA->Name = "Respuesta a pregunta secreta 1";
                   $this->txtRespuestaA->Text = $this->objUsuario->RespuestaA;
                   $this->txtRespuestaA->Required = true;

                   return $this->txtRespuestaA;
               }
                /**
                * Create and setup QTextBox txtRespuestaA
                * @param string $strControlId optional ControlId to use
                * @return QTextBox
                */
               public function txtRespuestaB_Create($strControlId = null) {
                   $this->txtRespuestaB = new QTextBox($this->objParentObject, $strControlId);
                   $this->txtRespuestaB->Name = "Respuesta a pregunta secreta 2";
                   $this->txtRespuestaB->Text = $this->objUsuario->RespuestaB;
                   $this->txtRespuestaB->Required = true;

                   return $this->txtRespuestaB;
               }
               public function txtPassword_Create($strControlId = null) {
                   $this->txtPassword = new QTextBox($this->objParentObject, $strControlId);
                   $this->txtPassword->Name = "Contraseña";
                   $this->txtPassword->TextMode = QTextMode::Password;
                   $this->txtPassword->Required = true;
                   return $this->txtPassword;
               }
               public function txtPasswordAgain_Create($strControlId = null) {
                   $this->txtPasswordAgain = new QTextBox($this->objParentObject, $strControlId);
                   $this->txtPasswordAgain->Name = "Repetir Contraseña";
                   $this->txtPasswordAgain->TextMode = QTextMode::Password;
                   $this->txtPasswordAgain->Required = true;
                   return $this->txtPasswordAgain;
               }
		public function lstIdPerfilObject_Create($strControlId = null) {
			$this->lstIdPerfilObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdPerfilObject->Name = QApplication::Translate('Perfil');
			$this->lstIdPerfilObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdPerfilObjectArray = Perfil::LoadAll();
			if ($objIdPerfilObjectArray) foreach ($objIdPerfilObjectArray as $objIdPerfilObject) {
				$objListItem = new QListItem($objIdPerfilObject->__toString(), $objIdPerfilObject->IdPerfil);
				if (($this->objUsuario->IdPerfilObject) && ($this->objUsuario->IdPerfilObject->IdPerfil == $objIdPerfilObject->IdPerfil))
					$objListItem->Selected = true;
				$this->lstIdPerfilObject->AddItem($objListItem);
			}
			
			return $this->lstIdPerfilObject;
		}
        /**
         * Redefino el nombre del campo
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('"Nombre de Usuario" ');
            $this->txtNombre->Text = $this->objUsuario->Nombre;
            
            return $this->txtNombre;
        }

            
        public function lstLocalizaciones_Create($strControlId = null) {
            $this->lstLocalizaciones = new LocalizacionCheckDatagrid($this->objParentObject, $strControlId);
            $this->lstLocalizaciones->SetUsuario($this->objUsuario);
			return $this->lstLocalizaciones;
        }
		/**
		 * Create and setup QListBox lstLocalizaciones
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function _lstLocalizaciones_Create($strControlId = null) {
			$this->lstLocalizaciones = new QCheckBoxList($this->objParentObject, $strControlId);
			$this->lstLocalizaciones->Name = QApplication::Translate('Localizaciones');
			//$this->lstLocalizaciones->SelectionMode = QSelectionMode::Multiple;
                        $this->lstLocalizaciones->RepeatColumns = 2;
                        $this->lstLocalizaciones->RepeatDirection = QRepeatDirection::Vertical;
			$objAssociatedArray = $this->objUsuario->GetLocalizacionArray();
			$objLocalizacionArray = Localizacion::LoadAll();
			if ($objLocalizacionArray) foreach ($objLocalizacionArray as $objLocalizacion) {
				$objListItem = new QListItem($objLocalizacion->__toString(), $objLocalizacion->IdLocalizacion);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->IdLocalizacion == $objLocalizacion->IdLocalizacion)
						$objListItem->Selected = true;
				}
				$this->lstLocalizaciones->AddItem($objListItem);
			}
			
			return $this->lstLocalizaciones;
		}
                
                
                /*
                 * Redefino el Bind para grabar clave del usuario con md5 y para redefinir los lstPregunta
                 */
                public function Bind(){
                    // Update any fields for controls that have been created
                    if ($this->txtPassword && $this->txtPassword->Text!="") $this->objUsuario->Password = md5($this->txtPassword->Text);
                    if ($this->txtEmail) $this->objUsuario->Email = $this->txtEmail->Text;
                    if ($this->chkSuperAdmin) $this->objUsuario->SuperAdmin = $this->chkSuperAdmin->Checked;
                    if ($this->calFechaActivacion) $this->objUsuario->FechaActivacion = $this->calFechaActivacion->DateTime;
                    if ($this->txtNombre) $this->objUsuario->Nombre = $this->txtNombre->Text;
                    if ($this->lstIdPerfilObject) $this->objUsuario->IdPerfil = $this->lstIdPerfilObject->SelectedValue;
                    if ($this->txtRespuestaA) $this->objUsuario->RespuestaA = $this->txtRespuestaA->Text;
                    if ($this->txtRespuestaB) $this->objUsuario->RespuestaB = $this->txtRespuestaB->Text;
                    if ($this->lstPregunta1) $this->objUsuario->PreguntaSecretaA = $this->lstPregunta1->SelectedValue;
                    if ($this->lstPregunta2) $this->objUsuario->PreguntaSecretaB = $this->lstPregunta2->SelectedValue;
                    if ($this->txtCodPartido) $this->objUsuario->CodPartido = $this->txtCodPartido->Text;


        }
                
	}
?>
