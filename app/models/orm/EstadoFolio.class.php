<?php
require(__DATAGEN_CLASSES__ . '/EstadoFolioGen.class.php');

class EstadoFolio extends EstadoFolioGen {

    const CARGA = 1;
    const ENVIADO_ESPERA = 2;
    const VALIDACION = 3;
    const NO_CORRESPONDE = 4;
    const NOTIFICACION = 5;
    const CONFIRMACION = 6;
    const INSCRIPCION = 7;
    const OBJETADO = 8;
    const NECESITA_AUTORIZACION = 9;
    const FOLIO_DUPLICADO = 10;

    protected $strNoun = 'EstadoFolio';
    protected $strNounPlural = 'EstadoFolios';
    protected $blnGenderMale = true;

    public function __toString() {
        //return $this->strDescripcion;
        return sprintf('%s - %s',  $this->intId,$this->strDescripcion);
    }

}
?>
