    protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Columns (note that you can use strings for <%= $objTable->Name %>'s properties, or you
        // can traverse down QQN::<%= $objTable->Name %>() to display fields that are down the hierarchy)
<% foreach ($objTable->ColumnArray as $objColumn) { %>
<% if (!$objColumn->Reference) { %>
        if (<%= $objTable->ClassName %>DataGrid::$strColumnsArray['<%= $objColumn->PropertyName %>']) $this->MetaAddColumn('<%= $objColumn->PropertyName %>')->Title = QApplication::Translate('<%= $objColumn->PropertyName %>');
<% } %>
<% if ($objColumn->Reference && $objColumn->Reference->IsType) { %>
        if (<%= $objTable->ClassName %>DataGrid::$strColumnsArray['<%= $objColumn->PropertyName %>']) $this->MetaAddTypeColumn('<%= $objColumn->PropertyName %>', '<%= $objColumn->Reference->VariableType %>')->Title = QApplication::Translate('<%= $objColumn->PropertyName %>');
<% } %>
<% if ($objColumn->Reference && !$objColumn->Reference->IsType) { %>
        if (<%= $objTable->ClassName %>DataGrid::$strColumnsArray['<%= $objColumn->Reference->PropertyName %>']) $this->MetaAddColumn(QQN::<%= $objTable->ClassName %>()-><%= $objColumn->Reference->PropertyName %>)->Title = QApplication::Translate('<%= $objColumn->Reference->PropertyName %>');
<% } %>
<% } %><% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %><% if ($objReverseReference->Unique) { %>
        if (<%= $objTable->ClassName %>DataGrid::$strColumnsArray['<%= $objReverseReference->ObjectDescription %>']) $this->MetaAddColumn(QQN::<%= $objTable->ClassName; %>()-><%= $objReverseReference->ObjectDescription %>)->Title = QApplication::Translate('<%= $objReverseReference->ObjectDescription %>');
<% } %><% } %>
    }