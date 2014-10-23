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
	class DatoListPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar Datos
		public $dtgDatos;


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


			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/dato/DatoListPanel.tpl.php';

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
			QApplication::Redirect("/". dato. "/edit/");

		}
	}
?>