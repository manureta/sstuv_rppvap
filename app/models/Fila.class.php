<?php
class Fila {

    protected $intIdDefinicionFila;
    protected $objCuadro;
    protected $strNombre;
    protected $arrCeldas;
    protected $intOrden;
    protected $strTablaTipo;
    protected $strCodigoRelacional;
    
    public function  __construct(){
    }

    public function CrearCeldas() {
        foreach ($this->objCuadro->GetColumnas() as $idxc => $objColumna) {
            $objCelda = new Celda();
            $objCelda->Columna = $objColumna;
            $objCelda->Fila = $this;
            $objCelda->Cuadro = $this->objCuadro;
            $objCelda->IdDefinicionCelda = ltrim(sprintf("%06d%06d%06d", $this->objCuadro->IdDefinicionCuadro, $this->IdDefinicionFila, $objColumna->IdDefinicionColumna), '0');
            $objCelda->Disabled = false;
            //DefinicionCelda::LoadSingleByIdColumnaIdFilaIdCuadro($objColumna->IdDefinicionColumna, $this->IdDefinicionFila, $this->objCuadro->IdDefinicionCuadro);
            //if(!$objCelda->DefinicionCelda) throw new QCallerException(sprintf("No hay DefinicionCelda para IdDefinicionColumna:%s IdDefinicionFila:%s IdDefinicionCuadro:%s", $objColumna->IdDefinicionColumna, $this->IdDefinicionFila, $this->objCuadro->IdDefinicionCuadro));
            $this->AddCelda($objCelda);
        }
    }

    public function Reset() {
        foreach ($this->GetCeldas() as $objCelda) {
            $objCelda->Reset();
        }
    }

    protected function AddCelda(Celda $objCelda) {
        $this->arrCeldas[$objCelda->Columna->IdColumna] = $objCelda;
    }

    /**
     * Devuelve un array de Celdas.
     * @return Celda[]
     */
    public function GetCeldas() {
        if (!$this->arrCeldas) {
            $this->CrearCeldas();
        }
        return $this->arrCeldas;
    }

    public function DeshabilitarCeldas($arrIdToDisabled) {
        foreach($this->arrCeldas as $objCelda) {
            if(in_array($objCelda->IdDefinicionCelda, $arrIdToDisabled))
                $objCelda->Disabled = true;
        }
    }

    public function GetCelda(Columna $objColumna) {
        if (!$this->arrCeldas) {
            $this->CrearCeldas();
        }
        if (array_key_exists($objColumna->IdColumna, $this->arrCeldas))
            return $this->arrCeldas[$objColumna->IdColumna];
        throw new QCallerException(sprintf('ERROR: La columna %d no se cruza con la fila %d en el cuadro %d', $objColumna->IdColumna, $this->IdFila, $this->objCuadro->IdCuadro));
    }

    public function GetCeldaByIdColumna($intIdColumna) {
        if (!$this->arrCeldas) {
            $this->CrearCeldas();
        }
        if (array_key_exists($intIdColumna, $this->arrCeldas))
            return $this->arrCeldas[$intIdColumna];
        throw new QCallerException(sprintf('ERROR: La columna %d no se cruza con la fila %d en el cuadro %d', $intIdColumna, $this->IdFila, $this->objCuadro->IdCuadro));
    }

