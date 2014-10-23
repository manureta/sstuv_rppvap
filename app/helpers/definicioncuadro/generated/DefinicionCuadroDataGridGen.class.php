<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the DefinicionCuadro class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of DefinicionCuadro objects.  It includes
 * functionality to perform pagination and sorting on columns.
 *
 * To take advantage of some (or all) of these control objects, you
 * must create an instance of this DataGrid in a QForm or QPanel.
 *
 * Any and all changes to this file will be overwritten with any subsequent re-
 * code generation.
 *
 * @package Relevamiento Anual
 * @subpackage MetaControls
 *
 */
class DefinicionCuadroDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'IdDefinicionCuadro' => true,
        'Nombre' => true,
        'Numero' => true,
        'CantidadFilasPrecargadas' => true,
        'Orden' => true,
        'TituloFilas' => true,
        'CCriterioCompletitud' => true,
        'IdDefinicionMigracionObject' => true,
        'Obligatorio' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'DefinicionCuadro';
        $this->strNoun = DefinicionCuadro::Noun();
        $this->strNounPlural = DefinicionCuadro::NounPlural();
        
        if ($strColumnsArray) {
            foreach ($strColumnsArray as $strColumn => $bln) {
                if (is_string($bln)) $strColumn = $bln;
                if ($bln) {
                    try {
                        $this->MetaAddColumn($strColumn)->Title = QApplication::Translate($strColumn);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
                }
            }
        } else {
            $this->addAllColumns();
        }
    }

    protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Columns (note that you can use strings for definicion_cuadro's properties, or you
        // can traverse down QQN::definicion_cuadro() to display fields that are down the hierarchy)
        if (DefinicionCuadroDataGrid::$strColumnsArray['IdDefinicionCuadro']) $this->MetaAddColumn('IdDefinicionCuadro')->Title = QApplication::Translate('IdDefinicionCuadro');
        if (DefinicionCuadroDataGrid::$strColumnsArray['Nombre']) $this->MetaAddColumn('Nombre')->Title = QApplication::Translate('Nombre');
        if (DefinicionCuadroDataGrid::$strColumnsArray['Numero']) $this->MetaAddColumn('Numero')->Title = QApplication::Translate('Numero');
        if (DefinicionCuadroDataGrid::$strColumnsArray['CantidadFilasPrecargadas']) $this->MetaAddColumn('CantidadFilasPrecargadas')->Title = QApplication::Translate('CantidadFilasPrecargadas');
        if (DefinicionCuadroDataGrid::$strColumnsArray['Orden']) $this->MetaAddColumn('Orden')->Title = QApplication::Translate('Orden');
        if (DefinicionCuadroDataGrid::$strColumnsArray['TituloFilas']) $this->MetaAddColumn('TituloFilas')->Title = QApplication::Translate('TituloFilas');
        if (DefinicionCuadroDataGrid::$strColumnsArray['CCriterioCompletitud']) $this->MetaAddTypeColumn('CCriterioCompletitud', 'CriterioCompletitudType')->Title = QApplication::Translate('CCriterioCompletitud');
        if (DefinicionCuadroDataGrid::$strColumnsArray['IdDefinicionMigracionObject']) $this->MetaAddColumn(QQN::DefinicionCuadro()->IdDefinicionMigracionObject)->Title = QApplication::Translate('IdDefinicionMigracionObject');
        if (DefinicionCuadroDataGrid::$strColumnsArray['Obligatorio']) $this->MetaAddColumn('Obligatorio')->Title = QApplication::Translate('Obligatorio');
    }

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
					$strLinkUrl .= '?intIdDefinicionCuadro=<?=urlencode($_ITEM->IdDefinicionCuadro)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdDefinicionCuadro)?>';
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
			$intId="IdDefinicionCuadro";
			$strHtml = '<a href="definicioncuadro/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdDefinicionCuadro, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(DefinicionCuadro $objDefinicionCuadro) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objDefinicionCuadro->IdDefinicionCuadro;
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
					if (isset($this->ParentControl->pnlEditDefinicionCuadro)){
		                if ($this->ParentControl->pnlEditDefinicionCuadro->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof DefinicionCuadroIndexPanelGen){
                             $this->ParentControl->pnlEditDefinicionCuadro = new DefinicionCuadroEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditDefinicionCuadro->Visible=true;
                             $this->ParentControl->dtgDefinicionCuadros->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/definicioncuadro/edit/".$strParameter);
                          }
                 }
                     


/**
         * Default / simple DataBinder for this Meta DataGrid.  This can easily be overridden
         * by calling SetDataBinder() on this DataGrid with another DataBinder of your choice.
         *
         * If a paginator is set on this DataBinder, it will use it.  If not, then no pagination will be used.
         * It will also perform any sorting (if applicable).
         */
        public function MetaDataBinder() {
            // Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
            if ($this->Paginator) {
                $this->TotalItemCount = DefinicionCuadro::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from DefinicionCuadro, given the clauses above
            $this->DataSource = DefinicionCuadro::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a DefinicionCuadro-based QQNode.
		 * It will also verify that it is a proper DefinicionCuadro-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'definicion_cuadro') {
					if (($mixContent instanceof QQReverseReferenceNode) && !($mixContent->_PropertyName))
						throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
					$objCurrentNode = $mixContent;
					while ($objCurrentNode = $objCurrentNode->_ParentNode) {
						if (!($objCurrentNode instanceof QQNode))
							throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
						if (($objCurrentNode instanceof QQReverseReferenceNode) && !($objCurrentNode->_PropertyName))
							throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
					}
					return $mixContent;
				} else
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "definicion_cuadro".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdDefinicionCuadro': return QQN::DefinicionCuadro()->IdDefinicionCuadro;
				case 'Nombre': return QQN::DefinicionCuadro()->Nombre;
				case 'Numero': return QQN::DefinicionCuadro()->Numero;
				case 'CantidadFilasPrecargadas': return QQN::DefinicionCuadro()->CantidadFilasPrecargadas;
				case 'Orden': return QQN::DefinicionCuadro()->Orden;
				case 'TituloFilas': return QQN::DefinicionCuadro()->TituloFilas;
				case 'CCriterioCompletitud': return QQN::DefinicionCuadro()->CCriterioCompletitud;
				case 'IdDefinicionMigracion': return QQN::DefinicionCuadro()->IdDefinicionMigracion;
				case 'IdDefinicionMigracionObject': return QQN::DefinicionCuadro()->IdDefinicionMigracionObject;
				case 'Obligatorio': return QQN::DefinicionCuadro()->Obligatorio;
				default: throw new QCallerException('Simple Property not found in DefinicionCuadroDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        DefinicionCuadroDataGrid::$strColumnsArray[$strColumnName] = false;
        DefinicionCuadroDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::DefinicionCuadro()->$strColumnName, $mixValue);
    }


}
?>