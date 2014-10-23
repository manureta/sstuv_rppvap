<?php
	/**
	 * Controlador Índice.
	 * Contiene un datagrid para el listado de DatosCapitulos
	 * y un panel meta-control para la edición.
	 *
	 * @package Padrón establecimientos
	 * @subpackage Controladores-Generado
	 * @author Codegen
	 *
	 */
	class DatosCapituloListPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar DatosCapitulos
		public $dtgDatosCapitulos;


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
			$this->dtgDatosCapitulo_Create();


			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/datoscapitulo/DatosCapituloListPanel.tpl.php';

		}


		/**
		 *
		 * Crea un datagrid para listar DatosCapitulo
		 *
		 * @return <DatosCapituloDataGrid>
		 *
		 */
		protected function dtgDatosCapitulo_Create() {
			return $this->dtgDatosCapitulos = new DatosCapituloDataGrid($this);
		}

                /**
		 *
		 * Crea un panel para editar DatosCapitulos
		 *
		 * @return <QPanel>
		 */
		protected function pnlEditDatosCapitulo_Create() {
			QApplication::Redirect("/". datoscapitulo. "/edit/");

		}
	}
?>