        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox <%= $strControlId %>
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function <%= $strControlId %>_Create($strControlId = null) {
            $this-><%= $strControlId %> = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, '<%= $objColumn->Reference->VariableType %>', '<%= $objCodeGen->GetTable($objColumn->Reference->Table)->PrimaryKeyColumnArray[0]->PropertyName %>' , $strControlId);
            if($this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>){
                $this-><%= $strControlId %>->Text = $this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>->__toString();
                $this-><%= $strControlId %>->Value = $this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>-><%= $objCodeGen->GetTable($objColumn->Reference->Table)->PrimaryKeyColumnArray[0]->PropertyName %>;
            }
            $this-><%= $strControlId %>->Name = QApplication::Translate('<%= $objColumn->Reference->PropertyName %>');
            <% if ($objColumn->NotNull) { %>
            $this-><%=$strControlId %>->Required = true;
            <% } %>
            return $this-><%= $strControlId %>;
        }

        /**
         * Create and setup QLabel <%= $strLabelId %>
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function <%= $strLabelId %>_Create($strControlId = null) {
            $this-><%= $strLabelId %> = new QLabel($this->objParentObject, $strControlId);
            $this-><%= $strLabelId %>->Name = QApplication::Translate('<%= $objColumn->Reference->PropertyName %>');
            $this-><%= $strLabelId %>->Text = ($this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>) ? $this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>->__toString() : null;
<% if ($objColumn->NotNull) { %>
            $this-><%=$strLabelId %>->Required = true;
<% } %>
            return $this-><%= $strLabelId %>;
        }