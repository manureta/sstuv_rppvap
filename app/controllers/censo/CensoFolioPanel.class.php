<?php

class CensoFolioPanel extends CensoGrupoFamiliarIndexPanel {

    public $strTitulo = 'Censo/Adjudicación';
    public $strSubtitulo = '';

    public $btnSiguente;

    public $objFolio;
    public $objCenso;
    public $txtCodFolioOriginal;
    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            $this->objCenso=CensoGrupoFamiliar::QuerySingle(QQ::Equal(QQN::CensoGrupoFamiliar()->IdFolio,QApplication::QueryString("id")));
            $editar_o_nuevo=($this->objCenso->CensoGrupoFamiliarId)? $this->objCenso->CensoGrupoFamiliarId : null;
            parent::__construct($objParentObject,$strControlsArray,$editar_o_nuevo,QApplication::QueryString("id"));
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        if(Permission::EsDuplicado($this->objFolio->Id)){
          $this->txtCodFolioOriginal=Folio::load($this->objFolio->FolioOriginal)->CodFolio;
        }
       
    }

     public function CensoGrupoFamiliarEditPanel_Create($intCensoGrupoFamiliarId = null) {
        if (isset($this->pnlEditCensoGrupoFamiliar))
            $this->Form->RemoveControl($this->pnlEditCensoGrupoFamiliar->ControlId);
        
        $this->pnlEditCensoGrupoFamiliar = new CensoGrupoFamiliarEditPanel($this, array(), $intCensoGrupoFamiliarId);
        $this->pnlEditCensoGrupoFamiliar->lstIdFolioObject->Value = $this->objFolio->Id;

        $this->pnlEditCensoGrupoFamiliar->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEditCensoGrupoFamiliar->lstIdFolioObject->Enabled = false;
        $this->pnlEditCensoGrupoFamiliar->calFechaAlta->DateTime=QDateTime::Now();
        $this->pnlEditCensoGrupoFamiliar->calFechaAlta->Visible=false;
        return $this->pnlEditCensoGrupoFamiliar;
    }

}
?>
