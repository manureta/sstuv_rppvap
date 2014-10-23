<?php
/**
* AlumDomJuris
* Migra Cuadros de Alumnos Domicilio en otra Jurisdicción
*/
abstract class MigracionAlumDomJuris extends MigracionBase {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){
 $objLocalizacion = Session::getLocalizacion();
        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->GetCelda($objCuadro->GetColumna(702))->Valor != '') { 
                $objFormacionTipo = self::GetFormacionTipo($objFila);
                $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();

                $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());

                $objJurisdiccion = self::Getjurisdiccion($objOfertaDictada->IdOfertaDictada, $objFormacionTipo->CFormacion);
                $objJurisdiccion->AlumnosJurisdiccion = $objFila->GetCelda($objCuadro->GetColumna(702))->Valor;
                $objJurisdiccion->AlumnosPais = $objFila->GetCelda($objCuadro->GetColumna(703))->Valor;
                $objJurisdiccion->Save();
            }
        }
    }
    
     public static function Getjurisdiccion($intIdOfertaDictada, $intCFormacion) {
     //   $objJurisdiccion = OLTPJursidiccion::LoadByIdOfertaDictadaCFormacionCJurisdiccion($intIdOfertaDictada, $intCFormacion, $intCJurisdiccion);
          $objJurisdiccion = OLTPJurisdiccion::LoadByIdOfertaDictadaCFormacion($intIdOfertaDictada, $intCFormacion);
        if (!$objJurisdiccion) {
            $objJurisdiccion = new OLTPJurisdiccion();
            $objJurisdiccion->IdOfertaDictada = $intIdOfertaDictada;
            $objJurisdiccion->CFormacion = $intCFormacion;
           
        }
        return $objJurisdiccion;
    }

    

    // ESTA FUNCION PASARLA A MIGRACIONBASE


    

}
?>
