<?php

/**
 * This is the "Meta" DataGrid customizable subclass for the List functionality
 * of the Docente class.  This code-generated class extends
 * from the generated Meta DataGrid class which contains a QDataGrid class which
 * can be used by any QForm or QPanel, listing a collection of Docente
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
class DocenteDataGrid extends DocenteDataGridGen {

    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->blnFilterShow = false;
    }

    public function MetaDataBinder() {
        // Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
        if ($this->Conditions) {
            $objConditions = QQ::AndCondition(QQ::Equal(QQN::Docente()->Localizacion->Localizacion->IdLocalizacion, Session::GetSessionVar('IdLocalizacion')),
                $this->Conditions);
        } else {
            $objConditions = QQ::Equal(QQN::Docente()->Localizacion->Localizacion->IdLocalizacion, Session::GetSessionVar('IdLocalizacion'));
        }
        if ($this->Paginator) {
            $this->TotalItemCount = Docente::QueryCount($objConditions);
        }

        // Setup the $objClauses Array
        $objClauses = array();

        // If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
        // the OrderByClause to the $objClauses array
        if ($objClause = $this->OrderByClause)
            array_push($objClauses, $objClause);

        // Add the LimitClause information, as well
        if ($objClause = $this->LimitClause)
            array_push($objClauses, $objClause);

        // Set the DataSource to be a Query result from Docente, given the clauses above
        $this->DataSource = Docente::QueryArray($objConditions, $objClauses);
    }

    protected function addColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid
        // Create an Edit Column
        //Setup Docente Panel
        /*
        $this->AddColumn(new QDataGridColumn(QApplication::Translate("Edit"), '<?= $_CONTROL->EditColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false'));
         */

        // Create the Other Columns (note that you can use strings for docente's properties, or you
        // can traverse down QQN::docente() to display fields that are down the hierarchy)
        $this->MetaAddColumn(QQN::Docente()->IdPerfilObject)->Name = QApplication::Translate('IdPerfilObject');
        $this->MetaAddColumn('Nombre')->Name = QApplication::Translate('Nombre');
        $this->MetaAddColumn('Apellido')->Name = QApplication::Translate('Apellido');
        $this->MetaAddColumn('Cuit')->Name = QApplication::Translate('Cuit');
        $this->MetaAddColumn('Dni')->Name = QApplication::Translate('Dni');
        $this->MetaAddColumn('Modalidad')->Name = QApplication::Translate('Modalidad');
        $this->MetaAddColumn('Nivel')->Name = QApplication::Translate('Nivel');
        $this->MetaAddColumn('EnActividad')->Name = QApplication::Translate('EnActividad');
    }

    public function btnEdit_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__ . "/docente/edit/" . $strParameter);
    }

}

?>