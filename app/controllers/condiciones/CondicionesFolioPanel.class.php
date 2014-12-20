<?php

class CondicionesFolioPanel extends CondicionesSocioUrbanisticasEditPanel {

    public $strTitulo = 'Condiciones Socio-Urbanisticas';
    public $strSubtitulo = '';

    public $btnSiguente;

    public $objFolio;
    public $objCond;

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
                        
        try {
            $this->objCond=CondicionesSocioUrbanisticas::QuerySingle(QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio,QApplication::QueryString("id")));
            $editar_o_nuevo=($this->objCond->Id)? $this->objCond->Id : null;
            parent::__construct($objParentObject,$strControlsArray,$editar_o_nuevo,QApplication::QueryString("id"));
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
       // $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        //$this->dtgCondicionesSocioUrbanisticases->AddCondition(QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio,QApplication::QueryString("id")));

        

    }
/*
    public function CondicionesSocioUrbanisticasEditPanel_Create($intId = null) {
        if (isset($this->pnlEditCondicionesSocioUrbanisticas))
            $this->Form->RemoveControl($this->pnlEditCondicionesSocioUrbanisticas->ControlId);
        
        $this->pnlEditCondicionesSocioUrbanisticas = new CondicionesSocioUrbanisticasEditPanel($this, $this->strControlsArray, $intId);
        $this->pnlEditCondicionesSocioUrbanisticas->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEditCondicionesSocioUrbanisticas->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEditCondicionesSocioUrbanisticas->lstIdFolioObject->Enabled = false;
        return $this->pnlEditCondicionesSocioUrbanisticas;
    }
*/
}
?>
