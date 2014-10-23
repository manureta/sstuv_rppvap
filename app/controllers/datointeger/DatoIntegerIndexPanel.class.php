<?php
	/**
	 * Este es un panel índice que hereda de DatoIntegerIndexPanel
	 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
	 * 
	 * @package Padrón establecimientos
	 * @subpackage Controladores
	 * 
	 */
	class DatoIntegerIndexPanel extends DatoIntegerIndexPanelGen {	
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
		 * Crea un botón para crear un nuevo DatoInteger
		 * 
		 * @return <QCreateButton>
		 * 
		 */		
//		protected function btnCreateNew_Create() {		
//			$this->btnCreateNew = new QCreateButton($this,'DatoInteger');
//			return $this->btnCreateNew;			
//		}
		
		/**
		 *
		 * Crea un datagrid para listar DatoInteger
		 * 
		 * @return <DatoIntegerDataGrid>
		 * 
		 */
//		protected function dtgDatoInteger_Create() {
//			parent::dtgDatoInteger_Create();
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
//			$this->pnlEditDatoInteger = new DatoIntegerEditPanel($this);
//          $this->pnlEditDatoInteger->Visible=true;
//          $this->btnCreateNew->Enabled=false;
//          $this->Refresh();
//		}
		
	}
?>