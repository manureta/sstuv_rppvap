<% foreach ($objReverseReferenceTable->ColumnArray as $objColumn) { %><% if ($objColumn->PrimaryKey) { %>
            $strConfigArray['strPropertyName'] = '<%= $objColumn->PropertyName %>';
            <% } %><% if ($objColumn->PropertyName != $objReverseReferenceColumn->PropertyName && !$objColumn->PrimaryKey) { %>
            $strConfigArray['Elements']['<%= $objColumn->PropertyName %>'] = '<%= $objColumn->PropertyName %>';
            <% } %>           
<% } %>


