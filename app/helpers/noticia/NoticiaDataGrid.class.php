<?php	

	/**
	 * This is the "Meta" DataGrid customizable subclass for the List functionality
	 * of the Noticia class.  This code-generated class extends
	 * from the generated Meta DataGrid class which contains a QDataGrid class which
	 * can be used by any QForm or QPanel, listing a collection of Noticia
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
	class NoticiaDataGrid extends NoticiaDataGridGen {
    
        protected function addColumns() {
		 // Use the MetaDataGrid functionality to add Columns for this datagrid
	
			// Create an Edit Column
			//Setup Noticia Panel
			$this->AddColumn(new QDataGridColumn(QApplication::Translate("Edit"), '<?= $_CONTROL->EditColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false'));

			// Create the Other Columns (note that you can use strings for noticia's properties, or you
			// can traverse down QQN::noticia() to display fields that are down the hierarchy)
			$objColumnIdNoticia = $this->MetaAddColumn('IdNoticia');
            $objColumnIdNoticia->Name = QApplication::Translate('IdNoticia');
            $objColumnIdNoticia->Width = '30';
            //$objColumnIdNoticia->CssClass="IdNoticia";
            $objColumnIdNoticia->FilterBoxSize = 5;
            
			$this->MetaAddColumn('Titulo')->Name = QApplication::Translate('Titulo');
			$this->MetaAddColumn('Texto')->Name = QApplication::Translate('Texto');
			$this->MetaAddColumn('Fecha')->Name = QApplication::Translate('Fecha');
			$this->MetaAddColumn('Mostrar')->Name = QApplication::Translate('Mostrar');
		}
			
	}
?>