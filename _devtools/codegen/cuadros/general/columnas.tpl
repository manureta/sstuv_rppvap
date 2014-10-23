    protected function CrearColumnas() {
        // Columnas Generadas. No Tocar.
<% $i = 0; %>
        <% foreach ($objDefinicionCuadro->getDefcuadroDefcolumna() as $objDefinicionCuadroDefinicionColumna) { %>
        $objColumna = new Columna();
        <% if ($objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->Ancho) { %>
        $objColumna->Ancho = <%= $objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->Ancho %>;
        <%}%>
        $objColumna->Nombre = '<%= $objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->Nombre %>';
<% if (count($objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->getPosiblesValoresByCuadro($objDefinicionCuadro->IdDefinicionCuadro))) { %>
        $objColumna->PosiblesValores = array(<% foreach ($objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->getPosiblesValoresByCuadro($objDefinicionCuadro->IdDefinicionCuadro) as $objCodigoValor) { %><%= $objCodigoValor->IdCodigoValor %>=>"<%= $objCodigoValor->IdCodigoValorObject %>",<% } %>);
<% } %>
<% if (!count($objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->getPosiblesValoresByCuadro($objDefinicionCuadro->IdDefinicionCuadro))) { %>
        $objColumna->PosiblesValores = array(<% foreach ($objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->CodigoValorAsDefcolumnaCodvalorArray as $objCodigoValor) { %><%= $objCodigoValor->IdCodigoValor %>=>"<%= $objCodigoValor %>",<% } %>);
<% } %>
        $objColumna->TipoDato = TipoDatoType::<%= TipoDatoType::ToToken($objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->CTipoDato); %>;
        $objColumna->IdDefinicionColumna = <%= $objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->IdDefinicionColumna %>;
        $objColumna->Orden = <%= (int)$objDefinicionCuadroDefinicionColumna->Orden %>;
        $objColumna->TablaTipo = '<%= $objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->TablaTipo %>';
        $objColumna->CodigoRelacional = <%= (int)$objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->CodigoRelacional %>;
        $objColumna->Cuadro = $this;
        $this->AddColumna($objColumna);
        // Columna <%= $objDefinicionCuadroDefinicionColumna->IdDefinicionColumnaObject->Nombre %> generada automaticamente
        
	<% } %>
    }