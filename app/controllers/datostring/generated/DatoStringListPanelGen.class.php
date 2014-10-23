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
	class DatoStringListPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar DatoStrings
		public $dtgDatoStrings;


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


			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/datostring/DatoStringListPanel.tpl.php';

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
			QApplication::Redirect("/". datostring. "/edit/");

		}
	}
?>