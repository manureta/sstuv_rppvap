<?php
	/**
	 * Este es un panel índice que hereda de DatoStringIndexPanel
	 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
	 * 
	 * @package Padrón establecimientos
	 * @subpackage Controladores
	 * 
	 */
	class DatoStringIndexPanel extends DatoStringIndexPanelGen {	
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
		 * Crea un botón para crear un nuevo DatoString
		 * 
		 * @return <QCreateButton>
		 * 
		 */		
//		protected function btnCreateNew_Create() {		
//			$this->btnCreateNew = new QCreateButton($this,'DatoString');
//			return $this->btnCreateNew;			
//		}
		
		/**
		 *
		 * Crea un datagrid para listar DatoString
		 * 
		 * @return <DatoStringDataGrid>
		 * 
		 */
//		protected function dtgDatoString_Create() {
//			parent::dtgDatoString_Create();
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
//			$this->pnlEditDatoString = new DatoStringEditPanel($this);
//          $this->pnlEditDatoString->Visible=true;
//          $this->btnCreateNew->Enabled=false;
//          $this->Refresh();
//		}
		
	}
?>