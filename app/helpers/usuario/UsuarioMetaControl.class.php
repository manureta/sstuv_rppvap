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
                    
                    if ($this->txtCodPartido) $this->objUsuario->CodPartido = $this->txtCodPartido->Text;
                    if ($this->txtNombreCompleto) $this->objUsuario->NombreCompleto = $this->txtNombreCompleto->Text;
                    if ($this->txtReparticion) $this->objUsuario->Reparticion = $this->txtReparticion->Text;


        }
                
	}
?>
