    /**
     * Corre la Migracion del Cuadro al modelo OLTP
     */
    public function Migrar() {
        Migracion<%= QConvertNotation::CamelCaseFromUnderscore($objDefinicionCuadro->IdDefinicionMigracionObject->NombreCorto) %>::Ejecutar($this);
    }