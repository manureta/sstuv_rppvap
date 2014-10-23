<?php

abstract class ConsistenciaHelper {

    public static $arrMapUltimoAnioAnioEstudio = array(309=>262, 301=>263, 283=>264, 284=>265, 285=>266, 286=>267, 287=>268);
    public static $arrCuadrosAniosAnteriores =  array(157,167,168,181,213,221,230,233,257,264,265,289,316,317,331,332,388,430,449,458,611,612,629,662,663,666,693,694,695,696,697,698,699,700);

    public static $arrCuadroMatriculaXCargo= array(
        266 => array(258, 259, 262),   // marron
        292 => array(256,289),         // amarillo
        544 => array(504, 506, 523,514,531,533), //rosa
        337 => array(287,331,332),     // verde 2 13.A y 13.B
        114 => array(104),             // celeste 1.1
        217 => array(214),             // celeste 1.1 bs
        121 => array(104),             // celeste 1.1 maternal
        764 => array(214,104),         // celeste 1.1 maternal bsas y s/egb
        138 => array(215,127,626),     // celeste 2.1 x 3
        169 => array(158,226),         // celeste 3.1
        591 => array(518),             // violeta 11 
        402 => array(297),             // violeta 1.1 bsas
        460 => array(432,525),         // violeta 2.1 resto y BsAs
        322 => array(298,316),         // naranja 1.1 y 1.12
    );


    public static function GetCuadroMatriculaByCuadroCargo($objCuadroCargo){
        $arrCuadroMat = array();

        if(!isset(self::$arrCuadroMatriculaXCargo[$objCuadroCargo->IdDefinicionCuadro])){
            LogHelper::Debug("no se encuentra definido cuadros de matricula para el cuadro de cargo {$objCuadroCargo->IdDefinicionCuadro}");
            return array();
        }
        foreach(self::$arrCuadroMatriculaXCargo[$objCuadroCargo->IdDefinicionCuadro] as $intIdCuadroMat){
            try{
                $objCuadroMatDao = new CuadroDAO();
                $objCuadroMat = $objCuadroMatDao->LoadCuadro($intIdCuadroMat, $objCuadroCargo->Localizacion);
                if($objCuadroMat)
                    $arrCuadroMat[]= $objCuadroMat;
            }catch(Exception $e){}
        }
        return $arrCuadroMat;

    }
    
    /**
     *
     * Suma los valores de una columna para todas las filas agrupando segun una
     * o más columnas y opcionalmente mapeando respecto de estas a otras
     *
     * @param $idColSum Id de la columna que se va a sumar
     * @param $mixKey   Id de la columna por la que agrupar o array de id columnas
     * @param $arrMap   Es un mapa donde cada valor de la columna key puede ser
     *                  mapeado a otro. Si se usan varias columnas la key del
     *                  array debe ser una concatenacion de los valores de las
     *                  columnas key separados por '_'
     *
     * @return array
     */
    public static function SumarAgrupandoMapeado($objCuadro, $idColSum, $mixKey = null, $arrMap = null) {
        $arrReturn = array();
        if(is_array($arrMap)) {
            foreach(array_values($arrMap) as $k)
                $arrReturn[$k] = 0;
        }

        $objColSum = $objCuadro->GetColumna($idColSum);
        // Suma la columna total por fila del cuadro de matricula mapeando segun el nivel a las filas del cuadro extranjeros segun $arrMapNiv2TotExt
        foreach ($objCuadro->GetFilas() as $objFila) {
            $objTotal = $objFila->getCelda($objColSum);
            if($mixKey) {
                if(is_array($mixKey)) { // agrupo por más de una columna
                    $arrValKey = array();
                    foreach ($mixKey as $idColKey) {
                        $objKey = $objFila->getCelda($objCuadro->GetColumna($idColKey));
                        if($objKey->Valor != '') array_push($arrValKey, $objKey->Valor);
                    }
                    $KeyFinal = implode($arrValKey, '_');
                } else { // agrupo por una columna
                    $objKey = $objFila->getCelda($objCuadro->GetColumna($mixKey));
                    $KeyFinal = $objKey->Valor;
                }
                if($KeyFinal != '') {
                    if(is_array($arrMap) && array_key_exists($KeyFinal, $arrMap)) { // !array_key_exists() deberia? throw new QCallerException("No se pudo encontrar en el map esta key: $KeyFinal");
                        $arrReturn[$arrMap[$KeyFinal]] += $objTotal->Valor;
                    } else {
                        if (!array_key_exists($KeyFinal, $arrReturn)) {
                            $arrReturn[$KeyFinal] = $objTotal->Valor;
                        } else {
                            $arrReturn[$KeyFinal] += $objTotal->Valor;
                        }
                    }
                }
            } else { // sin keys sumo todas las filas a un gran total, con key arbirtrario = 0
                if (!array_key_exists(0, $arrReturn)) {
                    $arrReturn[0] = $objTotal->Valor;
                } else {
                    $arrReturn[0] += $objTotal->Valor;
                }
            }
        }
        return $arrReturn;
    }

