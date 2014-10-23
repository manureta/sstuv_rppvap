		<% $objReverseReferenceTable = $objCodeGen->TableArray[strtolower($objReverseReference->Table)]; %>
		<% $objReverseReferenceColumn = $objReverseReferenceTable->ColumnArray[strtolower($objReverseReference->Column)]; %>
		// Related Objects' Methods for <%= $objReverseReference->ObjectDescription %>
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _<%=$objReverseReference->ObjectDescription%>Array
                /**
                * Add a Item to the _<%=$objReverseReference->ObjectDescription%>Array
                * @param <%=$objReverseReferenceTable->ClassName %> $objItem
                * @return <%=$objReverseReferenceTable->ClassName %>[]
                */
                public function Add<%=$objReverseReference->ObjectDescription %>(<%=$objReverseReferenceTable->ClassName %> $objItem){
                   //add to the collection and add me as a parent
                    $objItem-><%=$objReverseReference->PropertyName %>Object = $this;
                    $this->obj<%=$objReverseReference->ObjectDescription%>Array = $this-><%=$objReverseReference->ObjectDescription%>Array;
                    $this->obj<%=$objReverseReference->ObjectDescription%>Array[] = $objItem;

                    //automatic persistence to de DB DEPRECATED
                    //$this->Associate<%= $objReverseReference->ObjectDescription %>($objItem);

                    return $this-><%=$objReverseReference->ObjectDescription%>Array;
                }

                /**
                * Remove a Item to the _<%=$objReverseReference->ObjectDescription%>Array
                * @param <%=$objReverseReferenceTable->ClassName %> $objItem
                * @return <%=$objReverseReferenceTable->ClassName %>[]
                */
                public function Remove<%=$objReverseReference->ObjectDescription %>(<%=$objReverseReferenceTable->ClassName %> $objItem){
                    //remove Item from the collection
                    $arrToDelete = array($objItem);
                    $this->obj<%=$objReverseReference->ObjectDescription%>Array = array_diff($arrToDelete,$this-><%=$objReverseReference->ObjectDescription%>Array);
                    //automatic persistence to de DB if necesary
<% foreach ($objReverseReferenceTable->PrimaryKeyColumnArray as $reverseReferencePK) { %>
                    if(!is_null($objItem-><%=$reverseReferencePK->PropertyName %>))
<% } %>
                        try{
                            $objItem-><%=$objReverseReference->PropertyName %>Object = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociated<%= $objReverseReference->ObjectDescription %>($objItem);
                        }

                    return $this->obj<%=$objReverseReference->ObjectDescription%>Array;
                }

		/**
		 * Gets all associated <%= $objReverseReference->ObjectDescriptionPlural %> as an array of <%= $objReverseReference->VariableType %> objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return <%= $objReverseReference->VariableType %>[]
		*/ 
		public function Get<%= $objReverseReference->ObjectDescription %>Array($objOptionalClauses = null) {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				return array();

			try {
				return <%= $objReverseReference->VariableType %>::LoadArrayBy<%= $objReverseReferenceColumn->PropertyName %>(<%= $objCodeGen->ImplodeObjectArray(', ', '$this->', '', 'VariableName', $objTable->PrimaryKeyColumnArray) %>, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated <%= $objReverseReference->ObjectDescriptionPlural %>
		 * @return int
		*/ 
		public function Count<%= $objReverseReference->ObjectDescriptionPlural %>() {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				return 0;

			return <%= $objReverseReference->VariableType %>::CountBy<%= $objReverseReferenceColumn->PropertyName %>(<%= $objCodeGen->ImplodeObjectArray(', ', '$this->', '', 'VariableName', $objTable->PrimaryKeyColumnArray) %>);
		}

		/**
		 * Associates a <%= $objReverseReference->ObjectDescription %>
		 * @param <%= $objReverseReference->VariableType %> $<%= $objReverseReference->VariableName %>
		 * @return void
		*/ 
		public function Associate<%= $objReverseReference->ObjectDescription %>(<%= $objReverseReference->VariableType %> $<%= $objReverseReference->VariableName %>) {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Associate<%= $objReverseReference->ObjectDescription %> on this unsaved <%= $objTable->ClassName %>.');
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($' . $objReverseReference->VariableName . '->', '))', 'PropertyName', $objReverseReferenceTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Associate<%= $objReverseReference->ObjectDescription %> on this <%= $objTable->ClassName %> with an unsaved <%= $objReverseReferenceTable->ClassName %>.');

			// Get the Database Object for this Class
			$objDatabase = <%= $objTable->ClassName %>::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Table %><%= $strEscapeIdentifierEnd %>
				SET
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>) . '
				WHERE
<% foreach ($objReverseReferenceTable->ColumnArray as $objColumn) { %>
	<% if ($objColumn->PrimaryKey) { %>
					<%= $strEscapeIdentifierBegin %><%= $objColumn->Name %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($<%= $objReverseReference->VariableName %>-><%= $objColumn->PropertyName %>) . ' AND
<% } %><% } %><%-----%>
			');
		}

		/**
		 * Unassociates a <%= $objReverseReference->ObjectDescription %>
		 * @param <%= $objReverseReference->VariableType %> $<%= $objReverseReference->VariableName %>
		 * @return void
		*/ 
		public function Unassociate<%= $objReverseReference->ObjectDescription %>(<%= $objReverseReference->VariableType %> $<%= $objReverseReference->VariableName %>) {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Unassociate<%= $objReverseReference->ObjectDescription %> on this unsaved <%= $objTable->ClassName %>.');
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($' . $objReverseReference->VariableName . '->', '))', 'PropertyName', $objReverseReferenceTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Unassociate<%= $objReverseReference->ObjectDescription %> on this <%= $objTable->ClassName %> with an unsaved <%= $objReverseReferenceTable->ClassName %>.');

			// Get the Database Object for this Class
			$objDatabase = <%= $objTable->ClassName %>::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Table %><%= $strEscapeIdentifierEnd %>
				SET
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = null
				WHERE
