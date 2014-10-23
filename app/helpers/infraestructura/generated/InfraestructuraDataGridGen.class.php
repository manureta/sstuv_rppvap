<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Infraestructura class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Infraestructura objects.  It includes
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
class InfraestructuraDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'EnergiaElectricaMedidorIndividualObject' => true,
        'EnergiaElectricaMedidorColectivoObject' => true,
        'AlumbradoPublicoObject' => true,
        'AguaCorrienteObject' => true,
        'AguaPotableObject' => true,
        'RedCloacalObject' => true,
        'SistAlternativoEliminacionExcretasObject' => true,
        'RedGasObject' => true,
        'PavimentoObject' => true,
        'CordonCunetaObject' => true,
        'DesaguesPluvialesObject' => true,
        'RecoleccionResiduosObject' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Infraestructura';
        $this->strNoun = Infraestructura::Noun();
        $this->strNounPlural = Infraestructura::NounPlural();
        
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

        // Create the Columns (note that you can use strings for infraestructura's properties, or you
        // can traverse down QQN::infraestructura() to display fields that are down the hierarchy)
        if (InfraestructuraDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (InfraestructuraDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::Infraestructura()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (InfraestructuraDataGrid::$strColumnsArray['EnergiaElectricaMedidorIndividualObject']) $this->MetaAddColumn(QQN::Infraestructura()->EnergiaElectricaMedidorIndividualObject)->Title = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        if (InfraestructuraDataGrid::$strColumnsArray['EnergiaElectricaMedidorColectivoObject']) $this->MetaAddColumn(QQN::Infraestructura()->EnergiaElectricaMedidorColectivoObject)->Title = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        if (InfraestructuraDataGrid::$strColumnsArray['AlumbradoPublicoObject']) $this->MetaAddColumn(QQN::Infraestructura()->AlumbradoPublicoObject)->Title = QApplication::Translate('AlumbradoPublicoObject');
        if (InfraestructuraDataGrid::$strColumnsArray['AguaCorrienteObject']) $this->MetaAddColumn(QQN::Infraestructura()->AguaCorrienteObject)->Title = QApplication::Translate('AguaCorrienteObject');
        if (InfraestructuraDataGrid::$strColumnsArray['AguaPotableObject']) $this->MetaAddColumn(QQN::Infraestructura()->AguaPotableObject)->Title = QApplication::Translate('AguaPotableObject');
        if (InfraestructuraDataGrid::$strColumnsArray['RedCloacalObject']) $this->MetaAddColumn(QQN::Infraestructura()->RedCloacalObject)->Title = QApplication::Translate('RedCloacalObject');
        if (InfraestructuraDataGrid::$strColumnsArray['SistAlternativoEliminacionExcretasObject']) $this->MetaAddColumn(QQN::Infraestructura()->SistAlternativoEliminacionExcretasObject)->Title = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        if (InfraestructuraDataGrid::$strColumnsArray['RedGasObject']) $this->MetaAddColumn(QQN::Infraestructura()->RedGasObject)->Title = QApplication::Translate('RedGasObject');
        if (InfraestructuraDataGrid::$strColumnsArray['PavimentoObject']) $this->MetaAddColumn(QQN::Infraestructura()->PavimentoObject)->Title = QApplication::Translate('PavimentoObject');
        if (InfraestructuraDataGrid::$strColumnsArray['CordonCunetaObject']) $this->MetaAddColumn(QQN::Infraestructura()->CordonCunetaObject)->Title = QApplication::Translate('CordonCunetaObject');
        if (InfraestructuraDataGrid::$strColumnsArray['DesaguesPluvialesObject']) $this->MetaAddColumn(QQN::Infraestructura()->DesaguesPluvialesObject)->Title = QApplication::Translate('DesaguesPluvialesObject');
        if (InfraestructuraDataGrid::$strColumnsArray['RecoleccionResiduosObject']) $this->MetaAddColumn(QQN::Infraestructura()->RecoleccionResiduosObject)->Title = QApplication::Translate('RecoleccionResiduosObject');
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
			$intId="IdInfraestructura";
			$strHtml = '<a href="infraestructura/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Infraestructura $objInfraestructura) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objInfraestructura->Id;
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
					if (isset($this->ParentControl->pnlEditInfraestructura)){
		                if ($this->ParentControl->pnlEditInfraestructura->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof InfraestructuraIndexPanelGen){
                             $this->ParentControl->pnlEditInfraestructura = new InfraestructuraEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditInfraestructura->Visible=true;
                             $this->ParentControl->dtgInfraestructuras->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/infraestructura/edit/".$strParameter);
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
                $this->TotalItemCount = Infraestructura::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Infraestructura, given the clauses above
            $this->DataSource = Infraestructura::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Infraestructura-based QQNode.
		 * It will also verify that it is a proper Infraestructura-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'infraestructura') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "infraestructura".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::Infraestructura()->Id;
				case 'IdFolio': return QQN::Infraestructura()->IdFolio;
				case 'IdFolioObject': return QQN::Infraestructura()->IdFolioObject;
				case 'EnergiaElectricaMedidorIndividual': return QQN::Infraestructura()->EnergiaElectricaMedidorIndividual;
				case 'EnergiaElectricaMedidorIndividualObject': return QQN::Infraestructura()->EnergiaElectricaMedidorIndividualObject;
				case 'EnergiaElectricaMedidorColectivo': return QQN::Infraestructura()->EnergiaElectricaMedidorColectivo;
				case 'EnergiaElectricaMedidorColectivoObject': return QQN::Infraestructura()->EnergiaElectricaMedidorColectivoObject;
				case 'AlumbradoPublico': return QQN::Infraestructura()->AlumbradoPublico;
				case 'AlumbradoPublicoObject': return QQN::Infraestructura()->AlumbradoPublicoObject;
				case 'AguaCorriente': return QQN::Infraestructura()->AguaCorriente;
				case 'AguaCorrienteObject': return QQN::Infraestructura()->AguaCorrienteObject;
				case 'AguaPotable': return QQN::Infraestructura()->AguaPotable;
				case 'AguaPotableObject': return QQN::Infraestructura()->AguaPotableObject;
				case 'RedCloacal': return QQN::Infraestructura()->RedCloacal;
				case 'RedCloacalObject': return QQN::Infraestructura()->RedCloacalObject;
				case 'SistAlternativoEliminacionExcretas': return QQN::Infraestructura()->SistAlternativoEliminacionExcretas;
				case 'SistAlternativoEliminacionExcretasObject': return QQN::Infraestructura()->SistAlternativoEliminacionExcretasObject;
				case 'RedGas': return QQN::Infraestructura()->RedGas;
				case 'RedGasObject': return QQN::Infraestructura()->RedGasObject;
				case 'Pavimento': return QQN::Infraestructura()->Pavimento;
				case 'PavimentoObject': return QQN::Infraestructura()->PavimentoObject;
				case 'CordonCuneta': return QQN::Infraestructura()->CordonCuneta;
				case 'CordonCunetaObject': return QQN::Infraestructura()->CordonCunetaObject;
				case 'DesaguesPluviales': return QQN::Infraestructura()->DesaguesPluviales;
				case 'DesaguesPluvialesObject': return QQN::Infraestructura()->DesaguesPluvialesObject;
				case 'RecoleccionResiduos': return QQN::Infraestructura()->RecoleccionResiduos;
				case 'RecoleccionResiduosObject': return QQN::Infraestructura()->RecoleccionResiduosObject;
				default: throw new QCallerException('Simple Property not found in InfraestructuraDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        InfraestructuraDataGrid::$strColumnsArray[$strColumnName] = false;
        InfraestructuraDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Infraestructura()->$strColumnName, $mixValue);
    }


}
?>