            if ($this-><%= $strControlId %>) $this-><%= $strControlId %>->Checked = $this-><%= $strObjectName %>-><%= $objColumn->PropertyName %>;
            if ($this-><%= $strLabelId %>) $this-><%= $strLabelId %>->Text = ($this-><%= $strObjectName %>-><%= $objColumn->PropertyName %>) ? QApplication::Translate('Yes') : QApplication::Translate('No');