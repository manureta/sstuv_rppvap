<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the Nomenclatura class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of Nomenclatura objects.  It includes
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
class NomenclaturaDataGridGen extends QFilteredDataGrid {

public $greenStyle;
public $redStyle;
    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'PartidaInmobiliaria' => true,
        'TitularDominio' => true,
        'Circ' => true,
        'Secc' => true,
        'ChacQuinta' => true,
        'Frac' => true,
        'Mza' => true,
        'Parc' => true,
        'InscripcionDominio' => true,
        'TitularRegPropiedad' => true,
        'Partido' => true,
        'DatoVerificadoRegPropiedad' => true,
        'EstadoGeografico' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'Nomenclatura';
        $this->strNoun = Nomenclatura::Noun();
        $this->strNounPlural = Nomenclatura::NounPlural();
        
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
        /*
        $this->greenStyle = new QDataGridRowStyle();
	    $this->greenStyle->BackColor = 'green';
	    $this->redStyle = new QDataGridRowStyle();
	    $this->redStyle->BackColor = 'red';
	   */
    }
/*
    protected function GetDataGridRowHtml($objObject) {
    	error_log("llama");
	    if ($objObject->EstadoGeografico = 'parcial') {
	       $this->objRowStyle = $this->greenStyle;
	    } else {
	       $this->objRowStyle = $this->redStyle;
	    }
	    return parent::GetDataGridRowHtml($objObject);
	  }
*/
    protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Columns (note that you can use strings for nomenclatura's properties, or you
        // can traverse down QQN::nomenclatura() to display fields that are down the hierarchy)
        if (NomenclaturaDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (NomenclaturaDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::Nomenclatura()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (NomenclaturaDataGrid::$strColumnsArray['PartidaInmobiliaria']) $this->MetaAddColumn('PartidaInmobiliaria')->Title = QApplication::Translate('PartidaInmobiliaria');
        if (NomenclaturaDataGrid::$strColumnsArray['TitularDominio']) $this->MetaAddColumn('TitularDominio')->Title = QApplication::Translate('TitularDominio');
        if (NomenclaturaDataGrid::$strColumnsArray['Circ']) $this->MetaAddColumn('Circ')->Title = QApplication::Translate('Circ');
        if (NomenclaturaDataGrid::$strColumnsArray['Secc']) $this->MetaAddColumn('Secc')->Title = QApplication::Translate('Secc');
        if (NomenclaturaDataGrid::$strColumnsArray['ChacQuinta']) $this->MetaAddColumn('ChacQuinta')->Title = QApplication::Translate('ChacQuinta');
        if (NomenclaturaDataGrid::$strColumnsArray['Frac']) $this->MetaAddColumn('Frac')->Title = QApplication::Translate('Frac');
        if (NomenclaturaDataGrid::$strColumnsArray['Mza']) $this->MetaAddColumn('Mza')->Title = QApplication::Translate('Mza');
        if (NomenclaturaDataGrid::$strColumnsArray['Parc']) $this->MetaAddColumn('Parc')->Title = QApplication::Translate('Parc');
        if (NomenclaturaDataGrid::$strColumnsArray['InscripcionDominio']) $this->MetaAddColumn('InscripcionDominio')->Title = QApplication::Translate('InscripcionDominio');
        if (NomenclaturaDataGrid::$strColumnsArray['TitularRegPropiedad']) $this->MetaAddColumn('TitularRegPropiedad')->Title = QApplication::Translate('TitularRegPropiedad');
        if (NomenclaturaDataGrid::$strColumnsArray['Partido']) $this->MetaAddColumn('Partido')->Title = QApplication::Translate('Partido');
        if (NomenclaturaDataGrid::$strColumnsArray['DatoVerificadoRegPropiedad']) $this->MetaAddColumn('DatoVerificadoRegPropiedad')->Title = QApplication::Translate('DatoVerificadoRegPropiedad');
        if (NomenclaturaDataGrid::$strColumnsArray['EstadoGeografico']) $this->MetaAddColumn('EstadoGeografico')->Title = QApplication::Translate('EstadoGeografico');
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
			$intId="IdNomenclatura";
			$strHtml = '<a href="nomenclatura/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(Nomenclatura $objNomenclatura) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objNomenclatura->Id;
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
					if (isset($this->ParentControl->pnlEditNomenclatura)){
		                if ($this->ParentControl->pnlEditNomenclatura->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof NomenclaturaIndexPanelGen){
                             $this->ParentControl->pnlEditNomenclatura = new NomenclaturaEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditNomenclatura->Visible=true;
                             $this->ParentControl->dtgNomenclaturas->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/edit/".$strParameter);
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
                $this->TotalItemCount = Nomenclatura::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from Nomenclatura, given the clauses above
            $this->DataSource = Nomenclatura::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a Nomenclatura-based QQNode.
		 * It will also verify that it is a proper Nomenclatura-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'nomenclatura') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "nomenclatura".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::Nomenclatura()->Id;
				case 'IdFolio': return QQN::Nomenclatura()->IdFolio;
				case 'IdFolioObject': return QQN::Nomenclatura()->IdFolioObject;
				case 'PartidaInmobiliaria': return QQN::Nomenclatura()->PartidaInmobiliaria;
				case 'TitularDominio': return QQN::Nomenclatura()->TitularDominio;
				case 'Circ': return QQN::Nomenclatura()->Circ;
				case 'Secc': return QQN::Nomenclatura()->Secc;
				case 'ChacQuinta': return QQN::Nomenclatura()->ChacQuinta;
				case 'Frac': return QQN::Nomenclatura()->Frac;
				case 'Mza': return QQN::Nomenclatura()->Mza;
				case 'Parc': return QQN::Nomenclatura()->Parc;
				case 'InscripcionDominio': return QQN::Nomenclatura()->InscripcionDominio;
				case 'TitularRegPropiedad': return QQN::Nomenclatura()->TitularRegPropiedad;
				case 'Partido': return QQN::Nomenclatura()->Partido;
				case 'DatoVerificadoRegPropiedad': return QQN::Nomenclatura()->DatoVerificadoRegPropiedad;
				case 'EstadoGeografico': return QQN::Nomenclatura()->EstadoGeografico;
				default: throw new QCallerException('Simple Property not found in NomenclaturaDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        NomenclaturaDataGrid::$strColumnsArray[$strColumnName] = false;
        NomenclaturaDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::Nomenclatura()->$strColumnName, $mixValue);
    }


}
?>