    public static function SumarPorColumnas() {

    }

    protected static $arrErrores = array();

    public static function HandleException($intConsistencia, $idCuadro, $arrCuadros, $exception) {
        // catcheo errores repetidos
        if (in_array(serialize(array($intConsistencia, $idCuadro, $arrCuadros)), self::$arrErrores))
            return;
        else
            self::$arrErrores[] = serialize(array($intConsistencia, $idCuadro, $arrCuadros));

        switch (get_class($exception)) {
            case 'QCallerException':
                $str = "Error de implementación en Consistencia %d llamada por el cuadro %d con %s como parámetro\nExcepción: %s";
            default:
                $str = isset($str) ? $str : "Excepción no esperada en Consistencia %d llamada por el cuadro %d con %s como parámetro\nExcepción: %s";
                $msj = sprintf($str, $intConsistencia, $idCuadro, implode(', ', $arrCuadros), $exception->getMessage());
                LogHelper::Error($msj);
                if (SERVER_INSTANCE != 'dev') {
                    if (SERVER_INSTANCE == 'test')
                        QApplication::DisplayAlert("Se produjo un error no esperado corriendo la consistencia {$intConsistencia} encontró un caso no implementado. " . nl2br($exception->getMessage()));
                    return;
                }
                throw $exception;
        }
    }

    /**
     * toma dos cuadros como parametro y una columna
     * Devuelve un array con 4 elementos: en aaray de totales por oferta del cuadro de matricula
     * array de totales por oferta de poblacion y el array de ids, y un booleano que indica si esta presente la columna total.
     * @param CuadroBase $objCuadroExt
     * @param CuadroBase $objCuadroMat
     * @param integer $col
     * @return array
     */
    public static function SumarPorOferta($objCuadroExt, $objCuadroMat, $col) {

        $arrTotalExt = array();
        $arrTotalMat = array();
        $arrIdTotalExt = array();
        $blnHasTotal = false;

        switch ($objCuadroExt->IdDefinicionCuadro) {
            case 107; // 1.4 Celeste
            case 108: // 1.5 Celeste
            case 109: // 1.6 Celeste
            case 110: // 1.7 Celeste
            case 111: // 1.8 Celeste
            case 113: // 1.10 Celeste
                $arrIdTotalExt = array(206, 207);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col, 1, array(20 => 207, 21 => 207, 22 => 207, 23 => 206, 24 => 206, 25 => 206));
                break;
            case 112: // 1.11 Celeste S/egb - C/EGB
            case 759: // 1.11 Celeste Bs AS
                $arrIdTotalExt = array(208, 209);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col, 1, array(20=>209, 21=>209, 22=>209, 23=>208, 24=>208, 25=>208));
                break;
            
