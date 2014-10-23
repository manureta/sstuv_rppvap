//DEPRECADO    

/**<% $objReverseReferenceTable = $objCodeGen->TableArray[strtolower($objReverseReference->Table)]; $objReverseReferenceColumn = $objReverseReferenceTable->ColumnArray[strtolower($objReverseReference->Column)]; %>
      * Gets all associated <%= $objReverseReference->ObjectDescriptionPlural %> as an array of <%= $objReverseReference->VariableType %> objects
      * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
      * @return <%= $objReverseReference->VariableType %>[]
      *
    public function lst<%= $objReverseReference->ObjectDescription %>_Create($strControlId, $strFormId, $strParameter) {
        <%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray['lst<%= $objReverseReferenceColumn->PropertyName %>Object'] = false;
        $strControlsArray = array_keys(<%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray, true);
        $pnlModalEdit = new <%= $objReverseReference->VariableType %>ModalPanel($this->Modal,$strControlsArray);
        $pnlModalEdit->objCallerControl = $this->lst<%= $objReverseReference->ObjectDescription %>;
        $this->Modal->ShowDialogBox();
    }

    public function lst<%= $objReverseReference->ObjectDescription %>_Edit($strControlId, $strFormId, $strParameter) {
        <%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray['lst<%= $objReverseReferenceColumn->PropertyName %>Object'] = false;
        $strControlsArray = array_keys(<%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray, true);
        $obj = $this->mct<%= $objTable->ClassName %>->obj<%= $objTable->ClassName %>-><%= $objReverseReference->ObjectDescription %>Array[$strParameter];
        $pnlModalEdit = new <%= $objReverseReference->VariableType %>ModalPanel($this->Modal,$strControlsArray, $obj);
        $pnlModalEdit->objCallerControl = $this->lst<%= $objReverseReference->ObjectDescription %>;
        $this->Modal->ShowDialogBox();
    }
*/