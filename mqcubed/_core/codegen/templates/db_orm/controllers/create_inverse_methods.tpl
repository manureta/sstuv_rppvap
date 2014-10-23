<% if (count($objTable->ReverseReferenceArray)>0) { %>
<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %><% if (!$objReverseReference->Unique) { %>
<%@control_create_inverse_reversereference('objTable', 'objReverseReference'); %>
<% } %><% } %><% } %>
<% if (count($objTable->ManyToManyReferenceArray)>0) { %>
    //Controles de asignación NaN
<% foreach ($objTable->ManyToManyReferenceArray as $objManyToManyReference) { %>
<% @control_create_manytomany_reference('objTable', 'objManyToManyReference'); %>            
<% } %><% } %>