            case 131: // 2.5 Celeste
            case 132: // 2.6 Celeste
            case 133: // 2.7 Celeste
            case 134: // 2.8 Celeste
            case 136: // 2.10 celeste (idioma)  
            case 760: // 2.11 celeste    
            case 135: // 2.9 celeste  c/egb
                $arrIdTotalExt = array(273, 274, 275);
                $arrTotalMatTmp = self::SumarAgrupandoMapeado($objCuadroMat, $col, array(55, 89));
                $arrTotalMat = array(273 => 0, 274 => 0, 275 => 0);
                foreach ($arrTotalMatTmp as $k => $v) {
                    $arrKeys = explode('_', $k);
                    $intNivel = array_key_exists(0, $arrKeys) ? $arrKeys[0] : 0;
                    $intAnio = array_key_exists(1, $arrKeys) ? $arrKeys[1] : 0;
                    switch (true) {
                        case (in_array($intNivel, array(12, 15)) && in_array($intAnio, range(262, 267))):
                            $arrTotalMat[273] += $v;
                            break;
                        case ($intNivel == 13 && in_array($intAnio, range(262, 268))):
                            $arrTotalMat[274] += $v;
                            break;
                        case ($intNivel == 15 && in_array($intAnio, range(268, 270))):
                            $arrTotalMat[275] += $v;
                            break;
                    }
                }
                break;
            case 390: // 1.4 Violeta
            case 394: // 1.5 Violeta
            case 396: // 1.6 Violeta
            case 397: // 1.7 Violeta
            case 753: // 1.9 Violeta    
                
