<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CuadroInfinitoControl extends CuadroControl {

    public $btnNewRow;
    protected $arrFilas;
    

    /**
     * Constructor for CuadroInfinitoControl
     * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
     * @param CuadroDAO $objCuadroDao contiene el CuadroDao a controlar
     * @param string $strControlId optional control ID
     */
    public function __construct($objParent, CuadroDAO $objCuadroDao, $strControlId = null, $blnReadOnly = false) {
        $this->strTemplate = __VIEW_DIR__.'/cuadros/CuadroInfinitoPanel.tpl.php';
        try {
            parent::__construct($objParent, $objCuadroDao, $strControlId, $blnReadOnly);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!$this->strTemplate)
            $this->strTemplate = __VIEW_DIR__.'/cuadros/CuadroInfinitoPanel.tpl.php';
        $this->btnNewRow = new QButton($this, 'btnadd'.$objCuadroDao->Cuadro->IdDefinicionCuadro);
        $this->btnNewRow->AddCssClass("agregarfila_button");
        $this->btnNewRow->Text = "Agregar Fila";
        $this->btnNewRow->AddAction(new QClickEvent(), new QJavaScriptAction(sprintf("AddNewFila('%s')",$this->ControlId)));

        if (!$this->blnReadOnly) {
            for ($i = 0; $i<($this->Cuadro->CantidadFilasCrear - $this->Cuadro->CountFilas); $i++) {
                $this->Cuadro->AddNewFila();
            }        
        }
        $arrUsuInfo = Authentication::GetUsuarioInfo();
        if (!$arrUsuInfo) {
            $this->btnNewRow->Visible = false;
        }

    }

    /**
     * If this control needs to update itself from the $_POST data, the logic to do so
     * will be performed in this method.
     */
    public function ParsePostData() {
        parent::ParsePostData();
        if (is_array($_POST)) {
            foreach ($_POST as $strKey => $strValue) {
                $arrVals = array();
                $objFila = null;
                if (strpos($strKey, 'inp_'.$this->objCuadro->IdCuadro) !== false) {
                    $arrVals = explode('_', $strKey);
                    $strIdFila = $arrVals[2];
                    $strIdColumna = $arrVals[3];
                    if (!($objFila = $this->objCuadro->GetFila($strIdFila))) {
                        $objFila = $this->objCuadro->AddNewFila();
                        $objFila->IdFila = $strIdFila;
                    }
                    $objCelda = $objFila->GetCeldaByIdColumna($strIdColumna);
                    $objCelda->Valor = $strValue;
                }
            }
        }
    }

    /**
     * If this control has validation rules, the logic to do so
     * will be performed in this method.
     * @return boolean
     */
    //public function Validate() { return $this->objCuadro->Validate();}

    // For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
    public function GetEndScript() {
        $strToReturn = parent::GetEndScript();
        //TODO completar las filas mínimas llamando N veces a agregar fila en el navegador
        return $strToReturn."\n";
    }


}

?>
