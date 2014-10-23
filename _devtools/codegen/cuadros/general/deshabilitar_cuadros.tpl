
    public $arrIdCuadrosQueDeshabilita = array(<%= $objCodeGen->ImplodeObjectArray(',', "'", "'", 'IdDefinicionCuadro', DefcuadroDefconsistencia::GetCuadrosDeshabilita($objDefinicionCuadro->IdDefinicionCuadro)) %>);

