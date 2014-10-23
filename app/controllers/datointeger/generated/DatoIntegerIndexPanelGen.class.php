<?php
	/**
	 * Controlador Índice.
	 * Contiene un datagrid para el listado de DatoIntegeres
	 * y un panel meta-control para la edición.
	 *
	 * @package Padrón establecimientos
	 * @subpackage Controladores-Generado
	 * @author Codegen	 
	 *
	 */
	class DatoIntegerIndexPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar DatoIntegeres
		public $dtgDatoIntegeres;

		// Controles
		public $btnCreateNew;

		// Paneles
		public $pnlEditDatoInteger;

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
			$this->dtgDatoInteger_Create();
			
			//Botón de creación
			$this->btnCreateNew_Create();

			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/datointeger/DatoIntegerIndexPanel.tpl.php';
		
		}
		
		/**
		 *
		 * Crea un botón para crear un nuevo DatoInteger
		 * 
		 * @return <QCreateButton>
		 * 
		 */ 
		protected function btnCreateNew_Create() {		
			$this->btnCreateNew = new QCreateButton($this,'DatoInteger');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
			
			return $this->btnCreateNew;			
		}
		
		/**
		 *
		 * Crea un datagrid para listar DatoInteger
		 * 
		 * @return <DatoIntegerDataGrid>
		 * 
		 */
		protected function dtgDatoInteger_Create() {			
			return $this->dtgDatoIntegeres = new DatoIntegerDataGrid($this);				
		}
		
		/**
		 *
		 * Crea un panel para editar DatoIntegeres
		 *
		 * @return <QPanel>
		 */
		protected function pnlEditDatoInteger_Create() {
			$this->pnlEditDatoInteger = new QPanel($this,'pnlEditDatoInteger');
			$this->pnlEditDatoInteger->Visible=false;
			
			return $this->pnlEditDatoInteger;			
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
			$this->pnlEditDatoInteger = new DatoIntegerEditPanel($this);
                        $this->pnlEditDatoInteger->Visible=true;
                        $this->btnCreateNew->Enabled=false;
                        $this->Refresh();
		}
	}
?>