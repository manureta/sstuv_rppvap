<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Hogar class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Hogar objects.  It includes
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
class HogarDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'FechaAlta' => true,
        'Circ' => true,
        'Secc' => true,
        'Mz' => true,
        'Pc' => true,
        'Telefono' => true,
        'Direccion' => true,
        'DeclaracionNoOcupacion' => true,
        'DocTerreno' => true,
        'TipoBeneficio' => true,
        'FormaOcupacion' => true,
        'FechaIngreso' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Hogar';
        $this->strNoun = Hogar::Noun();
        $this->strNounPlural = Hogar::NounPlural();
        
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

        // Create the Columns (note that you can use strings for hogar's properties, or you
        // can traverse down QQN::hogar() to display fields that are down the hierarchy)
        if (HogarDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (HogarDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::Hogar()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (HogarDataGrid::$strColumnsArray['FechaAlta']) $this->MetaAddColumn('FechaAlta')->Title = QApplication::Translate('FechaAlta');
        if (HogarDataGrid::$strColumnsArray['Circ']) $this->MetaAddColumn('Circ')->Title = QApplication::Translate('Circ');
        if (HogarDataGrid::$strColumnsArray['Secc']) $this->MetaAddColumn('Secc')->Title = QApplication::Translate('Secc');
        if (HogarDataGrid::$strColumnsArray['Mz']) $this->MetaAddColumn('Mz')->Title = QApplication::Translate('Mz');
        if (HogarDataGrid::$strColumnsArray['Pc']) $this->MetaAddColumn('Pc')->Title = QApplication::Translate('Pc');
        if (HogarDataGrid::$strColumnsArray['Telefono']) $this->MetaAddColumn('Telefono')->Title = QApplication::Translate('Telefono');
        if (HogarDataGrid::$strColumnsArray['Direccion']) $this->MetaAddColumn('Direccion')->Title = QApplication::Translate('Direccion');
        if (HogarDataGrid::$strColumnsArray['DeclaracionNoOcupacion']) $this->MetaAddColumn('DeclaracionNoOcupacion')->Title = QApplication::Translate('DeclaracionNoOcupacion');
        if (HogarDataGrid::$strColumnsArray['DocTerreno']) $this->MetaAddColumn('DocTerreno')->Title = QApplication::Translate('DocTerreno');
        if (HogarDataGrid::$strColumnsArray['TipoBeneficio']) $this->MetaAddColumn('TipoBeneficio')->Title = QApplication::Translate('TipoBeneficio');
        if (HogarDataGrid::$strColumnsArray['FormaOcupacion']) $this->MetaAddColumn('FormaOcupacion')->Title = QApplication::Translate('FormaOcupacion');
        if (HogarDataGrid::$strColumnsArray['FechaIngreso']) $this->MetaAddColumn('FechaIngreso')->Title = QApplication::Translate('FechaIngreso');
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
			$intId="IdHogar";
			$strHtml = '<a href="hogar/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Hogar $objHogar) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objHogar->Id;
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
					if (isset($this->ParentControl->pnlEditHogar)){
		                if ($this->ParentControl->pnlEditHogar->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof HogarIndexPanelGen){
                             $this->ParentControl->pnlEditHogar = new HogarEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditHogar->Visible=true;
                             $this->ParentControl->dtgHogares->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/hogar/edit/".$strParameter);
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
                $this->TotalItemCount = Hogar::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Hogar, given the clauses above
            $this->DataSource = Hogar::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Hogar-based QQNode.
		 * It will also verify that it is a proper Hogar-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'hogar') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "hogar".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::Hogar()->Id;
				case 'IdFolio': return QQN::Hogar()->IdFolio;
				case 'IdFolioObject': return QQN::Hogar()->IdFolioObject;
				case 'FechaAlta': return QQN::Hogar()->FechaAlta;
				case 'Circ': return QQN::Hogar()->Circ;
				case 'Secc': return QQN::Hogar()->Secc;
				case 'Mz': return QQN::Hogar()->Mz;
				case 'Pc': return QQN::Hogar()->Pc;
				case 'Telefono': return QQN::Hogar()->Telefono;
				case 'Direccion': return QQN::Hogar()->Direccion;
				case 'DeclaracionNoOcupacion': return QQN::Hogar()->DeclaracionNoOcupacion;
				case 'DocTerreno': return QQN::Hogar()->DocTerreno;
				case 'TipoBeneficio': return QQN::Hogar()->TipoBeneficio;
				case 'FormaOcupacion': return QQN::Hogar()->FormaOcupacion;
				case 'FechaIngreso': return QQN::Hogar()->FechaIngreso;
				default: throw new QCallerException('Simple Property not found in HogarDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        HogarDataGrid::$strColumnsArray[$strColumnName] = false;
        HogarDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Hogar()->$strColumnName, $mixValue);
    }


}
?>