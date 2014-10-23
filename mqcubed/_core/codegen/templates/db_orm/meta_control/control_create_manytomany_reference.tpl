    /**
     * Create and setup a QListTable <%= $strControlId %>
     * @param string $strControlId optional ControlId to use
     * @return QListTable
     */
    public function <%= $strControlId %>_Create($strControlId = null) {
        
        $strConfigArray = array();
        $strConfigArray['strEntity'] = '<%= $objManyToManyReference->ObjectDescription %>';
        $strConfigArray['strRefreshMethod'] = '<%= $objManyToManyReference->ObjectDescription; %>Array';
        $strConfigArray['strPrimaryKeyProperty'] = '<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>';
        $strConfigArray['strAddMethod'] = 'Add<%= $objManyToManyReference->ObjectDescription; %>';
        $strConfigArray['strRemoveMethod'] = 'Remove<%= $objManyToManyReference->ObjectDescription; %>';
        $strConfigArray['Columns'] = array();
<% foreach ($objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->ColumnArray as $objColumn) { %>
<% if ($objColumn->Reference) { %>
        $strConfigArray['Columns']['<%= $objColumn->Reference->PropertyName %>'] = QApplication::Translate('<%= $objColumn->Reference->PropertyName %>');
<% } %><% if (!$objColumn->Reference) { %>
        $strConfigArray['Columns']['<%= $objColumn->PropertyName %>'] = QApplication::Translate('<%= $objColumn->PropertyName %>');
<% } %><% } %>

        $this-><%=$strControlId %> = new QListTable($this->objParentObject, $this-><%= $strObjectName %>, $strConfigArray, $strControlId);
        $this-><%=$strControlId %>->Name = QApplication::Translate('<%= $objManyToManyReference->ObjectDescriptionPlural %>');
        $this-><%=$strControlId %>->SetOpenMethod($this, "<%=$strControlId %>_Open");
        
        return $this-><%= $strControlId %>;
    }

    /**
     * Create and setup a ReadOnly QListTable <%= $strLabelId %>
     * @param string $strControlId optional ControlId to use
     * @return QListTable
     */
    public function <%= $strLabelId %>_Create($strControlId = null) {
        $this-><%= $strLabelId %> = <%= $strControlId %>_Create($strControlId);
        $this-><%= $strLabelId %>->ReadOnly = true;
        return $this-><%= $strLabelId %>;
    }

    public function <%= $strControlId %>_Open() {
        $this->objParentObject->Modal->Title = sprintf('Seleccione %s %s',(<%= $objManyToManyReference->ObjectDescription %>::GenderMale() ? 'los' : 'las'), <%= $objManyToManyReference->ObjectDescription %>::NounPlural());
        $this-><%= $strControlId %>->DataGrid = new <%= $objManyToManyReference->VariableType %>DataGrid($this->objParentObject->Modal, array_keys($this-><%= $strControlId %>->Columns));
        //TODO poner los nombres de las columnas en función de lo ya definido en <%= $strControlId %>->Columns
        $this-><%= $strControlId %>->DataGrid->RowClickMethod = array($this, '<%= $strControlId %>_Add');
        $this-><%= $strControlId %>_UpdateConditions();
        $this->objParentObject->Modal->RemoveChildsOnHide = true;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    protected function <%= $strControlId %>_UpdateConditions() {
        $int<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>Array = array();
        foreach ($this->obj<%= $objTable->ClassName %>-><%= $objManyToManyReference->VariableType %>Array as $<%= $objManyToManyReference->VariableName %>) {
            $int<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>Array[] = $<%= $objManyToManyReference->VariableName %>-><%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>;
        }
        $objCondition = QQ::NotIn(QQN::<%= $objManyToManyReference->VariableType %>()-><%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>, $int<%= $objCodeGen->GetTable($objManyToManyReference->AssociatedTable)->PrimaryKeyColumnArray[0]->PropertyName %>Array);
        if ($this-><%= $strControlId %>->Conditions !== QQ::All()) {
            $objCondition = QQ::AndCondition($objCondition, $this-><%= $strControlId %>->Conditions);
        }
        $this-><%= $strControlId %>->DataGrid->SetCondition($objCondition);
    }

    public function <%= $strControlId %>_Add(<%= $objManyToManyReference->VariableType %> $<%= $objManyToManyReference->VariableName %>) {
        $this->obj<%= $objTable->ClassName %>->Add<%= $objManyToManyReference->VariableType %>($<%= $objManyToManyReference->VariableName %>);
        $this-><%= $strControlId %>_UpdateConditions();
        $this-><%= $strControlId %>->MarkAsModified();
    }