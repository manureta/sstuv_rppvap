<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Usuario class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Usuario objects.  It includes
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
class UsuarioDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'IdUsuario' => false,
        'Password' => true,
        'Email' => true,
        'SuperAdmin' => true,
        'FechaActivacion' => true,
        'Nombre' => true,
        'IdPerfilObject' => true,
        'CodPartido' => true,
        'NombreCompleto' => true,
        'Reparticion' => true,
        'Telefono' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Usuario';
        $this->strNoun = Usuario::Noun();
        $this->strNounPlural = Usuario::NounPlural();
        
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

        // Create the Columns (note that you can use strings for usuario's properties, or you
        // can traverse down QQN::usuario() to display fields that are down the hierarchy)
        if (UsuarioDataGrid::$strColumnsArray['IdUsuario']) $this->MetaAddColumn('IdUsuario')->Title = QApplication::Translate('IdUsuario');
        if (UsuarioDataGrid::$strColumnsArray['Password']) $this->MetaAddColumn('Password')->Title = QApplication::Translate('Password');
        if (UsuarioDataGrid::$strColumnsArray['Email']) $this->MetaAddColumn('Email')->Title = QApplication::Translate('Email');
        if (UsuarioDataGrid::$strColumnsArray['SuperAdmin']) $this->MetaAddColumn('SuperAdmin')->Title = QApplication::Translate('SuperAdmin');
        if (UsuarioDataGrid::$strColumnsArray['FechaActivacion']) $this->MetaAddColumn('FechaActivacion')->Title = QApplication::Translate('FechaActivacion');
        if (UsuarioDataGrid::$strColumnsArray['Nombre']) $this->MetaAddColumn('Nombre')->Title = QApplication::Translate('Nombre');
        if (UsuarioDataGrid::$strColumnsArray['IdPerfilObject']) $this->MetaAddColumn(QQN::Usuario()->IdPerfilObject)->Title = QApplication::Translate('IdPerfilObject');
        if (UsuarioDataGrid::$strColumnsArray['CodPartido']) $this->MetaAddColumn('CodPartido')->Title = QApplication::Translate('CodPartido');
        if (UsuarioDataGrid::$strColumnsArray['NombreCompleto']) $this->MetaAddColumn('NombreCompleto')->Title = QApplication::Translate('NombreCompleto');
        if (UsuarioDataGrid::$strColumnsArray['Reparticion']) $this->MetaAddColumn('Reparticion')->Title = QApplication::Translate('Reparticion');
        if (UsuarioDataGrid::$strColumnsArray['Telefono']) $this->MetaAddColumn('Telefono')->Title = QApplication::Translate('Telefono');
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
					$strLinkUrl .= '?intIdUsuario=<?=urlencode($_ITEM->IdUsuario)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdUsuario)?>';
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
			$intId="IdUsuario";
			$strHtml = '<a href="usuario/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdUsuario, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Usuario $objUsuario) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objUsuario->IdUsuario;
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
					if (isset($this->ParentControl->pnlEditUsuario)){
		                if ($this->ParentControl->pnlEditUsuario->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof UsuarioIndexPanelGen){
                             $this->ParentControl->pnlEditUsuario = new UsuarioEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditUsuario->Visible=true;
                             $this->ParentControl->dtgUsuarios->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/usuario/edit/".$strParameter);
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
                $this->TotalItemCount = Usuario::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Usuario, given the clauses above
            $this->DataSource = Usuario::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Usuario-based QQNode.
		 * It will also verify that it is a proper Usuario-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'usuario') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "usuario".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdUsuario': return QQN::Usuario()->IdUsuario;
				case 'Password': return QQN::Usuario()->Password;
				case 'Email': return QQN::Usuario()->Email;
				case 'SuperAdmin': return QQN::Usuario()->SuperAdmin;
				case 'FechaActivacion': return QQN::Usuario()->FechaActivacion;
				case 'Nombre': return QQN::Usuario()->Nombre;
				case 'IdPerfil': return QQN::Usuario()->IdPerfil;
				case 'IdPerfilObject': return QQN::Usuario()->IdPerfilObject;
				case 'CodPartido': return QQN::Usuario()->CodPartido;
				case 'NombreCompleto': return QQN::Usuario()->NombreCompleto;
				case 'Reparticion': return QQN::Usuario()->Reparticion;
				case 'Telefono': return QQN::Usuario()->Telefono;
				default: throw new QCallerException('Simple Property not found in UsuarioDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        UsuarioDataGrid::$strColumnsArray[$strColumnName] = false;
        UsuarioDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Usuario()->$strColumnName, $mixValue);
    }


}
?>