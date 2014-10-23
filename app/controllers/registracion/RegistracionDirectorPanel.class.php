<?php

class RegistracionDirectorPanel extends RegistracionBasePanel {
    protected $strPerfil = 'Director';
    
    protected function CrearUsuario() {
        $strCuit = $this->strNombreUsuario = str_replace('-', '', $this->txtCuit->Text);
        if ($this->objPersonalEncontrado) {
            $this->mctPersonal->objPersonal = $this->objPersonalEncontrado;
        } else {
            $this->mctPersonal->objPersonal->Cuit = $strCuit;
        }
        $this->mctPersonal->objPersonal->Activo = true;
        $this->mctPersonal->SavePersonal();
   
        $this->mctUsuario->objUsuario->SuperAdmin = false;
        $this->mctUsuario->objUsuario->FechaActivacion = QDateTime::Now();
        $this->mctUsuario->objUsuario->Nombre = $this->strNombreUsuario;
        $this->mctUsuario->objUsuario->IdPersonal = $this->mctPersonal->objPersonal->IdPersonal;
        $this->mctUsuario->objUsuario->IdPerfilObject = $this->getPerfilRegistracion();
        $this->mctUsuario->SaveUsuario();
        
        return true;
        
        
    }


}

?>
