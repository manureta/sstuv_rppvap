    protected function CrearFilas() {
        // Filas Generadas. No Tocar.
    <% foreach ($objDefinicionCuadro->getDefcuadroDeffila() as $objDefcuadroDeffila) { %>
<% $objDefinicionFila = $objDefcuadroDeffila->IdDefinicionFilaObject; %>
        $objFila = new Fila();
        $objFila->Nombre = '<%= $objDefinicionFila->Nombre; %>';
        $objFila->IdDefinicionFila = <%= $objDefinicionFila->IdDefinicionFila; %>;
        $objFila->Orden = <%= (int)$objDefcuadroDeffila->Orden; %>;
        $objFila->TablaTipo = '<%= $objDefinicionFila->TablaTipo %>';
        $objFila->CodigoRelacional = <%= (int)$objDefinicionFila->CodigoRelacional %>;
        $objFila->Cuadro = $this;
        $this->AddFila($objFila);
        // Fila <%= $objDefinicionFila->Nombre; %> Generada.
    <% } %>

    }
