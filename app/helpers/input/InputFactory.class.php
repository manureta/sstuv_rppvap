<?php

/**
 * Factory que genera inputs de acuerdo
 * con el tipo de dato de la columna
 */
class InputFactory {

    protected static $arrValores = array();
    
    /**
     * Recibe Cuadro y un tipo de dato, y segun este ultimo
     * devuelve el QControl correspondiente.
     * @param $objCuadroControl
     * @param $intTipoDato
     * @param $intAncho
     * @return QControl
     */
    public static function GetHtml($strId, Columna $objColumna, $mixValor, $strStyle = '', $blnDisabled = false) {
        $mixValor = htmlspecialchars($mixValor, ENT_COMPAT);
        if ($objColumna->Ancho)
            $strStyle .= ' width: ' . $objColumna->Ancho . 'em; ';
        switch ($objColumna->TipoDato) {
            case TipoDatoType::STRING_LONG:
                $blnLong = true;
            case TipoDatoType::STRING:
//                $strReturn = sprintf("<input type='text' id='%s' value='%s'", $strId, $mixValor);
//                if ($blnDisabled)
//                    $strReturn .= ' disabled="disabled" ';
//                $strReturn .= sprintf(" class='string' style='%s' onfocus='this.select()' />", $strStyle);
//                return $strReturn;
                $strReturn = sprintf("<input type='text' id='%s' value=\"%s\"", $strId, $mixValor);
                if ($blnDisabled)
                    $strReturn .= ' disabled="disabled" ';
                $strReturn .= sprintf(" class='%s' style='%s' onfocus='this.select()' />", isset($blnLong)?'string_long':'string' ,$strStyle);
                return $strReturn;
            case TipoDatoType::BOOLEAN: // este es tipo de dato checkbox boolean en realidad
                $strReturn = sprintf("<input type='checkbox' id='%s' %s", $strId, ($mixValor == "on") ? "checked='checked'" : "");
                if ($blnDisabled)
                    $strReturn .= ' disabled="disabled" ';
                $strReturn .= sprintf(" class='string' style='%s' />", $strStyle);
                return $strReturn;
            case TipoDatoType::RADIOCHECK_HORIZONTAL:
            case TipoDatoType::RADIOCHECK_VERTICAL:
            case TipoDatoType::RADIOCHECK_UNICO:
                $strReturn = sprintf("<input type='checkbox' onclick='RadioCheck(this,%d)' id='%s' %s",
                                $objColumna->TipoDato - 12, //1 para Hor, 2 para Vert y 3 para Unico (dice damián que soy un hacker)
                                $strId, ($mixValor == "on") ? "checked='checked'" : "");
                if ($blnDisabled)
                    $strReturn .= ' disabled="disabled" ';
                $strReturn .= sprintf(" style='%s' />", $strStyle);
                return $strReturn;

            case TipoDatoType::TEXT:
                $strReturn = sprintf("<textarea id='%s' style='%s' onfocus='this.select()'>%s</textarea>", $strId, $strStyle, $mixValor);
                if ($blnDisabled)
                    $strReturn .= ' disabled="disabled" ';
                return $strReturn;
            case TipoDatoType::INTEGER_DISABLED:
                $strReturn = sprintf("<input type='text' id='%s' value='%s'", $strId, $mixValor);
                $strReturn .= sprintf(" class='%s'", ($objColumna->TipoDato == TipoDatoType::INTEGER) ? 'integer' : 'smallint');
                if ($objColumna->Cuadro->IdDefinicionCuadro != 157 || $objColumna->IdDefinicionColumna != 165)
                    $strReturn .= ' disabled="disabled" ';
                $strReturn .= sprintf(" style='%s' onkeyup='num(this)' onfocus='this.select()' />", $strStyle);
                return $strReturn;
            case TipoDatoType::STRING_DISABLED:
//                $strReturn = sprintf("<input type='text' id='%s' value='%s'", $strId, $mixValor);
                $strReturn = sprintf("<input type='text' id='%s' value=\"%s\"", $strId, $mixValor);
                $strReturn .= sprintf(" onfocus='this.select()' ");
                if ($objColumna->Cuadro->IdDefinicionCuadro != 157 || $objColumna->IdDefinicionColumna != 551)
                    $strReturn .= ' disabled="disabled" ';
                $strReturn .= sprintf(" style='%s' />", $strStyle);
                return $strReturn;
            case TipoDatoType::INTEGER:
            case TipoDatoType::SMALLINT:
                $strReturn = sprintf("<input type='text' id='%s' value='%s'", $strId, $mixValor);
                if ($blnDisabled)
                    $strReturn .= ' disabled="disabled" ';
                $strReturn .= sprintf(" class='%s'", ($objColumna->TipoDato == TipoDatoType::INTEGER) ? 'integer' : 'smallint');
                $strReturn .= sprintf(" style='%s' onkeyup='num(this)' onblur='num(this)' onfocus='this.select()' />", $strStyle);
                return $strReturn;
            case TipoDatoType::NUMERO_ORDEN_PLAN_ESTUDIO:
                // Si la columna se encuentra en un cuadro de planes, es solamente un input integer
                if (in_array($objColumna->Cuadro->IdDefinicionCuadro, array(157, 257, 430))) {
                    $strReturn = sprintf("<input type='text' id='%s' value='%s'", $strId, $mixValor);
                    if ($blnDisabled)
                        $strReturn .= ' disabled="disabled" ';
                    $strReturn .= sprintf(" class='%s'", ($objColumna->TipoDato == TipoDatoType::INTEGER) ? 'integer' : 'smallint');
                    $strReturn .= sprintf(" style='%s' onkeyup='num(this); DontAllowZero(this);' onblur='num(this)' onfocus='this.select()' />", $strStyle);
                    return $strReturn;
                }
                // En cambio, si la columna se encuentra en un cuadro de matrícula o egresados, es un autocomplete
                if (in_array($objColumna->Cuadro->IdDefinicionCuadro, array(612,449,432,458,617,525,629)))
                    $intIdDefinicionCuadroPlanes = 430; // VIOLETA
                else if (in_array($objColumna->Cuadro->IdDefinicionCuadro, array(287,317,291,293)))
                    $intIdDefinicionCuadroPlanes = 257; // VERDE
                else 
                    $intIdDefinicionCuadroPlanes = 157; // CELESTE

                //Para toda la columna de número de orden los valores van a ser los mismos, si no están calculados los calculo
                if (!array_key_exists(TipoDatoType::NUMERO_ORDEN_PLAN_ESTUDIO, self::$arrValores)) {
                    $objDAO = new CuadroDAO();
                    $objCuadroPlanes = $objDAO->LoadCuadro($intIdDefinicionCuadroPlanes, $objColumna->Cuadro->Localizacion);
                    $strVarJs = (self::IsNroOrdenCeroValido($objColumna->Cuadro->IdDefinicionCuadro)) ? "[[\"0\",\"Ciclo Básico\"]," : "[ ";// el espacio es intencional!
                    foreach ($objCuadroPlanes->GetFilas() as $objFila) {
                        if (($objColumna->Cuadro->IdDefinicionCuadro == 611 || $objColumna->Cuadro->IdDefinicionCuadro == 612 ) 
                                && $objFila->getCelda($objCuadroPlanes->GetColumna(187))->Valor != 124) { //Si es el cuadro de TTP y el plan no articula, continúo
                            continue;
                        }
                        $intNroOrden = $objFila->getCelda($objCuadroPlanes->GetColumna(165))->Valor;
                        if ($intNroOrden == '') continue;
                        $intIdColumnaTitulo = array_pop_unref(array_intersect($objCuadroPlanes->GetColumnasIds(),array(289,257)));
                        $strTitulo = $objFila->getCeldaByIdColumna($intIdColumnaTitulo)->Valor;

                        $strVarJs .= sprintf('["%s","%s"],', $intNroOrden ,  addslashes($strTitulo));
//                        $strVarJs .= sprintf('["%s","%s"],', $intNroOrden ,self::Str2Html($strTitulo));
                    }
                    $strVarJs = substr($strVarJs, 0, -1) . "]";
                    self::$arrValores[TipoDatoType::NUMERO_ORDEN_PLAN_ESTUDIO] = $strVarJs;
                }
                else $strVarJs = self::$arrValores[TipoDatoType::NUMERO_ORDEN_PLAN_ESTUDIO];
                
                $arrIds = explode('_', $strId);
                if (!defined('ID_COLUMNA_CODIGO')) {
                     define('ID_COLUMNA_CODIGO', 551);
                }
                $strCodigoId = $arrIds[0] . '_' . $arrIds[1] . '_' . $arrIds[2] . '_' . ID_COLUMNA_CODIGO;


                $strJs2 = "AutocompleteOnKeyUp(this.id, this.id+'_id_columna_codigo');"; //esto borra las celdas dependientes cuando cambio el valor de ésta
                $strJs = sprintf("RegisterNewAutocompleteArray(%s,\"%s\",\"%s\",\"%s\",\"%s\");" ,
                            $strVarJs , $strId, $objColumna->TipoDato, $strCodigoId, $objColumna->Cuadro->IdDefinicionCuadro);
                $objColumna->Cuadro->SetEndScript($strJs);

                $strReturn = sprintf("<input type='text' id='%s' value='%s' rel='%s' class='Autocomplete smallint ArrayAuto'", $strId, $mixValor, $objColumna->TipoDato);
                $strReturn .= sprintf(" style='%s' onkeyup=\"num(this); $strJs2\" />", $strStyle);

                $strReturn .= '<input type="hidden" id="' . $strId . '_id_columna_codigo" name="' . $strId . '_id_columna_codigo" value="' . $strCodigoId . '">';

                $strReturn .= self::GenerarInputsAutocomplete($strId, $mixValor);

                return $strReturn;

            case TipoDatoType::DENOMINACION_TALLER_ESPECIAL:
//            case TipoDatoType::ACTIVIDAD_ESPECIALIDAD:
            case TipoDatoType::ESPECIALIDAD_GRUPO:
            case TipoDatoType::ESPECIALIDAD_ARTISTICA:
            case TipoDatoType::TITULO_ARTISTICA:
            case TipoDatoType::ESPECIALIDAD_FP:
            case TipoDatoType::TITULO_FP:
                $arrIds = explode('_', $strId);
                $strJs2 = "AutocompleteOnKeyUp(this.id);";

                $strJs = sprintf('RegisterNewAutocomplete("%s", "%s"); ',$strId, $objColumna->TipoDato);
                $objColumna->Cuadro->SetEndScript($strJs);

                $strReturn = sprintf("<input size=60 type='text' id='%s' value='%s' rel='%s' class='Autocomplete string_long'", $strId, $mixValor, $objColumna->TipoDato);
                $strReturn .= sprintf(" style='%s' onkeyup=\"%s\" />", $strStyle, $strJs2);
                $strReturn .= self::GenerarInputsAutocomplete($strId, $mixValor);
                return $strReturn;
            case TipoDatoType::TITULO_SECUNDARIA:
            case TipoDatoType::NOMBRE_CARRERA_SUPERIOR:
                $arrIds = explode('_', $strId);
                if (!defined('ID_COLUMNA_CODIGO')) {
                    define('ID_COLUMNA_CODIGO', 563);
                }
                $strCodigoId = $arrIds[0] . '_' . $arrIds[1] . '_' . $arrIds[2] . '_' . ID_COLUMNA_CODIGO;
                $strJs2 = "AutocompleteOnKeyUp(this.id, this.id+'_id_columna_codigo');";
                $strJs = sprintf('RegisterNewAutocomplete("%s", "%s", "%s"); ',$strId, $objColumna->TipoDato, $strCodigoId);
                $objColumna->Cuadro->SetEndScript($strJs);
                $strReturn = sprintf("<input type='text' id='%s' value=\"%s\" rel='%s' class='Autocomplete string_long'", $strId, $mixValor, $objColumna->TipoDato);
                $strReturn .= sprintf(" style='%s' onkeyup=\"%s\" />", $strStyle, $strJs2);
                $strReturn .= '<input type="hidden" id="' . $strId . '_id_columna_codigo" name="' . $strId . '_id_columna_codigo" value="' . $strCodigoId . '">';
                $strReturn .= '<input type="hidden" id="' . $strId . '_selected_text" name="' . $strId . '_selected_text" value="' . $mixValor . '">';
                $strReturn .= '<input type="hidden" id="' . $strId . '_selected_value" name="' . $strId . '_selected_value" value="' . $mixValor . '">';

                return $strReturn;
            case TipoDatoType::TITULO_TTP_IF_TAP_OT:
                $arrIds = explode('_', $strId);
                $strJs2 = "AutocompleteOnKeyUp(this.id);";
                $strNext = str_replace("549", "550", $strId);
                $strJs = sprintf('RegisterNewAutocompleteCuadro611("%s", "%s", "%s"); ',$strId, $strNext, $objColumna->TipoDato);
                $objColumna->Cuadro->SetEndScript($strJs);

                $strReturn = sprintf("<input type='text' id='%s' value='%s' rel='%s' class='Autocomplete string_long'", $strId, $mixValor, $objColumna->TipoDato);
                $strReturn .= sprintf(" style='%s' onkeyup=\"%s\" />", $strStyle, $strJs2);
                $strReturn .= '<input type="hidden" id="' . $strId . '_selected_text" name="' . $strId . '_selected_text" value="' . $mixValor . '">';
                $strReturn .= '<input type="hidden" id="' . $strId . '_selected_value" name="' . $strId . '_selected_value" value="' . $mixValor . '">';
                return $strReturn;
            default:
                //HACK para el caso de un select que condiciona un autocomplete, si se cambia el valor borro el cache del autocompete (caso 550=>549)
                $strIdAutocomplete = (strpos($strId,'550')) ? str_replace('550', '549', $strId) : false; // id del autocomplete vinculado al select
                $strReturn = sprintf("<div class=\"divselect\" style=\"width:%dem\"><select id='%s' %s %s>",
                                $objColumna->Ancho ? $objColumna->Ancho : 4,
                                $strId,
                                $blnDisabled ? 'disabled="disabled"' : '',
                                $strIdAutocomplete ? "onchange=\"$('#$strIdAutocomplete').flushCache();\"" : '');
                $strReturn .= sprintf("<option value='' %s>%s</option>",
                                (!$mixValor) ? " selected='selected'" : "", ''); /* ,
                  TipoDatoType::ToDescripcion($objColumna->TipoDato)); */
                foreach ($objColumna->PosiblesValores as $intIdValor => $strDesc) {
                    $strReturn .= sprintf("<option value='%s'%s>%s</option>", $intIdValor,
                                    ($mixValor == $intIdValor) ? " selected='selected'" : "",
                                    $strDesc);
                }
                $strReturn .= "</select></div>";
                return $strReturn;
        }
    }
    
    protected static function GenerarInputsAutocomplete($strId, $mixValor) {
        $strReturn = '<input type="hidden" id="' . $strId . '_selected_text" name="' . $strId . '_selected_text" value="' . $mixValor . '">';
        $strReturn .= '<input type="hidden" id="' . $strId . '_selected_value" name="' . $strId . '_selected_value" value="' . $mixValor . '">';
        //$strReturn .= sprintf("<img src='%s/images/tilde_ok.gif' id='%s_tilde_ok' style='display:%s'/>", __VIRTUAL_DIRECTORY__, $strId, (!is_null($mixValor) ? 'inline' : 'none'));
        return $strReturn;
    }

    protected static function IsNroOrdenCeroValido($idCuadro){
        switch($idCuadro){
            // celeste
            case 157:
            case 611:
            case 168:
            // case 616: // falta verificar

            // violeta
            case 430:
            case 612:
            case 458:
            
            // verde
            case 257:    
            case 287:
            case 317:
            // case 616: // falta verificar
                        return false;
            default:    return true;
        }
    }

}
?>
