<?php
	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Perfil class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Perfil object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PerfilMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 */
	class PerfilMetaControl extends PerfilMetaControlGen {
		public function lstCreatedbyObject_Create($strControlId = null) {
			$lblCreatedBy = $this->lblCreatedby_Create($strControlId);
			$lblCreatedBy->Name=QApplication::Translate("Creado por");
			return $lblCreatedBy;
			//return $this->lblCreatedby_Create($strControlId);
		}
		public function lstModifiedbyObject_Create($strControlId = null) {
			$lblModifiedBy = $this->lblModifiedby_Create($strControlId);
			$lblModifiedBy->Name=QApplication::Translate("Modificado por");
			return $lblModifiedBy;
			//return $this->lblModifiedby_Create($strControlId);
		}
		public function calDatecreated_Create($strControlId = null) {
			return $this->lblDatecreated_Create($strControlId);
		}
		public function lblDatecreated_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDatecreated = new QLabel($this->objParentObject, $strControlId);
			$this->lblDatecreated->Name = QApplication::Translate('Fecha de Creación');
			if($this->blnEditMode){
				$this->lblDatecreated->Text = $this->Perfil->Datecreated->__toString(QDateTimeCustom::FormatApp);
				return $this->lblDatecreated;
			}else{
				return null;
			}
		}
	}
?>