                $arrIdTotalExt = array(518, 275, 676);
                $arrTotalMatTmp = self::SumarAgrupandoMapeado($objCuadroMat, $col, array(55, 398));
                $arrTotalMat = array(518 => 0, 275 => 0, 676 => 0);
                foreach ($arrTotalMatTmp as $k => $v) {
                    switch (true) {
                        case (substr($k, 0, 3) == '183'):
                            $arrTotalMat[518] += $arrTotalMatTmp[$k];
                            break;
                        case ($k == '15_322'):
                        case ($k == '15_323'):
                            $arrTotalMat[518] += $arrTotalMatTmp[$k];
                            break;
                        case ($k == '15_324'):
                        case ($k == '15_273'):
                        case ($k == '15_274'):
                        case ($k == '15_275'):
                        case ($k == '15_325'):
                            $arrTotalMat[275] += $arrTotalMatTmp[$k];
                            break;
                        case ($k == '15_276'):
                            $arrTotalMat[676] += $arrTotalMatTmp[$k];
                            break;
                    }
                }
                break;
            case 224: // 2.5 Celeste BsAs
            case 218: // 2.6 Celeste BsAs
            case 240: // 2.7 Celeste BsAs
            case 241: // 2.8 Celeste BsAs
            case 763: // 2.11 Celeste BsAs  
            case 219:  //2.10 celeste sin egb    
            case 627:  //2.9 celeste s/egb
                $arrIdTotalExt = array(379);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col);
                $arrTotalMat[379] = $arrTotalMat[0];
                break;
            case 768: // 2.5 Violeta BsAs
            case 769: // 2.6 Violeta BsAs
            case 770: // 2.7 Violeta BsAs
            case 771: // 2.8 Violeta BsAs
            case 766: // 2.3 Violeta BsAs
                
                $arrIdTotalExt = array(313);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col);
                $arrTotalMat[313] = $arrTotalMat[0];
                break;
            case 440: // 2.5 Violeta resto
            case 442: // 2.6 Violeta resto
            case 445: // 2.7 Violeta resto
            case 447: // 2.8 Violeta resto
            case 530: // 19 Rosa
            case 437: // 2.4 Violeta resto
            case 755: // 2.3 Violeta resto
                $arrIdTotalExt = array(313, 314, 548);
                $arrTotalMatTmp = self::SumarAgrupandoMapeado($objCuadroMat, $col, array(55, 166));
                $arrTotalMat = array(313 => 0, 314 => 0, 548 => 0);
                foreach ($arrTotalMatTmp as $k => $v) {
                    switch (true) {
                        case (substr($k, 3, 3) == '276' || substr($k, 0, 3) == '308' ):
                            $arrTotalMat[548] += $arrTotalMatTmp[$k];
                            break;
                        case (substr($k, 0, 2) == '95'):
                            $arrTotalMat[313] += $arrTotalMatTmp[$k];
                            break;
                        case (substr($k, 0, 2) == '99'):
                            $arrTotalMat[314] += $arrTotalMatTmp[$k];
                            break;
                    }
                }
                break;
            case 161: // 3.4 Celeste
            case 162: // 3.5 Celeste
            case 163: // 3.6 Celeste
            case 164: // 3.8 Celeste
            case 166: // 3.9 Celeste
            case 761: // 3.3 Celeste buenos aires, sin egb
            case 165: // 3.9 Celeste C/EGB- S/EGB
                
                $arrIdTotalExt = array(313, 314);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col, 55, array(99 => 314, 95 => 313, 183 => 313, 184 => 314));
                break;
            case 527: // 16 Rosa
            case 528: // 17 Rosa
            case 529: // 18 Rosa
            case 752: // 20 Rosa    
                $arrIdTotalExt = array(313, 314, 548);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col, 55, array(99 => 314, 95 => 313, 183 => 313, 184 => 314, 308 => 548));
                break;
            case 303: // 1.2 Naranja
            case 653: // 1.3 Naranja
            case 654: // 1.4 Naranja
            case 655: // 1.5 Naranja
            case 656: // 1.6 Naranja
            case 307: // 1.8 Naranja    
                
                $arrIdTotalExt = array(272);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col);
                $arrTotalMat[272] = $arrTotalMat[0];
                break;
            case 535: // 25 Rosa
            case 536: // 26 Rosa
            case 537: // 27 Rosa
                $arrIdTotalExt = array(553);
                $arrTotalMat = self::SumarAgrupandoMapeado($objCuadroMat, $col);
                $arrTotalMat[553] = $arrTotalMat[0];
                break;
            case 516: // 9 Rosa
            case 517: // 10 Rosa
            case 519: // 11 Rosa
            case 520: // 12 Rosa
            case 751: // 13 Rosa
                           
                $objColumnaMat = $objCuadroMat->GetColumna($col);
                $arrTotalMat[518] = 0;
                $arrTotalMat[275] = 0;
                $intTotalMat[548] = $objCuadroMat->GetFila(548)->GetCelda($objColumnaMat)->Valor;

                $arrMapeoFilas = array(518 => array(258, 381, 382, 383, 384, 385),
                    275 => array(387, 388),
                    548 => array(548));

                // Me fijo si tiene Primaria de 7 años Activa para determinar si 7º va a Primario/EGB1y2 o a EGB3
                $arrOfertasLocales = $objCuadroMat->Localizacion->GetOfertaLocalAsIdArray($objCuadroMat->GetCOfertaAgregada(), OLTPModalidad1Tipo::ESPECIAL, QQ::Equal(QQN::OLTPOfertaLocal()->CEstado, OLTPEstadoTipo::Activo));
                $tiene_prim_7 = false;
                foreach ($arrOfertasLocales as $objOfertaLocal) {
                    if ($objOfertaLocal->COferta == 126)
                        $tiene_prim_7 = true;
                }
                if ($tiene_prim_7) {//7° va en la fila de Primaria
                    array_push($arrMapeoFilas[518], 386);
                } else {//7° va en la fila de EGB 3
                    array_push($arrMapeoFilas[275], 386);
                }

                //Inicializo los array de resultados
                $arrTotalMat = array();
                foreach ($arrMapeoFilas as $intFilaNivel => $arrFilasGrados)
                    $arrTotalMat[$intFilaNivel] = 0;

                $arrIdTotalExt = array_keys($arrMapeoFilas);
                //Sumo cada fila de matrícula a la fila de nivel que corresponde
                foreach ($objCuadroMat->GetFilas() as $objFilaMat) {
                    foreach ($arrMapeoFilas as $intFila => $arrFilasGrados) {
                        if (in_array($objFilaMat->IdFila, $arrFilasGrados))
                            $arrTotalMat[$intFila] += $objFilaMat->GetCelda($objColumnaMat)->Valor;
                    }
                }
                break;
            default:
                throw new QCallerException("Consistencia llamada en cuadro no contemplado en el cuadro " . get_class($objCuadroExt));
        }
        // inicializo totales a 0
        foreach ($arrIdTotalExt as $i)
            $arrTotalExt[$i] = 0;

        try { // Si existe la columna Total(5) uso esa
            foreach ($arrIdTotalExt as $idColTot)
                $arrTotalExt[$idColTot] += $objCuadroExt->getFila($idColTot)->GetCelda($objCuadroExt->getColumna($col))->Valor;
            $blnHasTotal = true;
        } catch (QCallerException $e) { // sino existe la columna Total(5)
            // Suma las columnas por fila del cuadro
            foreach ($objCuadroExt->GetColumnas() as $objCol)
                foreach ($arrIdTotalExt as $idColTot)
                    $arrTotalExt[$idColTot] += $objCuadroExt->getFila($idColTot)->GetCelda($objCol)->Valor;
            $blnHasTotal = false;
        }
        //   return array($arrTotalExt,$arrTotalMat,$arrIdTotalExt,$blnHasTotal);
        return array('TotalExt' => $arrTotalExt, 'TotalMat' => $arrTotalMat, 'IdTotalExt' => $arrIdTotalExt, 'TieneTotal' => $blnHasTotal);
    }

    public static function GetCOfertaAgregadaFromSala($intCodSala) {
        switch ($intCodSala) {
            case 0:
            case 1:
            case 2:
            case 20:
            case 21:
            case 22:
                return 800; // Común - Jardin Maternal
            case 3:
            case 4:
            case 5:
            case 23:
            case 24:
            case 25:
                return 300; // Común - Jardin Infantes
            case '': 
                return null;
            default:
                throw new QCallerException("No se pudo encontrar oferta para el CodigoValor " . $intCodSala);
        }
    }

    
     public static function GetCOfertaAgregadaEgbByGrado($intCodGrado) {
        switch ($intCodGrado) {
           
            case 262:
            case 263:
            case 264:
            case 265:
            case 266:
            case 267:
            case 277:
                return 4600; // Común - EGB 1 y 2

            case 268:
            case 269:
            case 270:


                return 2800; // Común - EGB 3



            case '':
                return null;
            default:
                throw new QCallerException("No se pudo encontrar oferta para el CodigoValor " . $intCodGrado);
        }
    }
    
    
    /**
     * Recibe un título formateado como el autocomplete y devuelve el objeto OLTPTituloTipo
     * Ej: 21010078 Manualidades
     *
     * @param string $strTitulo
     * @param integer $intCNivelTitulo
     * @param boolean $blnSinCodigo
     * @return OLTPTituloTipo
     */
    public static function GetTitulo($strTitulo, $intCNivelTitulo = null, $blnSinCodigo = false) {
        //HACK si el texto no incluye el código pongo la descripción en el indice 2 del array (como si fuese descompuesto por el preg_match)
        if ($blnSinCodigo)
            $arrMatches = array(2 => $strTitulo);

        if ($blnSinCodigo || preg_match('/([0-9]{8})\s(.+)/', utf8_decode($strTitulo), $arrMatches)) {
            // HACK para soportar UTF-8
            if (!$blnSinCodigo)
                foreach ($arrMatches as $k => $strMatch) {
                    $arrMatches[$k] = utf8_encode($strMatch);
                }
            // Verificamos la descripción
            $strText = trim($arrMatches[2]);
            $arrConditions = array(QQ::Equal(QQN::OLTPTituloTipo()->Descripcion, $strText));

            // Si tengo definido para la columna el tipo de dato, filtro los resultados por el CNivelTitulo correspondiente
            if ($intCNivelTitulo)
                array_push($arrConditions, QQ::Equal(QQN::OLTPTituloTipo()->CNivelTitulo, $intCNivelTitulo));

            if (!$blnSinCodigo) {
                // Verificamos el código
                $strText = trim($arrMatches[1]);
                $intCodRama = (int) substr($strText, 0, 1);
                $intCodDisciplina = (int) substr($strText, 1, 1);
                $intCodCarrera = (int) substr($strText, 2, 2);
                $intCodTitulo = (int) substr($strText, 4, 4);

                if ($intCodRama)
                    array_push($arrConditions, QQ::Equal(QQN::OLTPTituloTipo()->CodRama, $intCodRama));
                if ($intCodDisciplina)
                    array_push($arrConditions, QQ::Equal(QQN::OLTPTituloTipo()->CodDisciplina, $intCodDisciplina));
                if ($intCodCarrera)
                    array_push($arrConditions, QQ::Equal(QQN::OLTPTituloTipo()->CodCarrera, $intCodCarrera));
                array_push($arrConditions, QQ::Equal(QQN::OLTPTituloTipo()->CodTitulo, $intCodTitulo));
            }
            try {
                return OLTPTituloTipo::QuerySingle(QQ::AndCondition($arrConditions));
            } catch (Exception $e) { }
        }
        return null;
    }

}

?>
