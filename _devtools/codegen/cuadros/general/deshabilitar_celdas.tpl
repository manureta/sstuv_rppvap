
    protected function DeshabilitarCeldas() {
        $arrIdDefinicionCeldaDisabled = array(<%= $objCodeGen->ImplodeObjectArray(',', "'", "'", 'IdDefinicionCelda', DefinicionCelda::LoadArrayByIdDefinicionCuadroDisabled($objDefinicionCuadro->IdDefinicionCuadro, true)) %>);
        foreach($this->arrFilas as $i => $objFila) {
            $objFila->DeshabilitarCeldas($arrIdDefinicionCeldaDisabled);
        }
        return parent::DeshabilitarCeldas();
    }
