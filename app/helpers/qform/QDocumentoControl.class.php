<?php

class QDocumentoControl extends QTextBox {


    public $intMaxLength = 10;
    public $intMinLength = 5;
    public $strLabelForTooShort = '%s debe tener al menos %s caracteres';
    public $strLabelForTooShortUnnamed = 'Debe tener al menos %s caracteres';

    public $strLabelForTooLong = '%s debe tener como máximo %s caracteres';
    public $strLabelForTooLongUnnamed = 'Debe tener como máximo %s caracteres';
    public function Validate() {
        $blnValid = parent::Validate();
        if (!ctype_alnum($this->strText)) {
            $this->strValidationError = 'El Documento de Identidad debe ser alfanumérico';
            $blnValid = false;
        }
        
        return $blnValid;
    }
}
