<?php

/**
 * Description of BloqueControlBase
 *
 * @author hernol
 */

abstract class BloqueBase extends QPanel {

    public $pnlInconsistencias;
    protected $arrCeldaControls = array();
    protected $objBloque;
    public $mixDatoArray = array();
    protected $mixDatoPersonalBloque;
    protected $objDatoPersonalBloque;
    protected $objPersonal;

    protected $blnReadOnly;
    protected $mixIdBloque;
    protected $intIdPagina;
    protected $strTitulo;

    public $objParent;

    protected $strTemplate;

    protected $intConsistenciaArray = array();

    public function __construct($objParent, $mixIdBloque, $intIdPagina, $strControlId = null, $blnReadOnly = false) {
        try {
            parent::__construct($objParent, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objParent = $objParent;
        $this->mixIdBloque = $mixIdBloque;
        $arrUsuario = Session::GetUsuario();
        $this->objPersonal = Personal::Load($arrUsuario['IdPersonal']);
        $this->LoadData();
        $this->AddJavascriptFile("_core/integer.js");

    }

    /*
     * Es posible que se necesite de un bloque, información de otro bloque.
     */
    public static $objDatoArrayIndex;
    public static function GetBloqueDatoArray($IdPersonal,$mixIdBloque,$strName) {
        $mixValue = null;
        if(!isset($objDatoArrayIndex[$mixIdBloque])){
            $objDatoArray = array();
            $objDatoPersonalBloque = DatoPersonalBloque::LoadByIdPersonalIdBloque($IdPersonal, $mixIdBloque);
            if ($objDatoPersonalBloque) {
                $objDatoPersonalBloque->Dato && $objDatoArray = unserialize(base64_decode($objDatoPersonalBloque->Dato));
            }
            //Como puede llamarse de varias funciones en el mismo thread, y no se pueden cambiar datos de otros bloques en el mismo thread.
            //Lo cacheamos para evitar consultas demas.
            $objDatoArrayIndex[$mixIdBloque]=$objDatoArray;
        }
        $mixValue = array_key_exists($strName, (array)$objDatoArrayIndex[$mixIdBloque])?
                        $objDatoArrayIndex[$mixIdBloque][$strName]->Value:NULL;
        return $mixValue;
    }
    
    public function LoadData() {
        $objDatoArray = array();
        $this->objDatoPersonalBloque = DatoPersonalBloque::LoadByIdPersonalIdBloque($this->objPersonal->IdPersonal, $this->mixIdBloque);
        if (!$this->objDatoPersonalBloque) {
            $this->objDatoPersonalBloque = new DatoPersonalBloque();
            $this->objDatoPersonalBloque->IdPersonal = $this->objPersonal->IdPersonal;
            $this->objDatoPersonalBloque->IdBloque = $this->mixIdBloque;
            $this->objDatoPersonalBloque->Save();
        } else {
            $this->objDatoPersonalBloque->Dato && $objDatoArray = unserialize(base64_decode($this->objDatoPersonalBloque->Dato));
            if($objDatoArray)
                $this->mixDatoArray = (array)$objDatoArray;
        } 
        
    }

    public function ParsePostData() {
        // Parseo $_POST
        // It was -- update this Control's value with the new value passed in via the POST arguments
        $arrKeyDatoPost = array();
        foreach ($_POST as $strName => $mixValue) {
            switch (true) {
                case (strpos($strName,'b'.$this->mixIdBloque.'_d') !== false) :
                case (strpos($strName,'cmb_') !== false) :
                    $intIdDato = $strName;
                    if (!is_null($_POST[$intIdDato])) {
                        $arrKeyDatoPost[] = $intIdDato;
                        if (!array_key_exists($intIdDato, $this->mixDatoArray)) {
                            $objDato = new Dato();
                            $objDato->Name = $intIdDato;
                            $this->mixDatoArray[$intIdDato] = $objDato;
                        }
                        $this->mixDatoArray[$intIdDato]->Value = $this->checkCrossScripting($mixValue);
                    }
                break;
                default: // otros tipos de datos?
                break;
            }
        }
        $arrDiff = array_diff(array_keys($this->mixDatoArray), $arrKeyDatoPost);
        foreach ($arrDiff as $intIdDato) {
            unset($this->mixDatoArray[$intIdDato]);
        }
    }

    public function LimpiarInconsistencias() {
        if (is_array($this->mixDatoArray)) {
            foreach ($this->mixDatoArray as $objDato) {
                $objDato->ErrorCode = null;
                $objDato->ErrorMessage = null;
            }
        }
    }

    public function Consistir($blnEjecutarJs = false) {
        $strJs = '';
        if (is_array($this->mixDatoArray)) {
            foreach ($this->mixDatoArray as $objDato) {
                if ($objDato->HasError) {
                    $strJs .= sprintf("cc.mostrar_error_dato(\"%s\", \"%s\", \"%d\");\n", $objDato->Name, $objDato->ErrorMessage, $objDato->ErrorCode);
                } else {
                    $strJs .= sprintf("cc.limpiar_error_dato(\"%s\");\n", $objDato->Name);
                }
            }
        }
        QApplication::ExecuteJavascript($strJs);
    }

    public function Validate() {
        return parent::Validate();
        // Consistencias y validaciones
    }

    public function Save() {
        // Save
        foreach ($this->mixDatoArray as $mixKey => $objDato) {
            if ($objDato->NoGuardar) {
                unset($this->mixDatoArray[$mixKey]);
            }
        }
        $this->objDatoPersonalBloque->Dato = base64_encode(serialize($this->mixDatoArray));
        $this->objDatoPersonalBloque->Save();

    }

    /**
     * Si existe el dato, devuelve su valor (propiedad {DATO}->Value)
     * Si no existe devuelve null.
     * De setearse un Default. En caso que no exista el dato, devuelve el Default.
     * @param string $strName
     * @param mixtype $mixDefault
     * @return type
     */
    public function GetDato($strName, $mixDefault = null) {
        if ($this->ExistsDato($strName)) {
            return $this->mixDatoArray[$strName]->Value;
        }
        return $mixDefault;
    }
    
    public function GetDatoObject($strName) {
        if ($this->ExistsDato($strName)) {
            return $this->mixDatoArray[$strName];
        }
        return null;
    }
    
    public function ExistsDato($strName){
        return array_key_exists($strName, (array)$this->mixDatoArray);
    }

    /**
     * Comprueba si existen varios datos en mixDatoArray
     * Uso
     * @param type $str_arr_Names
     * @return boolean
     */
    function ExistsDatos($str_arr_Names) {
        if(is_array($str_arr_Names)){
            $strNames_r = $str_arr_Names;
        }else{
            $strNames_r = explode('\|', $str_arr_Names);
        }
        foreach ($strNames_r as $strNames)
            if (!array_key_exists($strNames, (array)$this->mixDatoArray))
                return false;
        return true;
    }

    public function SetDato($strName, $strProperty, $mixValue = null){
        $this->ExistsDato($strName) && $this->mixDatoArray[$strName]->$strProperty = $mixValue;
    }
    
    public function __get($strName) {
        switch ($strName) {
            case 'HasError':
                if (is_array($this->mixDatoArray)) {
                    foreach ($this->mixDatoArray as $objDato) {
                        if ($objDato->HasError) {
                            return true;
                        }
                    }
                }
                return false;
            break;
            case 'IdPagina':
                return $this->intIdPagina;
            break;
            case 'IdBloque':
                return $this->mixIdBloque;
            break;
            case 'Template':
                return $this->strTemplate;
            break;
            case 'Titulo':
                return $this->strTitulo;
            break;
            case 'IdPersona':
                return $this->objPersonal->IdPersonal;
            break;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            break;
        }
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case 'Template':
                return $this->strTemplate = $mixValue;
            break;
            case 'Titulo':
                return $this->strTitulo = $mixValue;
            break;
            default:
                try {
                    return parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            break;
        }
    }

    protected function checkCrossScripting($mixValue) {
        if (is_array($mixValue)) {
            foreach ($mixValue as $k => $v) {
                $mixValue[$k] = $this->checkCrossScripting($v);
            }
        } elseif (is_string($mixValue) || is_numeric($mixValue) || is_bool($mixValue)) {
            $strText = strtolower($mixValue);
            if ((strpos($strText, '<script') !== false) ||
                (strpos($strText, '<applet') !== false) ||
                (strpos($strText, '<embed') !== false) ||
                (strpos($strText, '<style') !== false) ||
                (strpos($strText, '<link') !== false) ||
                (strpos($strText, '<body') !== false) ||
                (strpos($strText, '<iframe') !== false) ||
                (strpos($strText, 'javascript:') !== false) ||
                (strpos($strText, ' onfocus=') !== false) ||
                (strpos($strText, ' onblur=') !== false) ||
                (strpos($strText, ' onkeydown=') !== false) ||
                (strpos($strText, ' onkeyup=') !== false) ||
                (strpos($strText, ' onkeypress=') !== false) ||
                (strpos($strText, ' onmousedown=') !== false) ||
                (strpos($strText, ' onmouseup=') !== false) ||
                (strpos($strText, ' onmouseover=') !== false) ||
                (strpos($strText, ' onmouseout=') !== false) ||
                (strpos($strText, ' onmousemove=') !== false) ||
                (strpos($strText, ' onclick=') !== false) ||
                (strpos($strText, '<object') !== false) ||
                (strpos($strText, 'background:url') !== false)) {
                throw new QCrossScriptingException($this->strControlId);
            }
        }
        $mixValue = str_replace("\0", "", $mixValue);
        return $mixValue;
    }

}
