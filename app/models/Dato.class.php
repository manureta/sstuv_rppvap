<?php

class Dato {
    protected $strName;
    protected $mixValue;
    protected $strErrorMessage;
    private $blnHasError;
    protected $intErrorCode;
    protected $blnNoGuardar = false;

    public function __set($strName, $mixValue) {
        switch($strName) {
            case 'Name':
                $this->strName = $mixValue;
            break;
            case 'NoGuardar':
                $this->blnNoGuardar = (boolean)$mixValue;
            break;
            case 'ErrorCode':
                $this->intErrorCode = $mixValue;
                if ($this->intErrorCode > 0) {
                    $this->blnHasError = true;
                } else {
                    $this->blnHasError = false;
                }
            break;
            case 'ErrorMessage':
                $this->strErrorMessage = $mixValue;
                if (strlen($this->strErrorMessage)) {
                    $this->blnHasError = true;
                } else {
                    $this->blnHasError = false;
                }
            break;
            case 'Value':
                $this->mixValue = $mixValue;
            break;
        }
    }

    public function __get($strName) {
        switch($strName) {
            case 'Name':
                return $this->strName ;
            break;
            case 'NoGuardar':
                return (boolean)$this->blnNoGuardar ;
            break;
            case 'ErrorCode':
                return $this->intErrorCode ;
            break;
            case 'ErrorMessage':
                return $this->strErrorMessage ;
            break;
            case 'Value':
                return $this->mixValue ;
            break;
            case 'HasError':
                return $this->blnHasError ;
            break;
        }
    }

}
