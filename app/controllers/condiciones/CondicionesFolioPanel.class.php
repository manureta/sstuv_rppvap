<?php

class CondicionesFolioPanel extends CondicionesSocioUrbanisticasIndexPanel {

    public $strTitulo = 'Condiciones Socio-Urbanisticas';
    public $strSubtitulo = '';

    public $btnSiguente;

    protected $objFolio;
    

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
                        
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        $this->dtgCondicionesSocioUrbanisticases->AddCondition(QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio,QApplication::QueryString("id")));

        

    }

    public function CondicionesSocioUrbanisticasEditPanel_Create($intId = null) {
        if (isset($this->pnlEditCondicionesSocioUrbanisticas))
            $this->Form->RemoveControl($this->pnlEditCondicionesSocioUrbanisticas->ControlId);
        
        $this->pnlEditCondicionesSocioUrbanisticas = new CondicionesSocioUrbanisticasEditPanel($this, $this->strControlsArray, $intId);
        $this->pnlEditCondicionesSocioUrbanisticas->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEditCondicionesSocioUrbanisticas->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEditCondicionesSocioUrbanisticas->lstIdFolioObject->Enabled = false;
        return $this->pnlEditCondicionesSocioUrbanisticas;
    }

}
?>