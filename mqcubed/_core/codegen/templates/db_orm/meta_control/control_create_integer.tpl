        /**
         * Create and setup QIntegerTextBox <%= $strControlId %>
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function <%= $strControlId %>_Create($strControlId = null) {
            $this-><%= $strControlId %> = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this-><%= $strControlId %>->Name = QApplication::Translate('<%= $objColumn->PropertyName %>');
            $this-><%= $strControlId %>->Text = $this-><%= $strObjectName %>-><%= $objColumn->PropertyName %>;
<% if ($objColumn->NotNull) { %>
            $this-><%=$strControlId %>->Required = true;
<% } %>
<% if ($objColumn->DbType == QDatabaseFieldType::Integer) { %>
                        $this-><%= $strControlId %>->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this-><%= $strControlId %>->Minimum = QDatabaseNumberFieldMin::Integer;
<% } %>
<% if ($objColumn->DbType == QDatabaseFieldType::Smallint) { %>
                        $this-><%= $strControlId %>->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this-><%= $strControlId %>->Minimum = QDatabaseNumberFieldMin::Smallint;
<% } %>
            return $this-><%= $strControlId %>;
        }

        /**
         * Create and setup QLabel <%= $strLabelId %>
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function <%= $strLabelId %>_Create($strControlId = null, $strFormat = null) {
            $this-><%= $strLabelId %> = new QLabel($this->objParentObject, $strControlId);
            $this-><%= $strLabelId %>->Name = QApplication::Translate('<%= $objColumn->PropertyName %>');
            $this-><%= $strLabelId %>->Text = $this-><%= $strObjectName %>-><%= $objColumn->PropertyName %>;
<% if ($objColumn->NotNull) { %>
            $this-><%=$strLabelId %>->Required = true;
<% } %>
            $this-><%= $strLabelId %>->Format = $strFormat;
            return $this-><%= $strLabelId %>;
        }