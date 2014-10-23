    <% $objManyToManyReferenceTable = $objCodeGen->TableArray[strtolower($objManyToManyReference->AssociatedTable)]; %>
    // Related Many-to-Many Objects' Methods for <%= $objManyToManyReference->ObjectDescription %>
    //-------------------------------------------------------------------

    //Public Model methods for add and remove Items from the _<%= $objManyToManyReference->ObjectDescription%>Array
    /**
    * Add a Item to the _<%= $objManyToManyReference->ObjectDescription%>Array
    * @param <%= $objManyToManyReferenceTable->ClassName %> $objItem
    * @return <%= $objManyToManyReferenceTable->ClassName %>[]
    */
    public function Add<%= $objManyToManyReferenceTable->ClassName %>(<%= $objManyToManyReferenceTable->ClassName %> $objItem){
       //add to the collection and add me as a parent
        //$objItem-><%= $objManyToManyReference->VariableName %> = $this;
        $this->obj<%=$objManyToManyReference->ObjectDescription%>Array = $this-><%=$objManyToManyReference->ObjectDescription%>Array;
        $this->obj<%=$objManyToManyReference->ObjectDescription%>Array[] = $objItem;

        if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);

        return $this-><%=$objManyToManyReference->ObjectDescription%>Array;

    }

    /**
    * Remove a Item to the _<%= $objManyToManyReference->ObjectDescription%>Array
    * @param <%= $objManyToManyReferenceTable->ClassName %> $objItem
    * @return <%= $objManyToManyReferenceTable->ClassName %>[]
    */
    public function Remove<%= $objManyToManyReferenceTable->ClassName %>(<%= $objManyToManyReferenceTable->ClassName %> $objItem){
        //remove Item from the collection
        $arr = $this->obj<%= $objManyToManyReference->ObjectDescription%>Array;
        $this->obj<%= $objManyToManyReference->ObjectDescription%>Array = array();
        foreach($arr as $objRelItem) {
            if ($objRelItem !== $objItem)
                $this->obj<%= $objManyToManyReference->ObjectDescription%>Array[] = $objRelItem;
        }
    }

    /**
     * Gets all many-to-many associated <%= $objManyToManyReference->ObjectDescriptionPlural %> as an array of <%= $objManyToManyReference->VariableType %> objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return <%= $objManyToManyReference->VariableType %>[]
    */ 
    public function Get<%= $objManyToManyReference->ObjectDescription %>Array($objOptionalClauses = null) {
            if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
                    return array();

            try {
                    return <%= $objManyToManyReference->VariableType %>::LoadArrayBy<%= $objManyToManyReference->OppositeObjectDescription %>($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>, $objOptionalClauses);
            } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
            }
    }

    /**
     * Counts all many-to-many associated <%= $objManyToManyReference->ObjectDescriptionPlural %>
     * @return int
    */ 
    public function Count<%= $objManyToManyReference->ObjectDescriptionPlural %>() {
            if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
                    return 0;

            return <%= $objManyToManyReference->VariableType %>::CountBy<%= $objManyToManyReference->OppositeObjectDescription %>($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>);
    }

    /**
     * Checks to see if an association exists with a specific <%= $objManyToManyReference->ObjectDescription %>
     * @param <%= $objManyToManyReference->VariableType %> $<%= $objManyToManyReference->VariableName %>
     * @return bool
    */
    public function Is<%= $objManyToManyReference->ObjectDescription %>Associated(<%= $objManyToManyReference->VariableType %> $<%= $objManyToManyReference->VariableName %>) {
            if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
                    throw new QUndefinedPrimaryKeyException('Unable to call Is<%= $objManyToManyReference->ObjectDescription %>Associated on this unsaved <%= $objTable->ClassName %>.');
            if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($' . $objManyToManyReference->VariableName . '->', '))', 'PropertyName', $objManyToManyReferenceTable->PrimaryKeyColumnArray) %>)
                    throw new QUndefinedPrimaryKeyException('Unable to call Is<%= $objManyToManyReference->ObjectDescription %>Associated on this <%= $objTable->ClassName %> with an unsaved <%= $objManyToManyReferenceTable->ClassName %>.');

            $intRowCount = <%= $objTable->ClassName %>::QueryCount(
                    QQ::AndCondition(
                            QQ::Equal(QQN::<%= $objTable->ClassName %>()-><%= $objTable->PrimaryKeyColumnArray[0]->PropertyName %>, $this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>),
                            QQ::Equal(QQN::<%= $objTable->ClassName %>()-><%= $objManyToManyReference->ObjectDescription %>-><%= $objManyToManyReference->OppositePropertyName %>, $<%= $objManyToManyReference->VariableName %>-><%= $objManyToManyReferenceTable->PrimaryKeyColumnArray[0]->PropertyName %>)
                    )
            );

            return ($intRowCount > 0);
    }
    
    
    /**
     * Persiste en BD la relación entre las entidades en la tabla assn de forma atómica
     *
     */
    public function Save<%= $objManyToManyReference->ObjectDescriptionPlural %>() {
        if ((is_null($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>)))
            throw new QUndefinedPrimaryKeyException('Unable to call <%= $objManyToManyReference->ObjectDescriptionPlural %> on this unsaved <%= $objTable->ClassName %>.');

        // Get the Database Object for this Class
        $objDatabase = <%= $objTable->ClassName %>::GetDatabase();

        $strQuery = sprintf('DELETE FROM <%= $strEscapeIdentifierBegin %><%= $objManyToManyReference->Table %><%= $strEscapeIdentifierEnd %> WHERE <%= $strEscapeIdentifierBegin %><%= $objManyToManyReference->Column %><%= $strEscapeIdentifierEnd %> = %s;', $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>));

        if (count($this->obj<%= $objManyToManyReference->ObjectDescription %>Array)) {
            $strInsert = '';
            foreach ($this->obj<%= $objManyToManyReference->ObjectDescription %>Array as $<%= $objManyToManyReference->VariableName %>) {
                $strInsert .= ($strInsert == '') ?
                    sprintf('INSERT INTO <%= $strEscapeIdentifierBegin %><%= $objManyToManyReference->Table %><%= $strEscapeIdentifierEnd %> (<%= $strEscapeIdentifierBegin %><%= $objManyToManyReference->Column %><%= $strEscapeIdentifierEnd %>, <%= $strEscapeIdentifierBegin %><%= $objManyToManyReference->OppositeColumn %><%= $strEscapeIdentifierEnd %>) VALUES (%s,%s)', 
                                        $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>),$objDatabase->SqlVariable($<%= $objManyToManyReference->VariableName %>-><%= $objManyToManyReferenceTable->PrimaryKeyColumnArray[0]->PropertyName %>)) :
                    sprintf(',(%s,%s)', $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>),$objDatabase->SqlVariable($<%= $objManyToManyReference->VariableName %>-><%= $objManyToManyReferenceTable->PrimaryKeyColumnArray[0]->PropertyName %>));
            }
            $strQuery .= $strInsert;
        }

        $objDatabase->NonQuery($strQuery);

    }