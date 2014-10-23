<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Equipamiento class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Equipamiento objects.  It includes
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
class EquipamientoDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'UnidadSanitariaObject' => true,
        'JardinInfantesObject' => true,
        'EscuelaPrimariaObject' => true,
        'EscuelaSecundariaObject' => true,
        'ComedorObject' => true,
        'SalonUsosMultiplesObject' => true,
        'CentroIntegracionComunitariaObject' => true,
        'Otro' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Equipamiento';
        $this->strNoun = Equipamiento::Noun();
        $this->strNounPlural = Equipamiento::NounPlural();
        
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

        // Create the Columns (note that you can use strings for equipamiento's properties, or you
        // can traverse down QQN::equipamiento() to display fields that are down the hierarchy)
        if (EquipamientoDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (EquipamientoDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::Equipamiento()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (EquipamientoDataGrid::$strColumnsArray['UnidadSanitariaObject']) $this->MetaAddColumn(QQN::Equipamiento()->UnidadSanitariaObject)->Title = QApplication::Translate('UnidadSanitariaObject');
        if (EquipamientoDataGrid::$strColumnsArray['JardinInfantesObject']) $this->MetaAddColumn(QQN::Equipamiento()->JardinInfantesObject)->Title = QApplication::Translate('JardinInfantesObject');
        if (EquipamientoDataGrid::$strColumnsArray['EscuelaPrimariaObject']) $this->MetaAddColumn(QQN::Equipamiento()->EscuelaPrimariaObject)->Title = QApplication::Translate('EscuelaPrimariaObject');
        if (EquipamientoDataGrid::$strColumnsArray['EscuelaSecundariaObject']) $this->MetaAddColumn(QQN::Equipamiento()->EscuelaSecundariaObject)->Title = QApplication::Translate('EscuelaSecundariaObject');
        if (EquipamientoDataGrid::$strColumnsArray['ComedorObject']) $this->MetaAddColumn(QQN::Equipamiento()->ComedorObject)->Title = QApplication::Translate('ComedorObject');
        if (EquipamientoDataGrid::$strColumnsArray['SalonUsosMultiplesObject']) $this->MetaAddColumn(QQN::Equipamiento()->SalonUsosMultiplesObject)->Title = QApplication::Translate('SalonUsosMultiplesObject');
        if (EquipamientoDataGrid::$strColumnsArray['CentroIntegracionComunitariaObject']) $this->MetaAddColumn(QQN::Equipamiento()->CentroIntegracionComunitariaObject)->Title = QApplication::Translate('CentroIntegracionComunitariaObject');
        if (EquipamientoDataGrid::$strColumnsArray['Otro']) $this->MetaAddColumn('Otro')->Title = QApplication::Translate('Otro');
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
			$intId="IdEquipamiento";
			$strHtml = '<a href="equipamiento/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Equipamiento $objEquipamiento) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objEquipamiento->Id;
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
					if (isset($this->ParentControl->pnlEditEquipamiento)){
		                if ($this->ParentControl->pnlEditEquipamiento->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof EquipamientoIndexPanelGen){
                             $this->ParentControl->pnlEditEquipamiento = new EquipamientoEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditEquipamiento->Visible=true;
                             $this->ParentControl->dtgEquipamientos->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/equipamiento/edit/".$strParameter);
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
                $this->TotalItemCount = Equipamiento::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Equipamiento, given the clauses above
            $this->DataSource = Equipamiento::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Equipamiento-based QQNode.
		 * It will also verify that it is a proper Equipamiento-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'equipamiento') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "equipamiento".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::Equipamiento()->Id;
				case 'IdFolio': return QQN::Equipamiento()->IdFolio;
				case 'IdFolioObject': return QQN::Equipamiento()->IdFolioObject;
				case 'UnidadSanitaria': return QQN::Equipamiento()->UnidadSanitaria;
				case 'UnidadSanitariaObject': return QQN::Equipamiento()->UnidadSanitariaObject;
				case 'JardinInfantes': return QQN::Equipamiento()->JardinInfantes;
				case 'JardinInfantesObject': return QQN::Equipamiento()->JardinInfantesObject;
				case 'EscuelaPrimaria': return QQN::Equipamiento()->EscuelaPrimaria;
				case 'EscuelaPrimariaObject': return QQN::Equipamiento()->EscuelaPrimariaObject;
				case 'EscuelaSecundaria': return QQN::Equipamiento()->EscuelaSecundaria;
				case 'EscuelaSecundariaObject': return QQN::Equipamiento()->EscuelaSecundariaObject;
				case 'Comedor': return QQN::Equipamiento()->Comedor;
				case 'ComedorObject': return QQN::Equipamiento()->ComedorObject;
				case 'SalonUsosMultiples': return QQN::Equipamiento()->SalonUsosMultiples;
				case 'SalonUsosMultiplesObject': return QQN::Equipamiento()->SalonUsosMultiplesObject;
				case 'CentroIntegracionComunitaria': return QQN::Equipamiento()->CentroIntegracionComunitaria;
				case 'CentroIntegracionComunitariaObject': return QQN::Equipamiento()->CentroIntegracionComunitariaObject;
				case 'Otro': return QQN::Equipamiento()->Otro;
				default: throw new QCallerException('Simple Property not found in EquipamientoDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        EquipamientoDataGrid::$strColumnsArray[$strColumnName] = false;
        EquipamientoDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Equipamiento()->$strColumnName, $mixValue);
    }


}
?>