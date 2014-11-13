<?php
/**
 * Este es un panel índice que hereda de NomenclaturaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class NomenclaturaFolioPanel extends NomenclaturaIndexPanel {

    public $strTitulo = 'Nomenclatura Catastral';
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
        $this->dtgNomenclaturas->AddCondition(QQ::Equal(QQN::Nomenclatura()->IdFolio,QApplication::QueryString("id")));

        

        //$this->btnSiguente = new QButton($this);
        //$this->btnSiguente->Text = 'Siguiente';
        //$this->btnSiguente->AddAction(new QClickEvent(), new QJavascriptAction("document.location='/pagina3'"));


    }

    public function NomenclaturaEditPanel_Create($intId = null) {
        if (isset($this->pnlEditNomenclatura))
            $this->Form->RemoveControl($this->pnlEditNomenclatura->ControlId);
        
        $this->pnlEditNomenclatura = new NomenclaturaEditPanel($this, $this->strControlsArray, $intId);
        $this->pnlEditNomenclatura->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEditNomenclatura->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEditNomenclatura->lstIdFolioObject->Enabled = false;
        return $this->pnlEditNomenclatura;
    }

}
?>