<?php
	/**
	 * Este es un panel índice que hereda de DatoIndexPanel
	 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
	 * 
	 * @package Padrón establecimientos
	 * @subpackage Controladores
	 * 
	 */
	class DatoIndexPanel extends DatoIndexPanelGen {	
		/**
		 * Constructor del panel índice
		 * 
		 * @param <Panel> $objParentObject
		 * @param <string> $strSetEditPanelMethod
		 * @param <string> $strCloseEditPanelMethod
		 * @param <string> $strControlId
		 *
		 */	
		public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod , $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
		}
			
		//
		// Métodos a sobreescribir
		// 
		 
		/**
		 *
		 * Crea un botón para crear un nuevo Dato
		 * 
		 * @return <QCreateButton>
		 * 
		 */		
//		protected function btnCreateNew_Create() {		
//			$this->btnCreateNew = new QCreateButton($this,'Dato');
//			return $this->btnCreateNew;			
//		}
		
		/**
		 *
		 * Crea un datagrid para listar Dato
		 * 
		 * @return <DatoDataGrid>
		 * 
		 */
//		protected function dtgDato_Create() {
//			parent::dtgDato_Create();
//		}
		
		/**
		 *
		 * Especifica la acción al hacer "click" para el botón btnCreateNew
		 *
		 * @param <string> $strFormId
		 * @param <string> $strControlId
		 * @param <string> $strParameter
		 *
		 */ 
//		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
//			$this->pnlEditDato = new DatoEditPanel($this);
//          $this->pnlEditDato->Visible=true;
//          $this->btnCreateNew->Enabled=false;
//          $this->Refresh();
//		}
		
	}
?>