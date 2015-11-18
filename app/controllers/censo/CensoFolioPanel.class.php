<?php

class CensoFolioPanel extends HogarIndexPanel {

    public $strTitulo = 'Censo/Adjudicación';
    public $strSubtitulo = '';

    public $btnSiguente;

    public $objFolio;
    public $objCenso;
    public $txtCodFolioOriginal;
    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            $this->objCenso=Hogar::QuerySingle(QQ::Equal(QQN::Hogar()->IdFolio,QApplication::QueryString("id")));
            $editar_o_nuevo=($this->objCenso->Id)? $this->objCenso->Id : null;
            parent::__construct($objParentObject,$strControlsArray,$editar_o_nuevo,QApplication::QueryString("id"));
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        $this->dtgHogares->AddCondition(QQ::Equal(QQN::Hogar()->IdFolio,QApplication::QueryString("id")));
        $this->dtgHogares->ShowFilter=true;
        if(Permission::EsDuplicado($this->objFolio->Id)){
          $this->txtCodFolioOriginal=Folio::load($this->objFolio->FolioOriginal)->CodFolio;
        }

    }

     public function HogarEditPanel_Create($intId = null) {
        if (isset($this->pnlEditHogar))
            $this->Form->RemoveControl($this->pnlEditHogar->ControlId);

        $this->pnlEditHogar = new HogarEditPanel($this, array(), $intId);        

        if(is_null($intId)){
            $this->pnlEditHogar->lstIdFolioObject->Value = $this->objFolio->Id;
            $this->pnlEditHogar->calFechaAlta->DateTime=QDateTime::Now();
        }

        $this->pnlEditHogar->lstIdFolioObject->Visible = false;
    
        return $this->pnlEditHogar;
    }

}
?>
