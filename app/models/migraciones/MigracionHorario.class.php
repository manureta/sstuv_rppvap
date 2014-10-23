<?php

/* Migra el cuadro Horario de funcionamiento del establecimento */

abstract class MigracionHorario extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        $arrTurnos = array(
            array(610,611),
            array(612,613),
            array(614,615)
        );
        
        //$objOfertaDictada = self:: GetOfertaDictadabyCuadro($objCuadro);
        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCOfertaAgregada = $objFila->CodigoRelacional;
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());            
            foreach($arrTurnos as $arrIdCols){
                if($objFila->GetCeldaByIdColumna($arrIdCols[0])->Valor=="" || $objFila->GetCeldaByIdColumna($arrIdCols[1])->Valor=="")
                    continue; // si alguna de las dos estan vacias salgo
                $objHorario = self::GetHorario($objOfertaDictada->IdOfertaDictada, $objCuadro->GetColumna($arrIdCols[0])->CodigoRelacional);
                $objHorario->HoraDesde = $objFila->GetCeldaByIdColumna($arrIdCols[0])->Valor;
                $objHorario->HoraHasta = $objFila->GetCeldaByIdColumna($arrIdCols[1])->Valor;
                $objHorario->Save();                
            }
        }        
    }

    public static function GetHorario($intIdOfertaDictada, $intCTurno) {
        //$objHorario = OLTPInternados:: LoadByIdOfertaDictada($intIdOfertaDictada);
        $objHorario = OLTPHorario::LoadByIdOfertaDictadaCTurno($intIdOfertaDictada, $intCTurno);
        if (!$objHorario) {
            $objHorario = new OLTPHorario();
            $objHorario->IdOfertaDictada = $intIdOfertaDictada;
            $objHorario->CTurno = $intCTurno;
        }
        return $objHorario;
    }

}

?>
