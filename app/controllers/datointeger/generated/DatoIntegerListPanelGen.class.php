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
	class DatoIntegerListPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar DatoIntegeres
		public $dtgDatoIntegeres;


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


			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/datointeger/DatoIntegerListPanel.tpl.php';

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
			QApplication::Redirect("/". datointeger. "/edit/");

		}
	}
?>