      public function IsIncomplete($blnTomarCeroComoVacio = false) {
        $arrTipoCheckbox = array(TipoDatoType::BOOLEAN,
            TipoDatoType::RADIOCHECK_HORIZONTAL,
            TipoDatoType::RADIOCHECK_UNICO,
            TipoDatoType::RADIOCHECK_VERTICAL);
        
        switch ($this->objCuadro->CriterioCompletitud) {
            case CriterioCompletitudType::Todafilacondatosestecompleta:
            case CriterioCompletitudType::Todaslasceldascompletas:
                $blnFilaHasData = false;
                $blnFilaHasEmpty = false;
                $blnFilaHasCheckbox = false;
                $blnFilaHasCheckboxChecked = false;
                
                foreach ($this->GetCeldas() as $objCelda) {
                    if ($objCelda->Disabled) continue;
                    if (in_array($objCelda->Columna->TipoDato,$arrTipoCheckbox)) {
                        $blnFilaHasCheckbox = true;
                        if ($objCelda->Valor) {
                            $blnFilaHasData = true;
                            $blnFilaHasCheckboxChecked = true;
                        }
                        continue;
                    }
                    if ($objCelda->Valor === '' || $objCelda->Valor === null) {
                        if ($blnFilaHasData) return $objCelda;
                        $blnFilaHasEmpty = true;
                    } else {
                        if ($blnFilaHasEmpty) return $objCelda;
                        $blnFilaHasData = true;
                    }
                }
                // Si está vacío devuelvo true (teniendo en cuenta que este método se usa en las consistencias, para saber si tomar en cuenta la fila o no)
                if (!$blnFilaHasData) return $objCelda;
                // Si tiene datos y tiene una celda vacía, o ningún checkbox tildado devuelvo true, sino false
                if ($blnFilaHasEmpty || ($blnFilaHasCheckbox && !$blnFilaHasCheckboxChecked))
                    return $objCelda;
                else return false;
                
            case CriterioCompletitudType::Algundato:
                foreach ($this->arrCeldas as $objCelda) {
                    if (!is_null($objCelda->Valor) && $objCelda->Valor !== '')
                        if (!$blnTomarCeroComoVacio || $objCelda->Valor !== '0')
                            return true;
                }
                return false;
            
        }
        /*
        //$CeldaVacia = False;
        //$CantidadFilaCompleta = 0;
        $intCriterioCompletitud = $this->objCuadro->CriterioCompletitud;
        if ($intCriterioCompletitud == CriterioCompletitudType::Todafilacondatosestecompleta ||
                $intCriterioCompletitud == CriterioCompletitudType::Todaslasceldascompletas) {
//            foreach($this->arrCeldas as $objCelda ) {
//                if ($objCelda->Disabled) continue;
//                if(in_array($objCelda->Columna->TipoDato,$arrTipoCheckbox))continue;
//               if(is_null($objCelda->Valor) || $objCelda->Valor == '' ||
//                        ($blnTomarCeroComoVacio && $objCelda->Valor == '0'))
//                    return true;
//            }
//            return false;

            
            
            

            
            
            
        }
        else {
            if ($intCriterioCompletitud == CriterioCompletitudType::Algundato) {
                foreach ($this->arrCeldas as $objCelda) {
                    if (!is_null($objCelda->Valor) && $objCelda->Valor !== '')
                        if (!$blnTomarCeroComoVacio || $objCelda->Valor !== '0')
                            return true;
                }
                return false;
            }
        }
         * 
         */
    }

  

    /**
     * Devuelve true si la fila está vacía.
     * 
     * @param boolean $blnTomarCeroComoVacio
     * @return boolean
     */
    public function IsEmpty($blnTomarCeroComoVacio = false) {
        foreach($this->arrCeldas as $objCelda ) {
            $value = $objCelda->Valor;
            if($value !== '' && $value !== null)
                if (!$blnTomarCeroComoVacio || $value !== '0')
                    return false;
        }
        return true;
    }
    
    public function  __set($strName,$mixValue) {
        switch ($strName) {
            case 'Nombre':
                return $this->strNombre = $mixValue;
            case 'IdFila':
            case 'IdDefinicionFila':
                return $this->intIdDefinicionFila = (int)$mixValue;
            case 'Celdas':
                return $this->arrCeldas = $mixValue;
            case 'Cuadro':
                $this->objCuadro = $mixValue;
                $this->CrearCeldas();
                return $this->objCuadro;
            case 'btnDelRow':
            case 'DelRow':
                return $this->btnDelRow = $mixValue;
            case 'Orden':
                return $this->intOrden = $mixValue;
            case 'TablaTipo':
                return $this->strTablaTipo = $mixValue;
            case 'CodigoRelacional':
                return $this->strCodigoRelacional = $mixValue;

        }
        throw new QUndefinedPropertyException('SET', 'Fila', $strName);
    }

    public function  __get($name) {
        switch ($name) {
            case 'Nombre':
                return $this->strNombre;
            case 'Celdas':
                return $this->arrCeldas;
            case 'IdFila':
            case 'IdDefinicionFila':
                return $this->intIdDefinicionFila;
            case 'Cuadro':
                return $this->objCuadro;
            case 'btnDelRow':
            case 'DelRow':
                return $this->btnDelRow;
            case 'Orden':
                return $this->intOrden;
            case 'TablaTipo':
                return $this->strTablaTipo;
            case 'CodigoRelacional':
                return $this->strCodigoRelacional;
            case 'PrimerCelda':
                if(count($this->arrCeldas)==0)
                        return null;
                foreach($this->arrCeldas as $objCelda)return $objCelda;
        }
        throw new QUndefinedPropertyException('GET', 'Fila', $name);
    }

    public function  __toString() {
        return sprintf('%s', $this->strNombre);
    }

}
?>
