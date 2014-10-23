<% foreach ($objTable->ReverseReferenceArray as $objReverseReference) { %><% if (!$objReverseReference->Unique) { %><%
    // Use the "control_create_manytomany_reference" subtemplate to generate the code
    // required to create/setup the control.
    $mixArguments = array(
        'objReverseReference' => $objReverseReference,
        'objTable' => $objTable,
        'strObjectName' => $objCodeGen->VariableNameFromTable($objTable->Name),
        'strClassName' => $objTable->ClassName,
        'strControlId' => 'lst'.$objReverseReference->ObjectDescription,
        'strLabelId' => 'lbl'.$objReverseReference->ObjectDescription,
        'objReverseReferenceTable' => $objCodeGen->GetTable($objReverseReference->Table),
        'objReverseReferenceColumn' => $objCodeGen->GetTable($objReverseReference->Table)->ColumnArray[strtolower($objReverseReference->Column)]
    );
    // Get the subtemplate and evaluate
    return $objCodeGen->EvaluateSubTemplate('control_create_inverse_reversereference.tpl', $strModuleName, $mixArguments) . "\n\n";
%><% } %><% } %>