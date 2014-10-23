<?php	

	/**
	 * This is the "Meta" DataGrid customizable subclass for the List functionality
	 * of the Perfil class.  This code-generated class extends
	 * from the generated Meta DataGrid class which contains a QDataGrid class which
	 * can be used by any QForm or QPanel, listing a collection of Perfil
	 * objects.  It includes functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create an instance of this DataGrid in a QForm or QPanel.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * 
	 */
	class PerfilDataGrid extends PerfilDataGridGen {

		protected function addColumns() {
		 // Use the MetaDataGrid functionality to add Columns for this datagrid
	
			// Create an Edit Column
			//Setup Perfil Panel
			//

			// Create the Other Columns (note that you can use strings for perfil's properties, or you
			// can traverse down QQN::perfil() to display fields that are down the hierarchy)
			//$this->MetaAddColumn('IdPerfil')->Name = QApplication::Translate('IdPerfil');
			$this->MetaAddColumn('Nombre')->Name = QApplication::Translate('Nombre');
			$this->MetaAddColumn('Descripcion')->Name = QApplication::Translate('Descripcion');
                        
                        $objColumn = new QDataGridColumn(QApplication::Translate("Ver"), '<?= $_CONTROL->VerColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false');
                        $objColumn->Width = 136;
                        $this->AddColumn($objColumn);
		}

		public function VerColumn_Render(Perfil $objPerfil) {
                        $strControlId = "";
                        $strControlId .= "x" . $objPerfil->IdPerfil;
                        $strControlId = substr($strControlId, 1);
	                $btnEdit = $this->objForm->GetControl("btnVer".$strControlId);
	                if (!$btnEdit) {
	                    // Create the Edit button for this row in the DataGrid
	                    // Use ActionParameter to specify the ID of the person
	                    $btnEdit = new QButton($this, "btnVer".$strControlId);
	                    $btnEdit->Text = 'Ver Perfil';
	                    $btnEdit->ActionParameter = $strControlId;
	                    $btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnVer_Click'));
	                    $btnEdit->CausesValidation = false;
	                    $btnEdit->CssClass="button savebuttonM";
	                }
	
	                // If we are currently editing a person, then set this Edit button to be disabled
					if (isset($this->ParentControl->pnlEditPerfil)){
		                if ($this->ParentControl->pnlEditPerfil->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
             public function btnVer_Click($strFormId, $strControlId, $strParameter) {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__."/perfil/view/".$strParameter);
             }
	}
?>