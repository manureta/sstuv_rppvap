    /**
     * Corre las Validaciones del Cuadro
     */
    public function Verificar($blnSoloPropias = false) {
            if($this->Conflicto) return;
            $blnCuadroVacio = $this->IsEmpty();
            // Consistencias propias de este cuadro
<% foreach ($objDefinicionCuadro->DefcuadroDefconsistenciaAsIdArray as $objDefCuaDefCons ){ %>
    <% if (count($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray) ) { %>
        <% $strFuncArgs = $objCodeGen->ImplodeObjectArray(',', '$objCuadro', '', 'IdDefinicionCuadro', $objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray); %>
    <% if (!in_array($objDefCuaDefCons->IdDefinicionConsistenciaObject->CTipoConsistencia, array(TipoConsistenciaType::FALTANTE,TipoConsistenciaType::DESHABILITACION))) { %>
            if(!$blnCuadroVacio)
    <% } %>
    				try {
        <% foreach ($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray as $objDefCuaDefconsDefCua) { %>
                $objDAO<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %> = new CuadroDAO();
        <% } %>
        <% foreach ($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray as $objDefCuaDefconsDefCua) { %>
                $objCuadro<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %> = $objDAO<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>->LoadCuadro(<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>, $this->Localizacion);
        <% } %>
                try { Consistencia<%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>::Ejecutar($this, <%= $strFuncArgs %>); }
                    catch (Exception $e) { ConsistenciaHelper::HandleException(<%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>, <%= $objDefCuaDefCons->IdDefinicionCuadro %>, array(<%= $objCodeGen->ImplodeObjectArray(',', '', '', 'IdDefinicionCuadro', $objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray) %>), $e); }
            } catch (CuadroDAODatosCuadroNoExiste $objExc) { 
                // puede no existir el datoscuadro si no se tiene que cargar el cuadro
            }
    <% } %>
    <% if (!count($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray)) { %>
    <% if (!in_array($objDefCuaDefCons->IdDefinicionConsistenciaObject->CTipoConsistencia, array(TipoConsistenciaType::FALTANTE,TipoConsistenciaType::DESHABILITACION))) { %>
            if(!$blnCuadroVacio)
    <% } %>
            try { Consistencia<%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>::Ejecutar($this); } catch (Exception $e) { ConsistenciaHelper::HandleException(<%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>, <%= $objDefCuaDefCons->IdDefinicionCuadro %>, array(), $e); }
    <% } %>
<% } %>

            // Consistencias que involucran a este cuadro secundariamente
            if($blnSoloPropias) return; // pidieron explicitamente correr solo las consistencias propias del cuadro
            if($blnCuadroVacio) return; // las secundarias se corren sólo si el cuadro no está vacio
		<% foreach (DefcuadroDefconsistencia::QueryArray(QQ::AndCondition(QQ::Equal(QQN::DefcuadroDefconsistencia()->DefcuadroDefconsistenciaDefcuadroAsId->IdDefinicionCuadro, $objDefinicionCuadro->IdDefinicionCuadro), QQ::NotIn(QQN::DefcuadroDefconsistencia()->IdDefinicionConsistenciaObject->CTipoConsistencia, array(TipoConsistenciaType::FALTANTE, TipoConsistenciaType::DESHABILITACION))),QQ::OrderBy(QQN::DefcuadroDefconsistencia()->IdDefinicionConsistencia)) as $objDefCuaDefCons) { %>
				<% $objCuadroToRun = $objDefCuaDefCons->IdDefinicionCuadroObject; %>
				<% $strFuncArgs = str_replace('$objCuadro'.$objDefinicionCuadro->IdDefinicionCuadro.'_'.$objDefCuaDefCons->IdDefinicionConsistencia, '$this', $objCodeGen->ImplodeObjectArray(', ', '$objCuadro', '_'.$objDefCuaDefCons->IdDefinicionConsistencia, 'IdDefinicionCuadro', $objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray)); %>
            try {
                $objDAO<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %> = new CuadroDAO();
        <% foreach ($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray as $objDefCuaDefconsDefCua) { %>
            <% if ($objDefCuaDefconsDefCua->IdDefinicionCuadro != $objDefinicionCuadro->IdDefinicionCuadro) { %>
                $objDAO<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %> = new CuadroDAO();
						<% } %>
        <% } %>
        <% foreach ($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray as $objDefCuaDefconsDefCua) { %>
            <% if ($objDefCuaDefconsDefCua->IdDefinicionCuadro != $objDefinicionCuadro->IdDefinicionCuadro) { %>
                $objCuadro<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %> = $objDAO<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>->LoadCuadro(<%= $objDefCuaDefconsDefCua->IdDefinicionCuadro %>, $this->Localizacion);
						<% } %>
        <% } %>
                $objCuadro<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %> = $objDAO<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>->LoadCuadro(<%= $objCuadroToRun->IdDefinicionCuadro %>, $this->Localizacion);
                if (!$objCuadro<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>->IsEmpty()) {
                    try { Consistencia<%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>::Ejecutar($objCuadro<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>, <%= $strFuncArgs %>); }
                        catch (Exception $e) { ConsistenciaHelper::HandleException(<%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>, <%= $objCuadroToRun->IdDefinicionCuadro %>, array(<%= $objCodeGen->ImplodeObjectArray(', ', '', '', 'IdDefinicionCuadro', $objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray) %>), $e); }
                    if ($objCuadro<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>->HasError || $objCuadro<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>->HasInconsistencia) {
										   <% foreach ($objDefCuaDefCons->DefcuadroDefconsistenciaDefcuadroAsIdArray as $objDefCuaDefconsDefCua) { %><% $objCuadroToRun = $objDefCuaDefCons->IdDefinicionCuadroObject; %>
                       <%= str_replace('$objCuadro'.$objDefinicionCuadro->IdDefinicionCuadro.'_'.$objDefCuaDefCons->IdDefinicionConsistencia, '$this', '$objCuadro'.$objDefCuaDefconsDefCua->IdDefinicionCuadro.'_'.$objDefCuaDefCons->IdDefinicionConsistencia) %>->AddInconsistenciaHijo($objCuadro<%= $objCuadroToRun->IdDefinicionCuadro %>_<%= $objDefCuaDefCons->IdDefinicionConsistencia %>, <%= $objDefCuaDefCons->IdDefinicionConsistenciaObject->Codigo %>);
                       <% } %>
                    }
                }
            } catch (CuadroDAODatosCuadroNoExiste $objExc) { 
                // puede no existir el datoscuadro si no se tiene que cargar el cuadro
            }
		<% } %>
    }
