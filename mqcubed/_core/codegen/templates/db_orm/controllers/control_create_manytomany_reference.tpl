    // Métodos necesarios para el control QListTable vinculado a <%= $objManyToManyReference->ObjectDescription %>

    public function lst<%= $objManyToManyReference->ObjectDescriptionPlural %>_Associate($strControlId, $strFormId, $strParameter) {
        $this->Modal->RemoveChildControls(true);
        $this->Modal->Title = sprintf('Seleccione %s %s',(<%= $objManyToManyReference->ObjectDescription %>::GenderMale() ? 'los' : 'las'), <%= $objManyToManyReference->ObjectDescription %>::NounPlural());
        $this->dtgModal = new <%= $objManyToManyReference->VariableType %>DataGrid($this->Modal, array_keys($this->lst<%= $objManyToManyReference->ObjectDescriptionPlural %>->Columns));
        //TODO poner los nombres de las columnas en función de lo ya definido en lst<%= $objManyToManyReference->ObjectDescriptionPlural %>->Columns
        $this->dtgModal->RowClickMethod = 'lst<%= $objManyToManyReference->ObjectDescriptionPlural %>_Add';
        $this->lst<%= $objManyToManyReference->ObjectDescriptionPlural %>_UpdateConditions();
        $this->Modal->ShowDialogBox();
    }

    protected function lst<%= $objManyToManyReference->ObjectDescriptionPlural %>_UpdateConditions() {
        $obj<%= $objTable->ClassName %> = $this->mct<%= $objTable->ClassName %>->obj<%= $objTable->ClassName %>;
        $int<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>Array = array();
        foreach ($obj<%= $objTable->ClassName %>-><%= $objManyToManyReference->VariableType %>Array as $<%= $objManyToManyReference->VariableName %>) {
            $int<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>Array[] = $<%= $objManyToManyReference->VariableName %>-><%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>;
        }
        $this->dtgModal->SetCondition(QQ::NotIn(QQN::<%= $objManyToManyReference->VariableType %>()-><%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>, $int<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>Array));
    }

    public function lst<%= $objManyToManyReference->ObjectDescriptionPlural %>_Add(<%= $objManyToManyReference->VariableType %> $<%= $objManyToManyReference->VariableName %>) {
        $this->mct<%= $objTable->ClassName %>->obj<%= $objTable->ClassName %>->Add<%= $objManyToManyReference->VariableType %>($<%= $objManyToManyReference->VariableName %>);
        $this->lst<%= $objManyToManyReference->ObjectDescriptionPlural %>_UpdateConditions();
        $this->lst<%= $objManyToManyReference->ObjectDescriptionPlural %>->MarkAsModified();
    }