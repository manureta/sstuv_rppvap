<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the UsoInterno class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of UsoInterno objects.  It includes
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
class UsoInternoDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'IdFolioObject' => true,
        'InformeUrbanistico' => true,
        'MapeoPreliminar' => true,
        'NoCorrespondeInscripcion' => true,
        'ResolucionInscripcionProvisoria' => true,
        'ResolucionInscripcionDefinitiva' => true,
        'RegularizacionCircular10Catastro' => true,
        'RegularizacionEstadoProcesoObject' => true,
        'NumExpediente' => true,
        'RegistracionLegajo' => true,
        'RegistracionFecha' => true,
        'RegistracionFolio' => true,
        'GeodesiaNum' => true,
        'GeodesiaAnio' => true,
        'FechaCenso' => true,
        'GeodesiaPartido' => true,
        'EstadoFolioObject' => true,
        'RegularizacionTienePlano' => true,
        'TieneCenso' => true,
        'Ley14449' => true,
        'Objetado' => true,
        'ComentarioObjetacion' => true,
        'RegularizacionFechaInicio' => true,
        'FechaInformeUrbanistico' => true,
        'Comentarios' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'UsoInterno';
        $this->strNoun = UsoInterno::Noun();
        $this->strNounPlural = UsoInterno::NounPlural();
        
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

        // Create the Columns (note that you can use strings for uso_interno's properties, or you
        // can traverse down QQN::uso_interno() to display fields that are down the hierarchy)
        if (UsoInternoDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::UsoInterno()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (UsoInternoDataGrid::$strColumnsArray['InformeUrbanistico']) $this->MetaAddColumn('InformeUrbanistico')->Title = QApplication::Translate('InformeUrbanistico');
        if (UsoInternoDataGrid::$strColumnsArray['MapeoPreliminar']) $this->MetaAddColumn('MapeoPreliminar')->Title = QApplication::Translate('MapeoPreliminar');
        if (UsoInternoDataGrid::$strColumnsArray['NoCorrespondeInscripcion']) $this->MetaAddColumn('NoCorrespondeInscripcion')->Title = QApplication::Translate('NoCorrespondeInscripcion');
        if (UsoInternoDataGrid::$strColumnsArray['ResolucionInscripcionProvisoria']) $this->MetaAddColumn('ResolucionInscripcionProvisoria')->Title = QApplication::Translate('ResolucionInscripcionProvisoria');
        if (UsoInternoDataGrid::$strColumnsArray['ResolucionInscripcionDefinitiva']) $this->MetaAddColumn('ResolucionInscripcionDefinitiva')->Title = QApplication::Translate('ResolucionInscripcionDefinitiva');
        if (UsoInternoDataGrid::$strColumnsArray['RegularizacionCircular10Catastro']) $this->MetaAddColumn('RegularizacionCircular10Catastro')->Title = QApplication::Translate('RegularizacionCircular10Catastro');
        if (UsoInternoDataGrid::$strColumnsArray['RegularizacionEstadoProcesoObject']) $this->MetaAddColumn(QQN::UsoInterno()->RegularizacionEstadoProcesoObject)->Title = QApplication::Translate('RegularizacionEstadoProcesoObject');
        if (UsoInternoDataGrid::$strColumnsArray['NumExpediente']) $this->MetaAddColumn('NumExpediente')->Title = QApplication::Translate('NumExpediente');
        if (UsoInternoDataGrid::$strColumnsArray['RegistracionLegajo']) $this->MetaAddColumn('RegistracionLegajo')->Title = QApplication::Translate('RegistracionLegajo');
        if (UsoInternoDataGrid::$strColumnsArray['RegistracionFecha']) $this->MetaAddColumn('RegistracionFecha')->Title = QApplication::Translate('RegistracionFecha');
        if (UsoInternoDataGrid::$strColumnsArray['RegistracionFolio']) $this->MetaAddColumn('RegistracionFolio')->Title = QApplication::Translate('RegistracionFolio');
        if (UsoInternoDataGrid::$strColumnsArray['GeodesiaNum']) $this->MetaAddColumn('GeodesiaNum')->Title = QApplication::Translate('GeodesiaNum');
        if (UsoInternoDataGrid::$strColumnsArray['GeodesiaAnio']) $this->MetaAddColumn('GeodesiaAnio')->Title = QApplication::Translate('GeodesiaAnio');
        if (UsoInternoDataGrid::$strColumnsArray['FechaCenso']) $this->MetaAddColumn('FechaCenso')->Title = QApplication::Translate('FechaCenso');
        if (UsoInternoDataGrid::$strColumnsArray['GeodesiaPartido']) $this->MetaAddColumn('GeodesiaPartido')->Title = QApplication::Translate('GeodesiaPartido');
        if (UsoInternoDataGrid::$strColumnsArray['EstadoFolioObject']) $this->MetaAddColumn(QQN::UsoInterno()->EstadoFolioObject)->Title = QApplication::Translate('EstadoFolioObject');
        if (UsoInternoDataGrid::$strColumnsArray['RegularizacionTienePlano']) $this->MetaAddColumn('RegularizacionTienePlano')->Title = QApplication::Translate('RegularizacionTienePlano');
        if (UsoInternoDataGrid::$strColumnsArray['TieneCenso']) $this->MetaAddColumn('TieneCenso')->Title = QApplication::Translate('TieneCenso');
        if (UsoInternoDataGrid::$strColumnsArray['Ley14449']) $this->MetaAddColumn('Ley14449')->Title = QApplication::Translate('Ley14449');
        if (UsoInternoDataGrid::$strColumnsArray['Objetado']) $this->MetaAddColumn('Objetado')->Title = QApplication::Translate('Objetado');
        if (UsoInternoDataGrid::$strColumnsArray['ComentarioObjetacion']) $this->MetaAddColumn('ComentarioObjetacion')->Title = QApplication::Translate('ComentarioObjetacion');
        if (UsoInternoDataGrid::$strColumnsArray['RegularizacionFechaInicio']) $this->MetaAddColumn('RegularizacionFechaInicio')->Title = QApplication::Translate('RegularizacionFechaInicio');
        if (UsoInternoDataGrid::$strColumnsArray['FechaInformeUrbanistico']) $this->MetaAddColumn('FechaInformeUrbanistico')->Title = QApplication::Translate('FechaInformeUrbanistico');
        if (UsoInternoDataGrid::$strColumnsArray['Comentarios']) $this->MetaAddColumn('Comentarios')->Title = QApplication::Translate('Comentarios');
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
					$strLinkUrl .= '?intIdFolio=<?=urlencode($_ITEM->IdFolio)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdFolio)?>';
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
			$intId="IdUsoInterno";
			$strHtml = '<a href="usointerno/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdFolio, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(UsoInterno $objUsoInterno) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objUsoInterno->IdFolio;
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
					if (isset($this->ParentControl->pnlEditUsoInterno)){
		                if ($this->ParentControl->pnlEditUsoInterno->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof UsoInternoIndexPanelGen){
                             $this->ParentControl->pnlEditUsoInterno = new UsoInternoEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditUsoInterno->Visible=true;
                             $this->ParentControl->dtgUsoInternos->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/usointerno/edit/".$strParameter);
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
                $this->TotalItemCount = UsoInterno::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from UsoInterno, given the clauses above
            $this->DataSource = UsoInterno::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a UsoInterno-based QQNode.
		 * It will also verify that it is a proper UsoInterno-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'uso_interno') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "uso_interno".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdFolio': return QQN::UsoInterno()->IdFolio;
				case 'IdFolioObject': return QQN::UsoInterno()->IdFolioObject;
				case 'InformeUrbanistico': return QQN::UsoInterno()->InformeUrbanistico;
				case 'MapeoPreliminar': return QQN::UsoInterno()->MapeoPreliminar;
				case 'NoCorrespondeInscripcion': return QQN::UsoInterno()->NoCorrespondeInscripcion;
				case 'ResolucionInscripcionProvisoria': return QQN::UsoInterno()->ResolucionInscripcionProvisoria;
				case 'ResolucionInscripcionDefinitiva': return QQN::UsoInterno()->ResolucionInscripcionDefinitiva;
				case 'RegularizacionCircular10Catastro': return QQN::UsoInterno()->RegularizacionCircular10Catastro;
				case 'RegularizacionEstadoProceso': return QQN::UsoInterno()->RegularizacionEstadoProceso;
				case 'RegularizacionEstadoProcesoObject': return QQN::UsoInterno()->RegularizacionEstadoProcesoObject;
				case 'NumExpediente': return QQN::UsoInterno()->NumExpediente;
				case 'RegistracionLegajo': return QQN::UsoInterno()->RegistracionLegajo;
				case 'RegistracionFecha': return QQN::UsoInterno()->RegistracionFecha;
				case 'RegistracionFolio': return QQN::UsoInterno()->RegistracionFolio;
				case 'GeodesiaNum': return QQN::UsoInterno()->GeodesiaNum;
				case 'GeodesiaAnio': return QQN::UsoInterno()->GeodesiaAnio;
				case 'FechaCenso': return QQN::UsoInterno()->FechaCenso;
				case 'GeodesiaPartido': return QQN::UsoInterno()->GeodesiaPartido;
				case 'EstadoFolio': return QQN::UsoInterno()->EstadoFolio;
				case 'EstadoFolioObject': return QQN::UsoInterno()->EstadoFolioObject;
				case 'RegularizacionTienePlano': return QQN::UsoInterno()->RegularizacionTienePlano;
				case 'TieneCenso': return QQN::UsoInterno()->TieneCenso;
				case 'Ley14449': return QQN::UsoInterno()->Ley14449;
				case 'Objetado': return QQN::UsoInterno()->Objetado;
				case 'ComentarioObjetacion': return QQN::UsoInterno()->ComentarioObjetacion;
				case 'RegularizacionFechaInicio': return QQN::UsoInterno()->RegularizacionFechaInicio;
				case 'FechaInformeUrbanistico': return QQN::UsoInterno()->FechaInformeUrbanistico;
				case 'Comentarios': return QQN::UsoInterno()->Comentarios;
				default: throw new QCallerException('Simple Property not found in UsoInternoDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        UsoInternoDataGrid::$strColumnsArray[$strColumnName] = false;
        UsoInternoDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::UsoInterno()->$strColumnName, $mixValue);
    }


}
?>