<% foreach ($objReverseReferenceTable->ColumnArray as $objColumn) { %>
	<% if ($objColumn->PrimaryKey) { %>
					<%= $strEscapeIdentifierBegin %><%= $objColumn->Name %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($<%= $objReverseReference->VariableName %>-><%= $objColumn->PropertyName %>) . ' AND
<% } %><% } %><%-%>
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>) . '
			');
		}

		/**
		 * Unassociates all <%= $objReverseReference->ObjectDescriptionPlural %>
		 * @return void
		*/ 
		public function UnassociateAll<%= $objReverseReference->ObjectDescriptionPlural %>() {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Unassociate<%= $objReverseReference->ObjectDescription %> on this unsaved <%= $objTable->ClassName %>.');

			// Get the Database Object for this Class
			$objDatabase = <%= $objTable->ClassName %>::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Table %><%= $strEscapeIdentifierEnd %>
				SET
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = null
				WHERE
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>) . '
			');
		}

		/**
		 * Deletes an associated <%= $objReverseReference->ObjectDescription %>
		 * @param <%= $objReverseReference->VariableType %> $<%= $objReverseReference->VariableName %>
		 * @return void
		*/ 
		public function DeleteAssociated<%= $objReverseReference->ObjectDescription %>(<%= $objReverseReference->VariableType %> $<%= $objReverseReference->VariableName %>) {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Unassociate<%= $objReverseReference->ObjectDescription %> on this unsaved <%= $objTable->ClassName %>.');
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($' . $objReverseReference->VariableName . '->', '))', 'PropertyName', $objReverseReferenceTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Unassociate<%= $objReverseReference->ObjectDescription %> on this <%= $objTable->ClassName %> with an unsaved <%= $objReverseReferenceTable->ClassName %>.');

			// Get the Database Object for this Class
			$objDatabase = <%= $objTable->ClassName %>::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Table %><%= $strEscapeIdentifierEnd %>
				WHERE
<% foreach ($objReverseReferenceTable->ColumnArray as $objColumn) { %>
	<% if ($objColumn->PrimaryKey) { %>
					<%= $strEscapeIdentifierBegin %><%= $objColumn->Name %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($<%= $objReverseReference->VariableName %>-><%= $objColumn->PropertyName %>) . ' AND
<% } %><% } %><%-%>
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>) . '
			');
		}

		/**
		 * Deletes all associated <%= $objReverseReference->ObjectDescriptionPlural %>
		 * @return void
		*/ 
		public function DeleteAll<%= $objReverseReference->ObjectDescriptionPlural %>() {
			if (<%= $objCodeGen->ImplodeObjectArray(' || ', '(is_null($this->', '))', 'VariableName', $objTable->PrimaryKeyColumnArray) %>)
				throw new QUndefinedPrimaryKeyException('Unable to call Unassociate<%= $objReverseReference->ObjectDescription %> on this unsaved <%= $objTable->ClassName %>.');

			// Get the Database Object for this Class
			$objDatabase = <%= $objTable->ClassName %>::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Table %><%= $strEscapeIdentifierEnd %>
				WHERE
					<%= $strEscapeIdentifierBegin %><%= $objReverseReference->Column %><%= $strEscapeIdentifierEnd %> = ' . $objDatabase->SqlVariable($this-><%= $objTable->PrimaryKeyColumnArray[0]->VariableName %>) . '
			');
		}
