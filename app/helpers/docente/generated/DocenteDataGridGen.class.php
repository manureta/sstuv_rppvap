<?php
	/**
	 * This is the "Meta" DataGrid class for the List functionality
	 * of the Docente class.  This code-generated class
	 * contains a QDataGrid class which can be used by any QForm or QPanel,
	 * listing a collection of Docente objects.  It includes
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
	class DocenteDataGridGen extends QFilteredDataGrid {
		/**
		 * Standard DataGrid constructor which also pre-configures the DataBinder
		 * to its own SimpleDataBinder.  Also pre-configures UseAjax to true.
		 *
		 * @param mixed $objParentObject either a QPanel or QForm which would be this DataGrid's parent
		 * @param string $strControlId optional explicitly-defined ControlId for this DataGrid
		 */
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->SetDataBinder('MetaDataBinder', $this);
			$this->UseAjax = true;
			$this->addColumns();
		}

		protected function addColumns() {
		 // Use the MetaDataGrid functionality to add Columns for this datagrid
	
			// Create an Edit Column
			//Setup Docente Panel
			$this->AddColumn(new QDataGridColumn(QApplication::Translate("Edit"), '<?= $_CONTROL->EditColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false'));

			// Create the Other Columns (note that you can use strings for docente's properties, or you
			// can traverse down QQN::docente() to display fields that are down the hierarchy)
			$this->MetaAddColumn('IdDocente')->Name = QApplication::Translate('IdDocente');
			$this->MetaAddColumn(QQN::Docente()->IdPerfilObject)->Name = QApplication::Translate('IdPerfilObject');
			$this->MetaAddColumn('Nombre')->Name = QApplication::Translate('Nombre');
			$this->MetaAddColumn('Apellido')->Name = QApplication::Translate('Apellido');
			$this->MetaAddColumn('Cuit')->Name = QApplication::Translate('Cuit');
			$this->MetaAddColumn('Activo')->Name = QApplication::Translate('Activo');
			$this->MetaAddColumn('Dni')->Name = QApplication::Translate('Dni');
			$this->MetaAddColumn('Sexo')->Name = QApplication::Translate('Sexo');
			$this->MetaAddColumn('FechaNacimiento')->Name = QApplication::Translate('FechaNacimiento');
			$this->MetaAddColumn('Modalidad')->Name = QApplication::Translate('Modalidad');
			$this->MetaAddColumn('Nivel')->Name = QApplication::Translate('Nivel');
			$this->MetaAddColumn('EnActividad')->Name = QApplication::Translate('EnActividad');
			$this->MetaAddColumn('FechaInicioLicencia')->Name = QApplication::Translate('FechaInicioLicencia');
			$this->MetaAddColumn('FechaFinLicencia')->Name = QApplication::Translate('FechaFinLicencia');
			$this->MetaAddColumn('MotivoLicencia')->Name = QApplication::Translate('MotivoLicencia');
			$this->MetaAddColumn('LicenciaGoceHaberes')->Name = QApplication::Translate('LicenciaGoceHaberes');
		}


		/**
         * Given the description of the Column's contents, this is a simple, express
         * way of adding a column to this Docente datagrid.  The description of a column's
         * content can be either a text string description of a simple field name
         * in the Docente object, or it can be any QQNode extending from QQN::Docente().
         * 
         * MetaAddColumn will automatically pre-configure the column with the name, html
         * and sort rules given the content being specified.
         * 
         * Any of these things can be overridden with OverrideParameters.
         * 
         * Finally, $mixContents can also be an array of contents, if displaying and/or
         * sorting using two fields from the Docente object.
         *
         * @param mixed $mixContents
         * @param string $objOverrideParameters[]
         * @return QFilteredDataGridColumn
         */
        public function MetaAddColumn($mixContent, $objOverrideParameters = null) {
            if (is_array($mixContent)) {
                $objNodeArray = array();

                try {
                    foreach ($mixContent as $mixItem) {
                        $objNodeArray[] = $this->ResolveContentItem($mixItem);
                    }
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

                if (count($objNodeArray) == 0)
                    throw new QCallerException('No content specified');

                // Create Various Arrays to be used by DGC
                $strNameArray = '';
                $strHtmlArray = '';
                $objSort = array();
                $objSortDescending = array();
                foreach ($objNodeArray as $objNode) {
                    $strNameArray[] = QApplication::Translate(QConvertNotation::WordsFromCamelCase($objNode->_PropertyName));
                    $strHtmlArray[] = $objNode->GetDataGridHtml();
                    $objSort[] = $objNode->GetDataGridOrderByNode();
                    $objSortDescending[] = $objNode->GetDataGridOrderByNode();
                    $objSortDescending[] = false;
                }

                $objNewColumn = new QFilteredDataGridColumn(
                    implode(', ', $strNameArray), 
                    '<?=' . implode(' . ", " . ', $strHtmlArray) . '?>',
                    array(
                        'OrderByClause' => new QQOrderBy($objNodeArray),
                        'ReverseOrderByClause' => new QQOrderBy($objSortDescending)
                    )
                );
            } else {
                try {
                    $objNode = $this->ResolveContentItem($mixContent);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

                $objNewColumn = new QFilteredDataGridColumn(
                    QApplication::Translate(QConvertNotation::WordsFromCamelCase($objNode->_PropertyName)),
                    '<?=' . $objNode->GetDataGridHtml() . '?>',
                    array(
                        'OrderByClause' => QQ::OrderBy($objNode->GetDataGridOrderByNode()),
                        'ReverseOrderByClause' => QQ::OrderBy($objNode->GetDataGridOrderByNode(), false)
                    )
                );

                $objNode->SetFilteredDataGridColumnFilter($objNewColumn);
            }

            $objOverrideArray = func_get_args();
            if (count($objOverrideArray) > 1)
                try {
                    unset($objOverrideArray[0]);
                    $objNewColumn->OverrideAttributes($objOverrideArray);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
 
            $this->AddColumn($objNewColumn);
            return $objNewColumn;
        }


		/**
		 * Similar to MetaAddColumn, except it creates a column for a Type-based Id.  You MUST specify
		 * the name of the Type class that this will attempt to use $NameArray against.
		 * 
		 * Also, $mixContent cannot be an array.  Only a single field can be specified.
		 *
		 * @param mixed $mixContent string or QQNode from Docente
		 * @param string $strTypeClassName the name of the TypeClass to use $NameArray against
		 * @param mixed $objOverrideParameters
		 */
		public function MetaAddTypeColumn($mixContent, $strTypeClassName, $objOverrideParameters = null) {
			// Validate TypeClassName
			if (!class_exists($strTypeClassName) || !property_exists($strTypeClassName, 'NameArray'))
				throw new QCallerException('Invalid TypeClass Name: ' . $strTypeClassName);

			// Validate Node
			try {
				$objNode = $this->ResolveContentItem($mixContent);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Create the Column
			$strName = QConvertNotation::WordsFromCamelCase($objNode->_PropertyName);
			if (strtolower(substr($strName, strlen($strName) - 3)) == ' id')
				$strName = substr($strName, 0, strlen($strName) - 3);
			$strProperty = $objNode->GetDataGridHtml();
			$objNewColumn = new QFilteredDataGridColumn(
				QApplication::Translate($strName),
				sprintf('<?=(%s) ? %s::$NameArray[%s] : null;?>', $strProperty, $strTypeClassName, $strProperty),
				array(
					'OrderByClause' => QQ::OrderBy($objNode),
					'ReverseOrderByClause' => QQ::OrderBy($objNode, false)
				)
			);
			$objNode->SetFilteredDataGridColumnFilter($objNewColumn);

			// Perform Overrides
			$objOverrideArray = func_get_args();
			if (count($objOverrideArray) > 2)
				try {
					unset($objOverrideArray[0]);
					unset($objOverrideArray[1]);
					$objNewColumn->OverrideAttributes($objOverrideArray);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			$this->AddColumn($objNewColumn);
			return $objNewColumn;
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
					$strLinkUrl .= '?intIdDocente=<?=urlencode($_ITEM->IdDocente)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdDocente)?>';
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
			$intId="IdDocente";
			$strHtml = '<a href="docente/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdDocente, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Docente $objDocente) {
                        $strControlId = "";
                        $strControlId .= "x" . $objDocente->IdDocente;
                        $strControlId = substr($strControlId, 1);
	                $btnEdit = $this->objForm->GetControl("btnEdit".$strControlId);
	                if (!$btnEdit) {
	                    // Create the Edit button for this row in the DataGrid
	                    // Use ActionParameter to specify the ID of the person
	                    $btnEdit = new QButton($this, "btnEdit".$strControlId);
	                    $btnEdit->Text = QApplication::Translate('Edit This Docente');
	                    $btnEdit->ActionParameter = $strControlId;
	                    $btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnEdit_Click'));
	                    $btnEdit->CausesValidation = false;
	                    $btnEdit->CssClass="button editbuttonM";
	                }
	
	                // If we are currently editing a person, then set this Edit button to be disabled
					if (isset($this->ParentControl->pnlEditDocente)){
		                if ($this->ParentControl->pnlEditDocente->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof DocenteIndexPanel){
                             $this->ParentControl->pnlEditDocente = new DocenteEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditDocente->Visible=true;
                             $this->ParentControl->btnCreateNew->Enabled=false;
                             $this->ParentControl->Refresh();
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/docente/edit/".$strParameter);
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
                $this->TotalItemCount = Docente::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Docente, given the clauses above
            $this->DataSource = Docente::QueryArray($this->Conditions, $objClauses);
        }


		/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Docente-based QQNode.
		 * It will also verify that it is a proper Docente-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'docente') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "docente".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdDocente': return QQN::Docente()->IdDocente;
				case 'IdPerfil': return QQN::Docente()->IdPerfil;
				case 'IdPerfilObject': return QQN::Docente()->IdPerfilObject;
				case 'Nombre': return QQN::Docente()->Nombre;
				case 'Apellido': return QQN::Docente()->Apellido;
				case 'Cuit': return QQN::Docente()->Cuit;
				case 'Activo': return QQN::Docente()->Activo;
				case 'Dni': return QQN::Docente()->Dni;
				case 'Sexo': return QQN::Docente()->Sexo;
				case 'FechaNacimiento': return QQN::Docente()->FechaNacimiento;
				case 'Modalidad': return QQN::Docente()->Modalidad;
				case 'Nivel': return QQN::Docente()->Nivel;
				case 'EnActividad': return QQN::Docente()->EnActividad;
				case 'FechaInicioLicencia': return QQN::Docente()->FechaInicioLicencia;
				case 'FechaFinLicencia': return QQN::Docente()->FechaFinLicencia;
				case 'MotivoLicencia': return QQN::Docente()->MotivoLicencia;
				case 'LicenciaGoceHaberes': return QQN::Docente()->LicenciaGoceHaberes;
				default: throw new QCallerException('Simple Property not found in DocenteDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}
	}
?>