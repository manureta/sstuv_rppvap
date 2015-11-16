<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Ocupante class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Ocupante objects.  It includes
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
class OcupanteDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdHogarObject' => true,
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
        'Referente' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Ocupante';
        $this->strNoun = Ocupante::Noun();
        $this->strNounPlural = Ocupante::NounPlural();
        
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

        // Create the Columns (note that you can use strings for ocupante's properties, or you
        // can traverse down QQN::ocupante() to display fields that are down the hierarchy)
        if (OcupanteDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (OcupanteDataGrid::$strColumnsArray['IdHogarObject']) $this->MetaAddColumn(QQN::Ocupante()->IdHogarObject)->Title = QApplication::Translate('IdHogarObject');
        if (OcupanteDataGrid::$strColumnsArray['Apellido']) $this->MetaAddColumn('Apellido')->Title = QApplication::Translate('Apellido');
        if (OcupanteDataGrid::$strColumnsArray['Nombres']) $this->MetaAddColumn('Nombres')->Title = QApplication::Translate('Nombres');
        if (OcupanteDataGrid::$strColumnsArray['FechaNacimiento']) $this->MetaAddColumn('FechaNacimiento')->Title = QApplication::Translate('FechaNacimiento');
        if (OcupanteDataGrid::$strColumnsArray['Edad']) $this->MetaAddColumn('Edad')->Title = QApplication::Translate('Edad');
        if (OcupanteDataGrid::$strColumnsArray['EstadoCivil']) $this->MetaAddColumn('EstadoCivil')->Title = QApplication::Translate('EstadoCivil');
        if (OcupanteDataGrid::$strColumnsArray['DeOConQuien']) $this->MetaAddColumn('DeOConQuien')->Title = QApplication::Translate('DeOConQuien');
        if (OcupanteDataGrid::$strColumnsArray['Ocupacion']) $this->MetaAddColumn('Ocupacion')->Title = QApplication::Translate('Ocupacion');
        if (OcupanteDataGrid::$strColumnsArray['Ingreso']) $this->MetaAddColumn('Ingreso')->Title = QApplication::Translate('Ingreso');
        if (OcupanteDataGrid::$strColumnsArray['TipoDoc']) $this->MetaAddColumn('TipoDoc')->Title = QApplication::Translate('TipoDoc');
        if (OcupanteDataGrid::$strColumnsArray['Doc']) $this->MetaAddColumn('Doc')->Title = QApplication::Translate('Doc');
        if (OcupanteDataGrid::$strColumnsArray['Nacionalidad']) $this->MetaAddColumn('Nacionalidad')->Title = QApplication::Translate('Nacionalidad');
        if (OcupanteDataGrid::$strColumnsArray['NyaMadre']) $this->MetaAddColumn('NyaMadre')->Title = QApplication::Translate('NyaMadre');
        if (OcupanteDataGrid::$strColumnsArray['NyaPadre']) $this->MetaAddColumn('NyaPadre')->Title = QApplication::Translate('NyaPadre');
        if (OcupanteDataGrid::$strColumnsArray['RelacionParentescoJefeHogar']) $this->MetaAddColumn('RelacionParentescoJefeHogar')->Title = QApplication::Translate('RelacionParentescoJefeHogar');
        if (OcupanteDataGrid::$strColumnsArray['Referente']) $this->MetaAddColumn('Referente')->Title = QApplication::Translate('Referente');
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
					$strLinkUrl .= '?intId=<?=urlencode($_ITEM->Id)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->Id)?>';
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
			$intId="IdOcupante";
			$strHtml = '<a href="ocupante/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Ocupante $objOcupante) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objOcupante->Id;
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
					if (isset($this->ParentControl->pnlEditOcupante)){
		                if ($this->ParentControl->pnlEditOcupante->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof OcupanteIndexPanelGen){
                             $this->ParentControl->pnlEditOcupante = new OcupanteEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditOcupante->Visible=true;
                             $this->ParentControl->dtgOcupantes->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/ocupante/edit/".$strParameter);
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
                $this->TotalItemCount = Ocupante::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Ocupante, given the clauses above
            $this->DataSource = Ocupante::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Ocupante-based QQNode.
		 * It will also verify that it is a proper Ocupante-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'ocupante') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "ocupante".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::Ocupante()->Id;
				case 'IdHogar': return QQN::Ocupante()->IdHogar;
				case 'IdHogarObject': return QQN::Ocupante()->IdHogarObject;
				case 'Apellido': return QQN::Ocupante()->Apellido;
				case 'Nombres': return QQN::Ocupante()->Nombres;
				case 'FechaNacimiento': return QQN::Ocupante()->FechaNacimiento;
				case 'Edad': return QQN::Ocupante()->Edad;
				case 'EstadoCivil': return QQN::Ocupante()->EstadoCivil;
				case 'DeOConQuien': return QQN::Ocupante()->DeOConQuien;
				case 'Ocupacion': return QQN::Ocupante()->Ocupacion;
				case 'Ingreso': return QQN::Ocupante()->Ingreso;
				case 'TipoDoc': return QQN::Ocupante()->TipoDoc;
				case 'Doc': return QQN::Ocupante()->Doc;
				case 'Nacionalidad': return QQN::Ocupante()->Nacionalidad;
				case 'NyaMadre': return QQN::Ocupante()->NyaMadre;
				case 'NyaPadre': return QQN::Ocupante()->NyaPadre;
				case 'RelacionParentescoJefeHogar': return QQN::Ocupante()->RelacionParentescoJefeHogar;
				case 'Referente': return QQN::Ocupante()->Referente;
				default: throw new QCallerException('Simple Property not found in OcupanteDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        OcupanteDataGrid::$strColumnsArray[$strColumnName] = false;
        OcupanteDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Ocupante()->$strColumnName, $mixValue);
    }


}
?>