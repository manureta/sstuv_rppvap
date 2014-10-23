<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @property Celda $Celda una celda
 */
class CeldaControl {
    protected $objInput;
    protected $objCelda;

    public function __get($strName) {
        switch ($strName) {
            case 'Input':
                return $this->objInput;
            case 'Celda':
                return $this->objCelda;
        }
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case 'Input':
                return $this->objInput = $mixValue;
            case 'Celda':
                $this->objCelda = $mixValue;
                if (is_null($this->objCelda->Valor))
                    $this->SetearDefaultValor();
                else
                    $this->objInput->Value = $this->objCelda->Valor;
                return $this->objCelda;
        }
    }

    public function Reset() {
        $this->SetearDefaultValor(true);
    }

    public function Actualizar() {
        if ($this->objCelda->Valor != $this->objInput->Value) {
            $this->SetearDefaultValor();
            $this->objCelda->Modificado = true;
            $this->objCelda->Valor = $this->objInput->Value;
        }
        //if ($this->objInput->Value == "2222")
            //QApplication::DisplayAlert($this->objCelda->IdDefinicionCelda . " 2222");

    }

    protected function SetearDefaultValor($blnForce = false) {
        $this->objCelda->DefaultValor = "";
        if ($blnForce) {
            $this->objCelda->Valor = $this->objCelda->DefaultValor;
            $this->SetearValor();
        }
    }
    
    protected function SetearValor() {
        $this->objInput->Value = $this->objCelda->Valor;
    }


}

?>
