            if ($this-><%= $strControlId %>) {
                if($this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>){
                    $this-><%= $strControlId %>->Text = $this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>->__toString();
                    $this-><%= $strControlId %>->Value = $this-><%= $strObjectName %>-><%= $objColumn->PropertyName %>-><%= $objCodeGen->GetTable($objColumn->Reference->Table)->PrimaryKeyColumnArray[0]->PropertyName %>;
                }                
            }
            if ($this-><%= $strLabelId %>) $this-><%= $strLabelId %>->Text = ($this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>) ? $this-><%= $strObjectName %>-><%= $objColumn->Reference->PropertyName %>->__toString() : null;