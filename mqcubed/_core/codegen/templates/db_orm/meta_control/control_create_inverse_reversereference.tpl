    public $<%= $strControlId %>;
    /**<% $a='$objReverseReferenceTable = $objCodeGen->GetTable($objReverseReference->Table); $objReverseReferenceColumn = $objReverseReferenceTable->ColumnArray[strtolower($objReverseReference->Column)]'; %>
     * Gets all associated <%= $objReverseReference->ObjectDescriptionPlural %> as an array of <%= $objReverseReference->VariableType %> objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return <%= $objReverseReference->VariableType %>[]
    */ 
    public function <%= $strControlId %>_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = '<%= $objReverseReference->VariableType %>';
        $strConfigArray['strRefreshMethod'] = '<%= $objReverseReference->ObjectDescription; %>Array';
        $strConfigArray['strParentPrimaryKeyProperty'] = '<%= $objReverseReferenceColumn->PropertyName %>';
        $strConfigArray['strPrimaryKeyProperty'] = '<%= $objCodeGen->GetTable($objReverseReference->Table)->PrimaryKeyColumnArray[0]->PropertyName %>';
        $strConfigArray['strAddMethod'] = 'Add<%= $objReverseReference->ObjectDescription; %>';
        $strConfigArray['strRemoveMethod'] = 'Remove<%= $objReverseReference->ObjectDescription; %>';
        $strConfigArray['Columns'] = array();
<% foreach ($objCodeGen->GetTable($objReverseReference->Table)->ColumnArray as $objColumn) { %><% if ($objColumn->PropertyName != $objReverseReferenceColumn->PropertyName && !$objColumn->PrimaryKey) { %>
<% if ($objColumn->Reference) { %>
        $strConfigArray['Columns']['<%= $objColumn->Reference->PropertyName %>'] = QApplication::Translate('<%= $objColumn->Reference->PropertyName %>');
<% } %><% if (!$objColumn->Reference) { %>
        $strConfigArray['Columns']['<%= $objColumn->PropertyName %>'] = QApplication::Translate('<%= $objColumn->PropertyName %>');
<% } %><% } %><% } %>

        $this-><%= $strControlId %> = new QListPanel($this->objParentObject, $this-><%= $strObjectName %>, $strConfigArray, $strControlId);
        $this-><%= $strControlId %>->Name = <%= $objReverseReference->VariableType %>::Noun();
        $this-><%= $strControlId %>->SetNewMethod($this, "<%= $strControlId %>_New");
        $this-><%= $strControlId %>->SetEditMethod($this, "<%= $strControlId %>_Edit");
        return $this-><%= $strControlId %>;
    }

    public function <%= $strControlId %>_New() {
        <%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray['lst<%= $objReverseReferenceColumn->PropertyName %>Object'] = false;
        $strControlsArray = array_keys(<%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray, true);
        $this-><%= $strControlId %>->ModalPanel = new <%= $objReverseReference->VariableType %>ModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this-><%= $strControlId %>->ModalPanel->objCallerControl = $this-><%= $strControlId %>;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function <%= $strControlId %>_Edit($intKey) {
        <%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray['lst<%= $objReverseReferenceColumn->PropertyName %>Object'] = false;
        $strControlsArray = array_keys(<%= $objReverseReference->VariableType %>ModalPanel::$strControlsArray, true);
        $obj = $this->obj<%= $objTable->ClassName %>-><%= $objReverseReference->ObjectDescription %>Array[$intKey];
        $this-><%= $strControlId %>->ModalPanel = new <%= $objReverseReference->VariableType %>ModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this-><%= $strControlId %>->ModalPanel->objCallerControl = $this-><%= $strControlId %>;
        $this->objParentObject->Modal->ShowDialogBox();
    }
