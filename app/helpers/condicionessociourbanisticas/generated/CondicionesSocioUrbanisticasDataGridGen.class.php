<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the CondicionesSocioUrbanisticas class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of CondicionesSocioUrbanisticas objects.  It includes
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
class CondicionesSocioUrbanisticasDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'EspacioLibreComun' => true,
        'PresenciaOrgSociales' => true,
        'NombreRefernte' => true,
        'TelefonoReferente' => true,
        'InformeUrbanisticoFecha' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'CondicionesSocioUrbanisticas';
        $this->strNoun = CondicionesSocioUrbanisticas::Noun();
        $this->strNounPlural = CondicionesSocioUrbanisticas::NounPlural();
        
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

        // Create the Columns (note that you can use strings for condiciones_socio_urbanisticas's properties, or you
        // can traverse down QQN::condiciones_socio_urbanisticas() to display fields that are down the hierarchy)
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::CondicionesSocioUrbanisticas()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['EspacioLibreComun']) $this->MetaAddColumn('EspacioLibreComun')->Title = QApplication::Translate('EspacioLibreComun');
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['PresenciaOrgSociales']) $this->MetaAddColumn('PresenciaOrgSociales')->Title = QApplication::Translate('PresenciaOrgSociales');
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['NombreRefernte']) $this->MetaAddColumn('NombreRefernte')->Title = QApplication::Translate('NombreRefernte');
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['TelefonoReferente']) $this->MetaAddColumn('TelefonoReferente')->Title = QApplication::Translate('TelefonoReferente');
        if (CondicionesSocioUrbanisticasDataGrid::$strColumnsArray['InformeUrbanisticoFecha']) $this->MetaAddColumn('InformeUrbanisticoFecha')->Title = QApplication::Translate('InformeUrbanisticoFecha');
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
					$strLinkUrl .= '?intId=<?=urlencode($_ITEM->Id)?>&intIdFolio=<?=urlencode($_ITEM->IdFolio)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->Id)?>/<?=urlencode($_ITEM->IdFolio)?>';
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
			$intId="IdCondicionesSocioUrbanisticas";
			$strHtml = '<a href="condicionessociourbanisticas/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id . "," . $_ITEM->IdFolio, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(CondicionesSocioUrbanisticas $objCondicionesSocioUrbanisticas) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objCondicionesSocioUrbanisticas->Id;
                        $strControlId .= "x" . $objCondicionesSocioUrbanisticas->IdFolio;
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
					if (isset($this->ParentControl->pnlEditCondicionesSocioUrbanisticas)){
		                if ($this->ParentControl->pnlEditCondicionesSocioUrbanisticas->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof CondicionesSocioUrbanisticasIndexPanelGen){
                             $this->ParentControl->pnlEditCondicionesSocioUrbanisticas = new CondicionesSocioUrbanisticasEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditCondicionesSocioUrbanisticas->Visible=true;
                             $this->ParentControl->dtgCondicionesSocioUrbanisticases->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/condicionessociourbanisticas/edit/".$strParameter);
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
                $this->TotalItemCount = CondicionesSocioUrbanisticas::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from CondicionesSocioUrbanisticas, given the clauses above
            $this->DataSource = CondicionesSocioUrbanisticas::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a CondicionesSocioUrbanisticas-based QQNode.
		 * It will also verify that it is a proper CondicionesSocioUrbanisticas-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'condiciones_socio_urbanisticas') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "condiciones_socio_urbanisticas".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::CondicionesSocioUrbanisticas()->Id;
				case 'IdFolio': return QQN::CondicionesSocioUrbanisticas()->IdFolio;
				case 'IdFolioObject': return QQN::CondicionesSocioUrbanisticas()->IdFolioObject;
				case 'EspacioLibreComun': return QQN::CondicionesSocioUrbanisticas()->EspacioLibreComun;
				case 'PresenciaOrgSociales': return QQN::CondicionesSocioUrbanisticas()->PresenciaOrgSociales;
				case 'NombreRefernte': return QQN::CondicionesSocioUrbanisticas()->NombreRefernte;
				case 'TelefonoReferente': return QQN::CondicionesSocioUrbanisticas()->TelefonoReferente;
				case 'InformeUrbanisticoFecha': return QQN::CondicionesSocioUrbanisticas()->InformeUrbanisticoFecha;
				default: throw new QCallerException('Simple Property not found in CondicionesSocioUrbanisticasDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        CondicionesSocioUrbanisticasDataGrid::$strColumnsArray[$strColumnName] = false;
        CondicionesSocioUrbanisticasDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::CondicionesSocioUrbanisticas()->$strColumnName, $mixValue);
    }


}
?>