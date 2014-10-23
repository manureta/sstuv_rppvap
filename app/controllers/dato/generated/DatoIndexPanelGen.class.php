<?php
	/**
	 * Controlador Índice.
	 * Contiene un datagrid para el listado de Datos
	 * y un panel meta-control para la edición.
	 *
	 * @package Padrón establecimientos
	 * @subpackage Controladores-Generado
	 * @author Codegen	 
	 *
	 */
	class DatoIndexPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar Datos
		public $dtgDatos;

		// Controles
		public $btnCreateNew;

		// Paneles
		public $pnlEditDato;

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
			$this->dtgDato_Create();
			
			//Botón de creación
			$this->btnCreateNew_Create();

			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/dato/DatoIndexPanel.tpl.php';
		
		}
		
		/**
		 *
		 * Crea un botón para crear un nuevo Dato
		 * 
		 * @return <QCreateButton>
		 * 
		 */ 
		protected function btnCreateNew_Create() {		
			$this->btnCreateNew = new QCreateButton($this,'Dato');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
			
			return $this->btnCreateNew;			
		}
		
		/**
		 *
		 * Crea un datagrid para listar Dato
		 * 
		 * @return <DatoDataGrid>
		 * 
		 */
		protected function dtgDato_Create() {			
			return $this->dtgDatos = new DatoDataGrid($this);				
		}
		
		/**
		 *
		 * Crea un panel para editar Datos
		 *
		 * @return <QPanel>
		 */
		protected function pnlEditDato_Create() {
			$this->pnlEditDato = new QPanel($this,'pnlEditDato');
			$this->pnlEditDato->Visible=false;
			
			return $this->pnlEditDato;			
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
			$this->pnlEditDato = new DatoEditPanel($this);
                        $this->pnlEditDato->Visible=true;
                        $this->btnCreateNew->Enabled=false;
                        $this->Refresh();
		}
	}
?>