<?php	

	/**
	 * This is the "Meta" DataGrid customizable subclass for the List functionality
	 * of the Usuario class.  This code-generated class extends
	 * from the generated Meta DataGrid class which contains a QDataGrid class which
	 * can be used by any QForm or QPanel, listing a collection of Usuario
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
	class UsuarioDataGrid extends UsuarioDataGridGen {

		protected function addColumns() {
		 // Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for usuario's properties, or you
			// can traverse down QQN::usuario() to display fields that are down the hierarchy)
			//$this->MetaAddColumn('IdUsuario')->Name = QApplication::Translate('IdUsuario');
			$this->MetaAddColumn('Nombre')->Name = QApplication::Translate('Nombre');
			//$this->MetaAddColumn('Email')->Name = QApplication::Translate('Email');
			$this->MetaAddColumn('Activo')->Name = QApplication::Translate('Activo');
			$this->MetaAddColumn(QQN::Usuario()->IdPerfilObject)->Name = QApplication::Translate('IdPerfilObject');
			// Create an Edit Column
			//Setup Usuario Panel      width: 136px;
                        $objColumn =new QDataGridColumn(QApplication::Translate("Edit"), '<?= $_CONTROL->EditColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false');
                        $objColumn->Width = 136;
			$this->AddColumn($objColumn);
		}
                
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {
                         QApplication::Redirect(__VIRTUAL_DIRECTORY__."/usuario/edit/".$strParameter);
                 }
	}
?>
