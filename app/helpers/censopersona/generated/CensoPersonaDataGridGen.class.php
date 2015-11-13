<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the CensoPersona class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of CensoPersona objects.  It includes
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
class CensoPersonaDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'CensoPersonaId' => false,
        'CensoGrupoFamiliar' => true,
        'Apellido' => true,
        'Nombres' => true,
        'FechaNacimiento' => true,
        'Edad' => true,
        'EstadoCivil' => true,
        'DeOConQuien' => true,
        'Ocupacion' => true,
        'Ingreso' => true,
        'TipoDoc' => true,
        'Doc' => true,
        'Nacionalidad' => true,
        'NyaMadre' => true,
        'NyaPadre' => true,
        'RelacionParentescoJefeHogar' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'CensoPersona';
        $this->strNoun = CensoPersona::Noun();
        $this->strNounPlural = CensoPersona::NounPlural();
        
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

        // Create the Columns (note that you can use strings for censo_persona's properties, or you
        // can traverse down QQN::censo_persona() to display fields that are down the hierarchy)
        if (CensoPersonaDataGrid::$strColumnsArray['CensoPersonaId']) $this->MetaAddColumn('CensoPersonaId')->Title = QApplication::Translate('CensoPersonaId');
        if (CensoPersonaDataGrid::$strColumnsArray['CensoGrupoFamiliar']) $this->MetaAddColumn(QQN::CensoPersona()->CensoGrupoFamiliar)->Title = QApplication::Translate('CensoGrupoFamiliar');
        if (CensoPersonaDataGrid::$strColumnsArray['Apellido']) $this->MetaAddColumn('Apellido')->Title = QApplication::Translate('Apellido');
        if (CensoPersonaDataGrid::$strColumnsArray['Nombres']) $this->MetaAddColumn('Nombres')->Title = QApplication::Translate('Nombres');
        if (CensoPersonaDataGrid::$strColumnsArray['FechaNacimiento']) $this->MetaAddColumn('FechaNacimiento')->Title = QApplication::Translate('FechaNacimiento');
        if (CensoPersonaDataGrid::$strColumnsArray['Edad']) $this->MetaAddColumn('Edad')->Title = QApplication::Translate('Edad');
        if (CensoPersonaDataGrid::$strColumnsArray['EstadoCivil']) $this->MetaAddColumn('EstadoCivil')->Title = QApplication::Translate('EstadoCivil');
        if (CensoPersonaDataGrid::$strColumnsArray['DeOConQuien']) $this->MetaAddColumn('DeOConQuien')->Title = QApplication::Translate('DeOConQuien');
        if (CensoPersonaDataGrid::$strColumnsArray['Ocupacion']) $this->MetaAddColumn('Ocupacion')->Title = QApplication::Translate('Ocupacion');
        if (CensoPersonaDataGrid::$strColumnsArray['Ingreso']) $this->MetaAddColumn('Ingreso')->Title = QApplication::Translate('Ingreso');
        if (CensoPersonaDataGrid::$strColumnsArray['TipoDoc']) $this->MetaAddColumn('TipoDoc')->Title = QApplication::Translate('TipoDoc');
        if (CensoPersonaDataGrid::$strColumnsArray['Doc']) $this->MetaAddColumn('Doc')->Title = QApplication::Translate('Doc');
        if (CensoPersonaDataGrid::$strColumnsArray['Nacionalidad']) $this->MetaAddColumn('Nacionalidad')->Title = QApplication::Translate('Nacionalidad');
        if (CensoPersonaDataGrid::$strColumnsArray['NyaMadre']) $this->MetaAddColumn('NyaMadre')->Title = QApplication::Translate('NyaMadre');
        if (CensoPersonaDataGrid::$strColumnsArray['NyaPadre']) $this->MetaAddColumn('NyaPadre')->Title = QApplication::Translate('NyaPadre');
        if (CensoPersonaDataGrid::$strColumnsArray['RelacionParentescoJefeHogar']) $this->MetaAddColumn('RelacionParentescoJefeHogar')->Title = QApplication::Translate('RelacionParentescoJefeHogar');
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
					$strLinkUrl .= '?intCensoPersonaId=<?=urlencode($_ITEM->CensoPersonaId)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->CensoPersonaId)?>';
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
			$intId="IdCensoPersona";
			$strHtml = '<a href="censopersona/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->CensoPersonaId, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(CensoPersona $objCensoPersona) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objCensoPersona->CensoPersonaId;
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
					if (isset($this->ParentControl->pnlEditCensoPersona)){
		                if ($this->ParentControl->pnlEditCensoPersona->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof CensoPersonaIndexPanelGen){
                             $this->ParentControl->pnlEditCensoPersona = new CensoPersonaEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditCensoPersona->Visible=true;
                             $this->ParentControl->dtgCensoPersonas->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/censopersona/edit/".$strParameter);
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
                $this->TotalItemCount = CensoPersona::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from CensoPersona, given the clauses above
            $this->DataSource = CensoPersona::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a CensoPersona-based QQNode.
		 * It will also verify that it is a proper CensoPersona-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'censo_persona') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "censo_persona".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'CensoPersonaId': return QQN::CensoPersona()->CensoPersonaId;
				case 'CensoGrupoFamiliarId': return QQN::CensoPersona()->CensoGrupoFamiliarId;
				case 'CensoGrupoFamiliar': return QQN::CensoPersona()->CensoGrupoFamiliar;
				case 'Apellido': return QQN::CensoPersona()->Apellido;
				case 'Nombres': return QQN::CensoPersona()->Nombres;
				case 'FechaNacimiento': return QQN::CensoPersona()->FechaNacimiento;
				case 'Edad': return QQN::CensoPersona()->Edad;
				case 'EstadoCivil': return QQN::CensoPersona()->EstadoCivil;
				case 'DeOConQuien': return QQN::CensoPersona()->DeOConQuien;
				case 'Ocupacion': return QQN::CensoPersona()->Ocupacion;
				case 'Ingreso': return QQN::CensoPersona()->Ingreso;
				case 'TipoDoc': return QQN::CensoPersona()->TipoDoc;
				case 'Doc': return QQN::CensoPersona()->Doc;
				case 'Nacionalidad': return QQN::CensoPersona()->Nacionalidad;
				case 'NyaMadre': return QQN::CensoPersona()->NyaMadre;
				case 'NyaPadre': return QQN::CensoPersona()->NyaPadre;
				case 'RelacionParentescoJefeHogar': return QQN::CensoPersona()->RelacionParentescoJefeHogar;
				default: throw new QCallerException('Simple Property not found in CensoPersonaDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        CensoPersonaDataGrid::$strColumnsArray[$strColumnName] = false;
        CensoPersonaDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::CensoPersona()->$strColumnName, $mixValue);
    }


}
?>