<?php
require(__DATAGEN_CLASSES__ . '/HogarGen.class.php');

class Hogar extends HogarGen {
    protected $strNoun = 'Hogar';
    protected $strNounPlural = 'Hogares';
    protected $blnGenderMale = true;
    //public $strParentPrimaryKeyProperty = 'Id';

    public function __toString() {
        return sprintf('Hogar %s',  $this->intId);
    }

  //quickfix: Sobreescribo este metodo por Undefined GET property or variable in 'Hogar' class: IdHogar
  public function __get($strName) {
    switch ($strName) {
        ///////////////////
        // Member Variables
        ///////////////////
        case 'Id':
            /**
             * Gets the value for intId (Read-Only PK)
             * @return integer
             */
            return $this->intId;

        case 'IdFolio':
            /**
             * Gets the value for intIdFolio (Not Null)
             * @return integer
             */
            return $this->intIdFolio;

        case 'FechaAlta':
            /**
             * Gets the value for dttFechaAlta (Not Null)
             * @return QDateTime
             */
            return $this->dttFechaAlta;

        case 'Circ':
            /**
             * Gets the value for strCirc (Not Null)
             * @return string
             */
            return $this->strCirc;

        case 'Secc':
            /**
             * Gets the value for strSecc (Not Null)
             * @return string
             */
            return $this->strSecc;

        case 'Mz':
            /**
             * Gets the value for strMz (Not Null)
             * @return string
             */
            return $this->strMz;

        case 'Pc':
            /**
             * Gets the value for strPc (Not Null)
             * @return string
             */
            return $this->strPc;

        case 'Telefono':
            /**
             * Gets the value for strTelefono
             * @return string
             */
            return $this->strTelefono;

        case 'DeclaracionNoOcupacion':
            /**
             * Gets the value for blnDeclaracionNoOcupacion
             * @return boolean
             */
            return $this->blnDeclaracionNoOcupacion;

        case 'TipoDocAdj':
            /**
             * Gets the value for strTipoDocAdj
             * @return string
             */
            return $this->strTipoDocAdj;

        case 'DocTerreno':
            /**
             * Gets the value for strDocTerreno
             * @return string
             */
            return $this->strDocTerreno;

        case 'TipoBeneficio':
            /**
             * Gets the value for strTipoBeneficio
             * @return string
             */
            return $this->strTipoBeneficio;

        case 'FormaOcupacion':
            /**
             * Gets the value for strFormaOcupacion
             * @return string
             */
            return $this->strFormaOcupacion;

        case 'FechaIngreso':
            /**
             * Gets the value for strFechaIngreso
             * @return string
             */
            return $this->strFechaIngreso;


        ///////////////////
        // Member Objects
        ///////////////////
        case 'IdFolioObject':
            /**
             * Gets the value for the Folio object referenced by intIdFolio (Not Null)
             * @return Folio
             */
            try {
                if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                    $this->objIdFolioObject = Folio::Load($this->intIdFolio);
                return $this->objIdFolioObject;
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }


        ////////////////////////////
        // Virtual Object References (Many to Many and Reverse References)
        // (If restored via a "Many-to" expansion)
        ////////////////////////////

        case 'OcupanteAsId':
            /**
             * Gets the value for the private _objOcupanteAsId (Read-Only)
             * if set due to an expansion on the ocupante.id_hogar reverse relationship
             * @return Ocupante
             */
            return $this->objOcupanteAsId;

        case 'OcupanteAsIdArray':
            /**
             * Gets the value for the private _objOcupanteAsIdArray (Read-Only)
             * if set due to an ExpandAsArray on the ocupante.id_hogar reverse relationship
             * @return Ocupante[]
             */
            if(is_null($this->objOcupanteAsIdArray))
                $this->objOcupanteAsIdArray = $this->GetOcupanteAsIdArray();
            return (array) $this->objOcupanteAsIdArray;


        case '__Restored':
            return $this->__blnRestored;

        case 'IdHogar':
            return $this->intId;

        default:
            try {
                return parent::__get($strName);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
    }
}

}
?>
