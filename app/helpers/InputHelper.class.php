<?php

abstract class InputHelper {


    static public function GetSelectForTypeClass($strClass, $mixId, $mixSelected = null, $arrAttributes = array()) {
        $strOptions = '';
        if (!array_key_exists('useNullOption', $arrAttributes) || (array_key_exists('useNullOption', $arrAttributes) && $arrAttributes['useNullOption'])) {
            $strOptions .= sprintf(' <option value="0" /> ');
        }
        $strOptions .= self::GetOptionsHtml($strClass::$NameArray, $mixSelected);
        
        
        if (!array_key_exists('noSelectTag', $arrAttributes) || !$arrAttributes['noSelectTag']) {
            $strReturn = sprintf('<select id="%s" ',$mixId);
        
            foreach ($arrAttributes as $strAtt => $mixVal) {
                $strReturn .= sprintf(' %s="%s" ', $strAtt, $mixVal);
            }
            if (!array_key_exists('name', $arrAttributes)) {
                $strReturn .= sprintf(' name="%s" ', $mixId);
            }
            $strReturn .= '>'.$strOptions.'</select>';
        } else {
            $strReturn = $strOptions;
        }
        
        return $strReturn;
    }
    

    static public function GetSelectFromOptions($arrOptions, $mixId, $mixSelected = null, $arrAttributes = array()) {
        if (!array_key_exists('noSelectTag') || $arrAttributes['noSelectTag']) {
            $strReturn = sprintf('<select id="%s" ',$mixId);
        }
        foreach ($arrAttributes as $strAtt => $mixVal) {
            $strReturn .= sprintf(' %s="%s" ', $strAtt, $mixVal);
        }
        if (!array_key_exists('name', $arrAttributes)) {
            $strReturn .= sprintf(' name="%s" ', $mixId);
        }
        $strReturn .= '>';
        if (!array_key_exists('useNullOption', $arrAttributes) || (array_key_exists('useNullOption', $arrAttributes) && $arrAttributes['useNullOption'])) {
            $strReturn .= sprintf(' <option value="0" /> ');
        }
        $strReturn .= self::GetOptionsHtml($strClass::$NameArray, $mixSelected);
        if (!array_key_exists('noSelectTag') || $arrAttributes['noSelectTag']) {
            $strReturn .= '</select>';
        }
        return $strReturn;
    }

    static public function GetSelectFromTipoClass($strClass, $mixId, $mixSelected = null, $arrAttributes = array()) {
        if (!array_key_exists('noSelectTag') || $arrAttributes['noSelectTag']) {
            $strReturn = sprintf('<select id="%s" ',$mixId);
        }
        foreach ($arrAttributes as $strAtt => $mixVal) {
            $strReturn .= sprintf(' %s="%s" ', $strAtt, $mixVal);
        }
        if (!array_key_exists('name', $arrAttributes)) {
            $strReturn .= sprintf(' name="%s" ', $mixId);
        }
        $strReturn .= '>';
        if (!array_key_exists('useNullOption', $arrAttributes) || (array_key_exists('useNullOption', $arrAttributes) && $arrAttributes['useNullOption'])) {
            $strReturn .= sprintf(' <option value="0" /> ');
        }
        $arrOptions = $strClass::LoadAll();
        $strReturn .= self::GetOptionsHtml($arrOptions, $mixSelected);
        if (!array_key_exists('noSelectTag') || $arrAttributes['noSelectTag']) {
            $strReturn .= '</select>';
        }
        return $strReturn;
    }

    static public function GetOptionsHtml($arrOptions, $mixSelected = null) {
        $strReturn = '';
        foreach ($arrOptions as $intCIndex => $strName) {
            $strReturn .= sprintf('<option value="%d" %s>%s</option>', $intCIndex, ($mixSelected == $intCIndex ? 'selected="selected"':''), $strName);
        }
        return $strReturn;
    }

}
