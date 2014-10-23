<?php

/**
 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
 * and QControls to perform the Create, Edit, and Delete functionality of the
 * Docente class.  This code-generated class extends from
 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
 * display an HTML form that can manipulate a single Docente object.
 *
 * To take advantage of some (or all) of these control objects, you
 * must create a new QForm or QPanel which instantiates a DocenteMetaControl
 * class.
 *
 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
 * or overwrite this file.
 * 
 * @package Relevamiento Anual
 * @subpackage MetaControls
 */
class DocenteMetaControl extends DocenteMetaControlGen {

    public function lstIdPerfilObject_Create($strControlId = null) {
        $this->lstIdPerfilObject = new QListBox($this->objParentObject, $strControlId);
        $this->lstIdPerfilObject->Name = QApplication::Translate('Perfil');
        $this->lstIdPerfilObject->AddItem(QApplication::Translate('- Select One -'), null);
        $objIdPerfilObjectArray = Perfil::LoadAll();
        if ($objIdPerfilObjectArray)
            foreach ($objIdPerfilObjectArray as $objIdPerfilObject) {
                $objListItem = new QListItem($objIdPerfilObject->Descripcion, $objIdPerfilObject->IdPerfil);
                if (($this->objDocente->IdPerfilObject) && ($this->objDocente->IdPerfilObject->IdPerfil == $objIdPerfilObject->IdPerfil))
                    $objListItem->Selected = true;
                $this->lstIdPerfilObject->AddItem($objListItem);
            }

        return $this->lstIdPerfilObject;
    }

    public function lstDesignaciones_Create($strControlId = null) {
        $this->lstDesignaciones = new QAjaxAutoCompleteTextBox($this->objParentObject, 'DesignacionAutocomplete', $strControlId);
        $this->lstDesignaciones->Name = QApplication::Translate('Designación');
        return $this->lstDesignaciones;
    }

    public function txtSexo_Create($strControlId = null) {
        $this->txtSexo = new QListBox($this->objParentObject, $strControlId);
        $this->txtSexo->Name = QApplication::Translate('Sexo');
        $objListItem = new QListItem("--", null);
        $this->txtSexo->AddItem($objListItem);
        $objListItem = new QListItem("Masculino", "M");
        $this->txtSexo->AddItem($objListItem);
        $objListItem = new QListItem("Masculino", "M");
        $this->txtSexo->AddItem($objListItem);
        return $this->txtSexo;
    }

    public function txtNivel_Create($strControlId = null) {
        $this->txtNivel = new QAjaxAutoCompleteTextBox($this->objParentObject, 'NivelAutocomplete', $strControlId);
        $this->txtNivel->Name = QApplication::Translate('Nivel');
        return $this->txtNivel;
    }

    public function lstCreatedbyObject_Create($strControlId = null) {
        $lblCreatedBy = $this->lblCreatedby_Create($strControlId);
        $lblCreatedBy->Name = QApplication::Translate("Creado por");
        return $lblCreatedBy;
        //return $this->lblCreatedby_Create($strControlId);
    }

    public function lstModifiedbyObject_Create($strControlId = null) {
        $lblModifiedBy = $this->lblModifiedby_Create($strControlId);
        $lblModifiedBy->Name = QApplication::Translate("Modificado por");
        return $lblModifiedBy;
        //return $this->lblModifiedby_Create($strControlId);
    }

    public function calDatecreated_Create($strControlId = null) {
        return $this->lblDatecreated_Create($strControlId);
    }

    public function lblDatecreated_Create($strControlId = null, $strDateTimeFormat = null) {
        $this->lblDatecreated = new QLabel($this->objParentObject, $strControlId);
        $this->lblDatecreated->Name = QApplication::Translate('Fecha de Creación');
        if ($this->blnEditMode) {
            $this->lblDatecreated->Text = $this->Docente->Datecreated->__toString(QDateTimeCustom::FormatApp);
            return $this->lblDatecreated;
        } else {
            return null;
        }
    }

    public function Bind() {
        // Update any fields for controls that have been created
        if ($this->lstIdPerfilObject)
            $this->objDocente->IdPerfil = $this->lstIdPerfilObject->SelectedValue;
        if ($this->txtNombre)
            $this->objDocente->Nombre = $this->txtNombre->Text;
        if ($this->txtApellido)
            $this->objDocente->Apellido = $this->txtApellido->Text;
        if ($this->txtCuit)
            $this->objDocente->Cuit = $this->txtCuit->Text;
        if ($this->chkActivo)
            $this->objDocente->Activo = $this->chkActivo->Checked;
        if ($this->txtDni)
            $this->objDocente->Dni = $this->txtDni->Text;
        if ($this->txtSexo)
            $this->objDocente->Sexo = $this->txtSexo->SelectedValue;
        if ($this->calFechaNacimiento)
            $this->objDocente->FechaNacimiento = $this->calFechaNacimiento->DateTime;
        if ($this->txtModalidad)
            $this->objDocente->Modalidad = $this->txtModalidad->Text;
        if ($this->txtNivel)
            $this->objDocente->Nivel = $this->txtNivel->Text;
        if ($this->chkEnActividad)
            $this->objDocente->EnActividad = $this->chkEnActividad->Checked;
        if ($this->calFechaInicioLicencia)
            $this->objDocente->FechaInicioLicencia = $this->calFechaInicioLicencia->DateTime;
        if ($this->calFechaFinLicencia)
            $this->objDocente->FechaFinLicencia = $this->calFechaFinLicencia->DateTime;
        if ($this->txtMotivoLicencia)
            $this->objDocente->MotivoLicencia = $this->txtMotivoLicencia->Text;
        if ($this->chkLicenciaGoceHaberes)
            $this->objDocente->LicenciaGoceHaberes = $this->chkLicenciaGoceHaberes->Checked;
    }

    /**
     * This will save this object's Docente instance,
     * updating only the fields which have had a control created for it.
     */
    public function SaveDocente() {
        try {
            $this->Bind();
            // Update any UniqueReverseReferences (if any) for controls that have been created for it
            // Save the Docente object
            $idReturn = $this->objDocente->Save();

            // Finally, update any ManyToManyReferences (if any)
            //$this->lstDesignaciones_Update();
            $this->lstLocalizaciones_Update();
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        return $idReturn;
    }

    protected function lstLocalizaciones_Update() {
        if ($intIdLocalizacion = Session::GetSessionVar('IdLocalizacion')) {
            $objLocalizacion = Localizacion::LoadByIdLocalizacionIdDocente($intIdLocalizacion, $this->objDocente->IdDocente);
            if (!$objLocalizacion) {
                $this->objDocente->AssociateLocalizacion(Localizacion::Load($intIdLocalizacion));
            }
        }
    }

}

?>