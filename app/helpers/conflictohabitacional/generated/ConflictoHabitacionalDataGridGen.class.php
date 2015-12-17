<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the ConflictoHabitacional class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of ConflictoHabitacional objects.  It includes
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
class ConflictoHabitacionalDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'IntervinoArea' => true,
        'FueroInterviniente' => true,
        'JuzgadoInterviniente' => true,
        'CaratulaExpediente' => true,
        'MinisterioDesarrollo' => true,
        'MinisterioDesarrolloReferente' => true,
        'DefensorPueblo' => true,
        'DefensorPuebloReferente' => true,
        'SecretariaNacional' => true,
        'SecretariaNacionalReferente' => true,
        'Municipalidad' => true,
        'MunicipalidadReferente' => true,
        'OrganizacionBarrial' => true,
        'OrganizacionBarrialReferente' => true,
        'OtrosOrganismos' => true,
        'OrdenDesalojo' => true,
        'FechaEjecucion' => true,
        'SuspensionHecho' => true,
        'SolicitudSuspension' => true,
        'FechaSuspension' => true,
        'DuracionSuspension' => true,
        'MesaGestion' => true,
        'Observaciones' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'ConflictoHabitacional';
        $this->strNoun = ConflictoHabitacional::Noun();
        $this->strNounPlural = ConflictoHabitacional::NounPlural();
        
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

        // Create the Columns (note that you can use strings for conflicto_habitacional's properties, or you
        // can traverse down QQN::conflicto_habitacional() to display fields that are down the hierarchy)
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::ConflictoHabitacional()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['IntervinoArea']) $this->MetaAddColumn('IntervinoArea')->Title = QApplication::Translate('IntervinoArea');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['FueroInterviniente']) $this->MetaAddColumn('FueroInterviniente')->Title = QApplication::Translate('FueroInterviniente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['JuzgadoInterviniente']) $this->MetaAddColumn('JuzgadoInterviniente')->Title = QApplication::Translate('JuzgadoInterviniente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['CaratulaExpediente']) $this->MetaAddColumn('CaratulaExpediente')->Title = QApplication::Translate('CaratulaExpediente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['MinisterioDesarrollo']) $this->MetaAddColumn('MinisterioDesarrollo')->Title = QApplication::Translate('MinisterioDesarrollo');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['MinisterioDesarrolloReferente']) $this->MetaAddColumn('MinisterioDesarrolloReferente')->Title = QApplication::Translate('MinisterioDesarrolloReferente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['DefensorPueblo']) $this->MetaAddColumn('DefensorPueblo')->Title = QApplication::Translate('DefensorPueblo');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['DefensorPuebloReferente']) $this->MetaAddColumn('DefensorPuebloReferente')->Title = QApplication::Translate('DefensorPuebloReferente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['SecretariaNacional']) $this->MetaAddColumn('SecretariaNacional')->Title = QApplication::Translate('SecretariaNacional');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['SecretariaNacionalReferente']) $this->MetaAddColumn('SecretariaNacionalReferente')->Title = QApplication::Translate('SecretariaNacionalReferente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['Municipalidad']) $this->MetaAddColumn('Municipalidad')->Title = QApplication::Translate('Municipalidad');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['MunicipalidadReferente']) $this->MetaAddColumn('MunicipalidadReferente')->Title = QApplication::Translate('MunicipalidadReferente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['OrganizacionBarrial']) $this->MetaAddColumn('OrganizacionBarrial')->Title = QApplication::Translate('OrganizacionBarrial');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['OrganizacionBarrialReferente']) $this->MetaAddColumn('OrganizacionBarrialReferente')->Title = QApplication::Translate('OrganizacionBarrialReferente');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['OtrosOrganismos']) $this->MetaAddColumn('OtrosOrganismos')->Title = QApplication::Translate('OtrosOrganismos');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['OrdenDesalojo']) $this->MetaAddColumn('OrdenDesalojo')->Title = QApplication::Translate('OrdenDesalojo');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['FechaEjecucion']) $this->MetaAddColumn('FechaEjecucion')->Title = QApplication::Translate('FechaEjecucion');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['SuspensionHecho']) $this->MetaAddColumn('SuspensionHecho')->Title = QApplication::Translate('SuspensionHecho');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['SolicitudSuspension']) $this->MetaAddColumn('SolicitudSuspension')->Title = QApplication::Translate('SolicitudSuspension');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['FechaSuspension']) $this->MetaAddColumn('FechaSuspension')->Title = QApplication::Translate('FechaSuspension');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['DuracionSuspension']) $this->MetaAddColumn('DuracionSuspension')->Title = QApplication::Translate('DuracionSuspension');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['MesaGestion']) $this->MetaAddColumn('MesaGestion')->Title = QApplication::Translate('MesaGestion');
        if (ConflictoHabitacionalDataGrid::$strColumnsArray['Observaciones']) $this->MetaAddColumn('Observaciones')->Title = QApplication::Translate('Observaciones');
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
			$intId="IdConflictoHabitacional";
			$strHtml = '<a href="conflictohabitacional/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(ConflictoHabitacional $objConflictoHabitacional) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objConflictoHabitacional->Id;
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
					if (isset($this->ParentControl->pnlEditConflictoHabitacional)){
		                if ($this->ParentControl->pnlEditConflictoHabitacional->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof ConflictoHabitacionalIndexPanelGen){
                             $this->ParentControl->pnlEditConflictoHabitacional = new ConflictoHabitacionalEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditConflictoHabitacional->Visible=true;
                             $this->ParentControl->dtgConflictoHabitacionales->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/conflictohabitacional/edit/".$strParameter);
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
                $this->TotalItemCount = ConflictoHabitacional::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from ConflictoHabitacional, given the clauses above
            $this->DataSource = ConflictoHabitacional::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a ConflictoHabitacional-based QQNode.
		 * It will also verify that it is a proper ConflictoHabitacional-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'conflicto_habitacional') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "conflicto_habitacional".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::ConflictoHabitacional()->Id;
				case 'IdFolio': return QQN::ConflictoHabitacional()->IdFolio;
				case 'IdFolioObject': return QQN::ConflictoHabitacional()->IdFolioObject;
				case 'IntervinoArea': return QQN::ConflictoHabitacional()->IntervinoArea;
				case 'FueroInterviniente': return QQN::ConflictoHabitacional()->FueroInterviniente;
				case 'JuzgadoInterviniente': return QQN::ConflictoHabitacional()->JuzgadoInterviniente;
				case 'CaratulaExpediente': return QQN::ConflictoHabitacional()->CaratulaExpediente;
				case 'MinisterioDesarrollo': return QQN::ConflictoHabitacional()->MinisterioDesarrollo;
				case 'MinisterioDesarrolloReferente': return QQN::ConflictoHabitacional()->MinisterioDesarrolloReferente;
				case 'DefensorPueblo': return QQN::ConflictoHabitacional()->DefensorPueblo;
				case 'DefensorPuebloReferente': return QQN::ConflictoHabitacional()->DefensorPuebloReferente;
				case 'SecretariaNacional': return QQN::ConflictoHabitacional()->SecretariaNacional;
				case 'SecretariaNacionalReferente': return QQN::ConflictoHabitacional()->SecretariaNacionalReferente;
				case 'Municipalidad': return QQN::ConflictoHabitacional()->Municipalidad;
				case 'MunicipalidadReferente': return QQN::ConflictoHabitacional()->MunicipalidadReferente;
				case 'OrganizacionBarrial': return QQN::ConflictoHabitacional()->OrganizacionBarrial;
				case 'OrganizacionBarrialReferente': return QQN::ConflictoHabitacional()->OrganizacionBarrialReferente;
				case 'OtrosOrganismos': return QQN::ConflictoHabitacional()->OtrosOrganismos;
				case 'OrdenDesalojo': return QQN::ConflictoHabitacional()->OrdenDesalojo;
				case 'FechaEjecucion': return QQN::ConflictoHabitacional()->FechaEjecucion;
				case 'SuspensionHecho': return QQN::ConflictoHabitacional()->SuspensionHecho;
				case 'SolicitudSuspension': return QQN::ConflictoHabitacional()->SolicitudSuspension;
				case 'FechaSuspension': return QQN::ConflictoHabitacional()->FechaSuspension;
				case 'DuracionSuspension': return QQN::ConflictoHabitacional()->DuracionSuspension;
				case 'MesaGestion': return QQN::ConflictoHabitacional()->MesaGestion;
				case 'Observaciones': return QQN::ConflictoHabitacional()->Observaciones;
				default: throw new QCallerException('Simple Property not found in ConflictoHabitacionalDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        ConflictoHabitacionalDataGrid::$strColumnsArray[$strColumnName] = false;
        ConflictoHabitacionalDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::ConflictoHabitacional()->$strColumnName, $mixValue);
    }


}
?>