<?php



class FormularioCompletarPanel extends EditPanelBase{
public $pnlTabs;
public $pnlFolio;
public $pnlNomenclatura;

    public function __construct($objParentObject, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;

        }
        $this->pnlTabs = new QTabPanel($this);

        $this->pnlFolio = new FolioEditPanel($this);
        //$this->pnlFolio->btnSave->Visible = false;
        $tabFolio = $this->pnlTabs->AddTab("Folio");
        $tabFolio->AddControls(array($this->pnlFolio));


        $this->pnlNomenclatura = new NomenclaturaEditPanel($this);
        $this->pnlNomenclatura->btnSave->Visible = false;
        $tabNom =$this->pnlTabs->AddTab("Nomenclatura");
        $tabNom->AddControls(array($this->pnlNomenclatura));

        //$this->blnAutoRenderChildren = true;

    }

}