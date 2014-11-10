<?php
class FolioEditPanelGen extends EditPanelBase {
    // Local instance of the FolioMetaControl
    public $mctFolio;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtCodFolio' => true,
        'lstIdPartidoObject' => true,
        'lstIdLocalidadObject' => true,
        'txtMatricula' => true,
        'calFecha' => true,
        'txtEncargado' => true,
        'txtNombreBarrioOficial' => true,
        'txtNombreBarrioAlternativo1' => true,
        'txtNombreBarrioAlternativo2' => true,
        'txtAnioOrigen' => true,
        'txtSuperficie' => true,
        'txtCantidadFamilias' => true,
        'lstTipoBarrioObject' => true,
        'txtObservacionCasoDudoso' => true,
        'txtJudicializado' => true,
        'txtDireccion' => true,
        'txtNumExpedientes' => true,
        'lstCondicionesSocioUrbanisticasAsId' => true,
        'lstRegularizacionAsId' => true,
        'lstUsoInterno' => true,
        'lstNomenclaturaAsId' => false,
    );


    protected function metaControl_Create($strControlsArray){
        // Construct the FolioMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctFolio = FolioMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Folio's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctFolio->lblId_Create();
        if (in_array('txtCodFolio',$strControlsArray)) 
            $this->objControlsArray['txtCodFolio'] = $this->mctFolio->txtCodFolio_Create();
        if (in_array('lstIdPartidoObject',$strControlsArray)) 
            $this->objControlsArray['lstIdPartidoObject'] = $this->mctFolio->lstIdPartidoObject_Create();
        if (in_array('lstIdLocalidadObject',$strControlsArray)) 
            $this->objControlsArray['lstIdLocalidadObject'] = $this->mctFolio->lstIdLocalidadObject_Create();
        if (in_array('txtMatricula',$strControlsArray)) 
            $this->objControlsArray['txtMatricula'] = $this->mctFolio->txtMatricula_Create();
        if (in_array('calFecha',$strControlsArray)) 
            $this->objControlsArray['calFecha'] = $this->mctFolio->calFecha_Create();
        if (in_array('txtEncargado',$strControlsArray)) 
            $this->objControlsArray['txtEncargado'] = $this->mctFolio->txtEncargado_Create();
        if (in_array('txtNombreBarrioOficial',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioOficial'] = $this->mctFolio->txtNombreBarrioOficial_Create();
        if (in_array('txtNombreBarrioAlternativo1',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioAlternativo1'] = $this->mctFolio->txtNombreBarrioAlternativo1_Create();
        if (in_array('txtNombreBarrioAlternativo2',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioAlternativo2'] = $this->mctFolio->txtNombreBarrioAlternativo2_Create();
        if (in_array('txtAnioOrigen',$strControlsArray)) 
            $this->objControlsArray['txtAnioOrigen'] = $this->mctFolio->txtAnioOrigen_Create();
        if (in_array('txtSuperficie',$strControlsArray)) 
            $this->objControlsArray['txtSuperficie'] = $this->mctFolio->txtSuperficie_Create();
        if (in_array('txtCantidadFamilias',$strControlsArray)) 
            $this->objControlsArray['txtCantidadFamilias'] = $this->mctFolio->txtCantidadFamilias_Create();
        if (in_array('lstTipoBarrioObject',$strControlsArray)) 
            $this->objControlsArray['lstTipoBarrioObject'] = $this->mctFolio->lstTipoBarrioObject_Create();
        if (in_array('txtObservacionCasoDudoso',$strControlsArray)) 
            $this->objControlsArray['txtObservacionCasoDudoso'] = $this->mctFolio->txtObservacionCasoDudoso_Create();
        if (in_array('txtJudicializado',$strControlsArray)) 
            $this->objControlsArray['txtJudicializado'] = $this->mctFolio->txtJudicializado_Create();
        if (in_array('txtDireccion',$strControlsArray)) 
            $this->objControlsArray['txtDireccion'] = $this->mctFolio->txtDireccion_Create();
        if (in_array('txtNumExpedientes',$strControlsArray)) 
            $this->objControlsArray['txtNumExpedientes'] = $this->mctFolio->txtNumExpedientes_Create();
        if (in_array('lstCondicionesSocioUrbanisticasAsId',$strControlsArray)) 
            $this->objControlsArray['lstCondicionesSocioUrbanisticasAsId'] = $this->mctFolio->lstCondicionesSocioUrbanisticasAsId_Create();
        if (in_array('lstRegularizacionAsId',$strControlsArray)) 
            $this->objControlsArray['lstRegularizacionAsId'] = $this->mctFolio->lstRegularizacionAsId_Create();
        if (in_array('lstUsoInterno',$strControlsArray)) 
            $this->objControlsArray['lstUsoInterno'] = $this->mctFolio->lstUsoInterno_Create();
        if (in_array('lstNomenclaturaAsId',$strControlsArray))
            $this->objControlsArray['lstNomenclaturaAsId'] = $this->mctFolio->lstNomenclaturaAsId_Create();        

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Folio::GenderMale() ? 'e' : 'a'), Folio::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctFolio->EditMode;
        }
    }

    

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the FolioMetaControl
        $this->mctFolio->DeleteFolio();
        $this->btnCancel_Click();
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
            case 'Modal': 
                if (!isset($this->mdlPanel)) $this->mdlPanel_Create();
                return $this->mdlPanel;
            default: 
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function __set($strName, $mixValue) {
        $this->blnModified = true;
        if (is_array($this->objControlsArray) &&
                $mixValue instanceof QControl) { //solo dejo agregar controles
            return $this->objControlsArray[$strName] = $mixValue;
        }
        try {
            parent::__set($strName, $mixValue);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

}
?>
