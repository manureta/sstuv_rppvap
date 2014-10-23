<?php

class Columna {
    protected $objCuadro;
    protected $strNombre;
    protected $intAncho;
    protected $intOrden;
    protected $intIdDefinicionColumna;
    protected $arrPosiblesValores = array();
    protected $strTablaTipo;
    protected $strCodigoRelacional;
    
    /**
     * Tipo de dato de la columna, debe ser un TipoDatoType
     * @var TipoDatoType
     */
    protected $intTipoDato;
    protected $blnColumnaPadreRendered = false; //TODO usar! 

    public function  __construct() {
    }

    public function AddColumnaHijo($objColumnaHijo) {
        array_push($this->arrColumnasHijos, $objColumnaHijo);
        //$this->objColumnaPadre = $objColumnaPadre;
    }

    public function GetColumnaPadre() {
        return $this->objColumnaPadre;
    }

    public function HasColumnasHijos() {
        return (count($this->arrColumnasHijos) > 0);
    }

    public function IsColumnaPadreRendered() {
        return $this->blnColumnaPadreRendered;
    }

    public function  __get($strName) {
        switch ($strName) {
            case 'Nombre':
                return $this->strNombre;
            case 'TipoDato':
                return $this->intTipoDato;
            case 'Cuadro':
                return $this->objCuadro;
            case 'Ancho':
                return $this->intAncho;
            case 'Orden':
                return $this->intOrden;
            case 'IdColumna':
            case 'IdDefinicionColumna':
                return $this->intIdDefinicionColumna;
            case 'PosiblesValores':
                return $this->arrPosiblesValores;
            case 'TablaTipo':
                return $this->strTablaTipo;
            case 'CodigoRelacional':
                return $this->strCodigoRelacional;

        }
        throw new QUndefinedPropertyException('GET', 'Columna', $strName);
    }

    public function  __set($strName, $mixValue) {
        switch ($strName) {
            case 'Nombre':
                return $this->strNombre = QType::Cast($mixValue, QType::String);
            case 'TipoDato':
                return $this->intTipoDato = QType::Cast($mixValue, QType::Integer);
            case 'Cuadro':
                return $this->objCuadro = $mixValue;
            case 'Ancho':
                return $this->intAncho = QType::Cast($mixValue, QType::Integer);
            case 'Orden':
                return $this->intOrden = QType::Cast($mixValue, QType::Integer);
            case 'IdColumna':
            case 'IdDefinicionColumna':
                return $this->intIdDefinicionColumna = QType::Cast($mixValue, QType::Integer);;
            case 'PosiblesValores':
                return $this->arrPosiblesValores = $mixValue;
            case 'TablaTipo':
                return $this->strTablaTipo = $mixValue;
            case 'CodigoRelacional':
                return $this->strCodigoRelacional = $mixValue;

        }
        throw new QUndefinedPropertyException('SET', 'Columna', $strName);
    }

    public function  __toString() {
        return sprintf('%s', $this->strNombre);
    }
   
    public function DeleteValor($intValor) {
        if (array_key_exists($intValor, $this->PosiblesValores)) {
            unset($this->arrPosiblesValores[$intValor]);
        }
    }
 
    /**
     * Devuelve true si la columna está vacía.
     * 
     * @param boolean $blnTomarCeroComoVacio
     * @return boolean
     */
    public function IsEmpty($blnTomarCeroComoVacio = false) {
        foreach($this->objCuadro->GetFilas() as $objFila) {
            $objCelda = $objFila->GetCelda($this);
            $value = $objCelda->Valor;
            if($value !== '' && $value !== null)
                if (!$blnTomarCeroComoVacio || $value !== '0')
                    return false;
        }
        return true;
    }
}

?>
