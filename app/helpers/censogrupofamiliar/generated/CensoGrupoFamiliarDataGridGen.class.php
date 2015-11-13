<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the CensoGrupoFamiliar class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of CensoGrupoFamiliar objects.  It includes
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
class CensoGrupoFamiliarDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'CensoGrupoFamiliarId' => false,
        'IdFolioObject' => true,
        'FechaAlta' => true,
        'Circ' => true,
        'Secc' => true,
        'Mz' => true,
        'Pc' => true,
        'Telefono' => true,
        'DeclaracionNoOcupacion' => true,
        'TipoDocAdj' => true,
        'TipoBeneficio' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'CensoGrupoFamiliar';
        $this->strNoun = CensoGrupoFamiliar::Noun();
        $this->strNounPlural = CensoGrupoFamiliar::NounPlural();
        
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

        // Create the Columns (note that you can use strings for censo_grupo_familiar's properties, or you
        // can traverse down QQN::censo_grupo_familiar() to display fields that are down the hierarchy)
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['CensoGrupoFamiliarId']) $this->MetaAddColumn('CensoGrupoFamiliarId')->Title = QApplication::Translate('CensoGrupoFamiliarId');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::CensoGrupoFamiliar()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['FechaAlta']) $this->MetaAddColumn('FechaAlta')->Title = QApplication::Translate('FechaAlta');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['Circ']) $this->MetaAddColumn('Circ')->Title = QApplication::Translate('Circ');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['Secc']) $this->MetaAddColumn('Secc')->Title = QApplication::Translate('Secc');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['Mz']) $this->MetaAddColumn('Mz')->Title = QApplication::Translate('Mz');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['Pc']) $this->MetaAddColumn('Pc')->Title = QApplication::Translate('Pc');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['Telefono']) $this->MetaAddColumn('Telefono')->Title = QApplication::Translate('Telefono');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['DeclaracionNoOcupacion']) $this->MetaAddColumn('DeclaracionNoOcupacion')->Title = QApplication::Translate('DeclaracionNoOcupacion');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['TipoDocAdj']) $this->MetaAddColumn('TipoDocAdj')->Title = QApplication::Translate('TipoDocAdj');
        if (CensoGrupoFamiliarDataGrid::$strColumnsArray['TipoBeneficio']) $this->MetaAddColumn('TipoBeneficio')->Title = QApplication::Translate('TipoBeneficio');
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
					$strLinkUrl .= '?intCensoGrupoFamiliarId=<?=urlencode($_ITEM->CensoGrupoFamiliarId)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->CensoGrupoFamiliarId)?>';
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
			$intId="IdCensoGrupoFamiliar";
			$strHtml = '<a href="censogrupofamiliar/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->CensoGrupoFamiliarId, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(CensoGrupoFamiliar $objCensoGrupoFamiliar) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objCensoGrupoFamiliar->CensoGrupoFamiliarId;
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
					if (isset($this->ParentControl->pnlEditCensoGrupoFamiliar)){
		                if ($this->ParentControl->pnlEditCensoGrupoFamiliar->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof CensoGrupoFamiliarIndexPanelGen){
                             $this->ParentControl->pnlEditCensoGrupoFamiliar = new CensoGrupoFamiliarEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditCensoGrupoFamiliar->Visible=true;
                             $this->ParentControl->dtgCensoGrupoFamiliares->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/censogrupofamiliar/edit/".$strParameter);
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
                $this->TotalItemCount = CensoGrupoFamiliar::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from CensoGrupoFamiliar, given the clauses above
            $this->DataSource = CensoGrupoFamiliar::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a CensoGrupoFamiliar-based QQNode.
		 * It will also verify that it is a proper CensoGrupoFamiliar-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'censo_grupo_familiar') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "censo_grupo_familiar".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'CensoGrupoFamiliarId': return QQN::CensoGrupoFamiliar()->CensoGrupoFamiliarId;
				case 'IdFolio': return QQN::CensoGrupoFamiliar()->IdFolio;
				case 'IdFolioObject': return QQN::CensoGrupoFamiliar()->IdFolioObject;
				case 'FechaAlta': return QQN::CensoGrupoFamiliar()->FechaAlta;
				case 'Circ': return QQN::CensoGrupoFamiliar()->Circ;
				case 'Secc': return QQN::CensoGrupoFamiliar()->Secc;
				case 'Mz': return QQN::CensoGrupoFamiliar()->Mz;
				case 'Pc': return QQN::CensoGrupoFamiliar()->Pc;
				case 'Telefono': return QQN::CensoGrupoFamiliar()->Telefono;
				case 'DeclaracionNoOcupacion': return QQN::CensoGrupoFamiliar()->DeclaracionNoOcupacion;
				case 'TipoDocAdj': return QQN::CensoGrupoFamiliar()->TipoDocAdj;
				case 'TipoBeneficio': return QQN::CensoGrupoFamiliar()->TipoBeneficio;
				default: throw new QCallerException('Simple Property not found in CensoGrupoFamiliarDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        CensoGrupoFamiliarDataGrid::$strColumnsArray[$strColumnName] = false;
        CensoGrupoFamiliarDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::CensoGrupoFamiliar()->$strColumnName, $mixValue);
    }


}
?>