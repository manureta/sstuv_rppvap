/**
		 * Will add an "edit" link-based column, using a standard HREF link to redirect the user to a page
		 * that must be specified.
		 *
		 * @param string $strLinkUrl the URL to redirect the user to
		 * @param string $strLinkHtml the HTML of the link text
		 * @param string $strColumnTitle the HTML of the link text
		 * @param string $intArgumentType the method used to pass information to the edit page (defaults to PathInfo)
		 */
		public function MetaAddEditLinkColumn($strLinkUrl, $strLinkHtml = 'Edit', $strColumnTitle = 'Edit', $intArgumentType = QMetaControlArgumentType::PathInfo) {
			switch ($intArgumentType) {
				case QMetaControlArgumentType::QueryString:
					$strLinkUrl .= '?<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) {%><%= $objColumn->VariableName %>=<?=urlencode($_ITEM-><%=$objColumn->PropertyName%>)?>&<%}%><%-%>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) {%>/<?=urlencode($_ITEM-><%=$objColumn->PropertyName%>)?><%}%>';
					break;
				default:
					throw new QCallerException('Unable to pass arguments with this intArgumentType: ' . $intArgumentType);
			}

			$strHtml = '<a href="' . $strLinkUrl . '">' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}

		/**
		 * Will add an "edit" control proxy-based column, calling any actions on a given control proxy
		 * that must be specified.
		 *
		 * @param QControlProxy $pxyControl the control proxy to use
		 * @param string $strLinkHtml the HTML of the link text
		 * @param string $strColumnTitle the HTML of the link text
		 */
		public function MetaAddEditProxyColumn(QControlProxy $pxyControl, $strLinkHtml = 'Edit', $strColumnTitle = 'Edit') {
			$intId="Id<%=$objTable->ClassName%>";
			$strHtml = '<a href="<%=strtolower($objTable->ClassName)%>/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents(<% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) {%>$_ITEM-><%=$objColumn->PropertyName%> . "," . <%}%><%---------%>, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(<%= $objTable->ClassName %> $obj<%= $objTable->ClassName %>) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        <% foreach ($objTable->PrimaryKeyColumnArray as $objColumn) { %>
                        $strControlId .= "x" . $obj<%= $objTable->ClassName %>-><%= $objColumn->PropertyName %>;
<% } %>
                        $strControlId = str_replace("-","n",substr($strControlId, 1));
	                $btnEdit = $this->objForm->GetControl("btnEdit".$strControlId);
	                if (!$btnEdit) {
	                    // Create the Edit button for this row in the DataGrid
	                    // Use ActionParameter to specify the ID of the person
	                    $btnEdit = new QButton($this, "btnEdit".$strControlId);
	                    $btnEdit->Text = 'Editar';
	                    $btnEdit->ActionParameter = $strControlId;
	                    $btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnEdit_Click'));
	                    $btnEdit->CausesValidation = false;
	                    $btnEdit->Icon = "edit";
	                    $btnEdit->CssClass = "btn-xs";
	                }
	
	                // If we are currently editing a person, then set this Edit button to be disabled
					if (isset($this->ParentControl->pnlEdit<%= $objTable->ClassName %>)){
		                if ($this->ParentControl->pnlEdit<%= $objTable->ClassName %>->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof <%= $objTable->ClassName %>IndexPanelGen){
                             $this->ParentControl->pnlEdit<%= $objTable->ClassName %> = new <%= $objTable->ClassName %>EditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEdit<%= $objTable->ClassName %>->Visible=true;
                             $this->ParentControl->dtg<%= $objTable->ClassNamePlural %>->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/<%=strtolower($objTable->ClassName)%>/edit/".$strParameter);
                          }
                 }
                     
