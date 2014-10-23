<?php
	/**
	 * Controlador Índice.
	 * Contiene un datagrid para el listado de DatoStrings
	 * y un panel meta-control para la edición.
	 *
	 * @package Padrón establecimientos
	 * @subpackage Controladores-Generado
	 * @author Codegen	 
	 *
	 */
	class DatoStringIndexPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar DatoStrings
		public $dtgDatoStrings;

		// Controles
		public $btnCreateNew;

		// Paneles
		public $pnlEditDatoString;

		/**
		 * Constructor del panel índice generado
		 * 
		 * @param <Panel> $objParentObject
		 * @param <string> $strSetEditPanelMethod
		 * @param <string> $strCloseEditPanelMethod
		 * @param <string> $strControlId
		 *
		 */
		public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {

			// Llamada al padre
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			//Creo el datagrid
			$this->dtgDatoString_Create();
			
			//Botón de creación
			$this->btnCreateNew_Create();

			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/datostring/DatoStringIndexPanel.tpl.php';
		
		}
		
		/**
		 *
		 * Crea un botón para crear un nuevo DatoString
		 * 
		 * @return <QCreateButton>
		 * 
		 */ 
		protected function btnCreateNew_Create() {		
			$this->btnCreateNew = new QCreateButton($this,'DatoString');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
			
			return $this->btnCreateNew;			
		}
		
		/**
		 *
		 * Crea un datagrid para listar DatoString
		 * 
		 * @return <DatoStringDataGrid>
		 * 
		 */
		protected function dtgDatoString_Create() {			
			return $this->dtgDatoStrings = new DatoStringDataGrid($this);				
		}
		
		/**
		 *
		 * Crea un panel para editar DatoStrings
		 *
		 * @return <QPanel>
		 */
		protected function pnlEditDatoString_Create() {
			$this->pnlEditDatoString = new QPanel($this,'pnlEditDatoString');
			$this->pnlEditDatoString->Visible=false;
			
			return $this->pnlEditDatoString;			
		}
		
		/**
		 *
		 * Especifica la acción al hacer "click" para el botón btnCreateNew
		 *
		 * @param <string> $strFormId
		 * @param <string> $strControlId
		 * @param <string> $strParameter
		 *
		 */ 
		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$this->pnlEditDatoString = new DatoStringEditPanel($this);
                        $this->pnlEditDatoString->Visible=true;
                        $this->btnCreateNew->Enabled=false;
                        $this->Refresh();
		}
	}
?>