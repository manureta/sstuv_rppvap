<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Folio class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Folio objects.  It includes
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
class FolioDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'CodFolio' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'IdPartidoObject' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'IdLocalidadObject' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Matricula' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Fecha' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Encargado' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'NombreBarrioOficial' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'NombreBarrioAlternativo1' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'NombreBarrioAlternativo2' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'AnioOrigen' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Superficie' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'CantidadFamilias' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'TipoBarrioObject' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'ObservacionCasoDudoso' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Judicializado' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Direccion' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'NumExpedientes' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
        'Geom' => true,
        'CondicionesSocioUrbanisticasAsId' => true,
        'RegularizacionAsId' => true,
        'UsoInterno' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Folio';
        $this->strNoun = Folio::Noun();
        $this->strNounPlural = Folio::NounPlural();
        
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

        // Create the Columns (note that you can use strings for folio's properties, or you
        // can traverse down QQN::folio() to display fields that are down the hierarchy)
        if (FolioDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (FolioDataGrid::$strColumnsArray['CodFolio']) $this->MetaAddColumn('CodFolio')->Title = QApplication::Translate('CodFolio');
        if (FolioDataGrid::$strColumnsArray['IdPartidoObject']) $this->MetaAddColumn(QQN::Folio()->IdPartidoObject)->Title = QApplication::Translate('IdPartidoObject');
        if (FolioDataGrid::$strColumnsArray['IdLocalidadObject']) $this->MetaAddColumn(QQN::Folio()->IdLocalidadObject)->Title = QApplication::Translate('IdLocalidadObject');
        if (FolioDataGrid::$strColumnsArray['Matricula']) $this->MetaAddColumn('Matricula')->Title = QApplication::Translate('Matricula');
        if (FolioDataGrid::$strColumnsArray['Fecha']) $this->MetaAddColumn('Fecha')->Title = QApplication::Translate('Fecha');
        if (FolioDataGrid::$strColumnsArray['Encargado']) $this->MetaAddColumn('Encargado')->Title = QApplication::Translate('Encargado');
        if (FolioDataGrid::$strColumnsArray['NombreBarrioOficial']) $this->MetaAddColumn('NombreBarrioOficial')->Title = QApplication::Translate('NombreBarrioOficial');
        if (FolioDataGrid::$strColumnsArray['NombreBarrioAlternativo1']) $this->MetaAddColumn('NombreBarrioAlternativo1')->Title = QApplication::Translate('NombreBarrioAlternativo1');
        if (FolioDataGrid::$strColumnsArray['NombreBarrioAlternativo2']) $this->MetaAddColumn('NombreBarrioAlternativo2')->Title = QApplication::Translate('NombreBarrioAlternativo2');
        if (FolioDataGrid::$strColumnsArray['AnioOrigen']) $this->MetaAddColumn('AnioOrigen')->Title = QApplication::Translate('AnioOrigen');
        if (FolioDataGrid::$strColumnsArray['Superficie']) $this->MetaAddColumn('Superficie')->Title = QApplication::Translate('Superficie');
        if (FolioDataGrid::$strColumnsArray['CantidadFamilias']) $this->MetaAddColumn('CantidadFamilias')->Title = QApplication::Translate('CantidadFamilias');
        if (FolioDataGrid::$strColumnsArray['TipoBarrioObject']) $this->MetaAddColumn(QQN::Folio()->TipoBarrioObject)->Title = QApplication::Translate('TipoBarrioObject');
        if (FolioDataGrid::$strColumnsArray['ObservacionCasoDudoso']) $this->MetaAddColumn('ObservacionCasoDudoso')->Title = QApplication::Translate('ObservacionCasoDudoso');
        if (FolioDataGrid::$strColumnsArray['Judicializado']) $this->MetaAddColumn('Judicializado')->Title = QApplication::Translate('Judicializado');
        if (FolioDataGrid::$strColumnsArray['Direccion']) $this->MetaAddColumn('Direccion')->Title = QApplication::Translate('Direccion');
        if (FolioDataGrid::$strColumnsArray['NumExpedientes']) $this->MetaAddColumn('NumExpedientes')->Title = QApplication::Translate('NumExpedientes');
        if (FolioDataGrid::$strColumnsArray['Geom']) $this->MetaAddColumn('Geom')->Title = QApplication::Translate('Geom');
        if (FolioDataGrid::$strColumnsArray['CondicionesSocioUrbanisticasAsId']) $this->MetaAddColumn(QQN::Folio()->CondicionesSocioUrbanisticasAsId)->Title = QApplication::Translate('CondicionesSocioUrbanisticasAsId');
        if (FolioDataGrid::$strColumnsArray['RegularizacionAsId']) $this->MetaAddColumn(QQN::Folio()->RegularizacionAsId)->Title = QApplication::Translate('RegularizacionAsId');
        if (FolioDataGrid::$strColumnsArray['UsoInterno']) $this->MetaAddColumn(QQN::Folio()->UsoInterno)->Title = QApplication::Translate('UsoInterno');
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
			$intId="IdFolio";
			$strHtml = '<a href="folio/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Folio $objFolio) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objFolio->Id;
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
					if (isset($this->ParentControl->pnlEditFolio)){
		                if ($this->ParentControl->pnlEditFolio->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof FolioIndexPanelGen){
                             $this->ParentControl->pnlEditFolio = new FolioEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditFolio->Visible=true;
                             $this->ParentControl->dtgFolios->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/edit/".$strParameter);
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
                $this->TotalItemCount = Folio::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Folio, given the clauses above
            $this->DataSource = Folio::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Folio-based QQNode.
		 * It will also verify that it is a proper Folio-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'folio') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "folio".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::Folio()->Id;
				case 'CodFolio': return QQN::Folio()->CodFolio;
				case 'IdPartido': return QQN::Folio()->IdPartido;
				case 'IdPartidoObject': return QQN::Folio()->IdPartidoObject;
				case 'IdLocalidad': return QQN::Folio()->IdLocalidad;
				case 'IdLocalidadObject': return QQN::Folio()->IdLocalidadObject;
				case 'Matricula': return QQN::Folio()->Matricula;
				case 'Fecha': return QQN::Folio()->Fecha;
				case 'Encargado': return QQN::Folio()->Encargado;
				case 'NombreBarrioOficial': return QQN::Folio()->NombreBarrioOficial;
				case 'NombreBarrioAlternativo1': return QQN::Folio()->NombreBarrioAlternativo1;
				case 'NombreBarrioAlternativo2': return QQN::Folio()->NombreBarrioAlternativo2;
				case 'AnioOrigen': return QQN::Folio()->AnioOrigen;
				case 'Superficie': return QQN::Folio()->Superficie;
				case 'CantidadFamilias': return QQN::Folio()->CantidadFamilias;
				case 'TipoBarrio': return QQN::Folio()->TipoBarrio;
				case 'TipoBarrioObject': return QQN::Folio()->TipoBarrioObject;
				case 'ObservacionCasoDudoso': return QQN::Folio()->ObservacionCasoDudoso;
				case 'Judicializado': return QQN::Folio()->Judicializado;
				case 'Direccion': return QQN::Folio()->Direccion;
				case 'NumExpedientes': return QQN::Folio()->NumExpedientes;
				case 'Geom': return QQN::Folio()->Geom;
				case 'CondicionesSocioUrbanisticasAsId': return QQN::Folio()->CondicionesSocioUrbanisticasAsId;

				case 'RegularizacionAsId': return QQN::Folio()->RegularizacionAsId;

				case 'UsoInterno': return QQN::Folio()->UsoInterno;

				default: throw new QCallerException('Simple Property not found in FolioDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        FolioDataGrid::$strColumnsArray[$strColumnName] = false;
        FolioDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Folio()->$strColumnName, $mixValue);
    }


}
?>