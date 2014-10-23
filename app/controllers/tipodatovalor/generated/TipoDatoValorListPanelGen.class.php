<?php
	/**
	 * Controlador Índice.
	 * Contiene un datagrid para el listado de TipoDatoValores
	 * y un panel meta-control para la edición.
	 *
	 * @package Padrón establecimientos
	 * @subpackage Controladores-Generado
	 * @author Codegen
	 *
	 */
	class TipoDatoValorListPanelGen extends QPanel {

		// Instancia local de un Meta DataGrid para listar TipoDatoValores
		public $dtgTipoDatoValores;


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
			$this->dtgTipoDatoValor_Create();


			// Seteo la vista
			$this->Template = __VIEW_DIR__.'/tipodatovalor/TipoDatoValorListPanel.tpl.php';

		}


		/**
		 *
		 * Crea un datagrid para listar TipoDatoValor
		 *
		 * @return <TipoDatoValorDataGrid>
		 *
		 */
		protected function dtgTipoDatoValor_Create() {
			return $this->dtgTipoDatoValores = new TipoDatoValorDataGrid($this);
		}

                /**
		 *
		 * Crea un panel para editar TipoDatoValores
		 *
		 * @return <QPanel>
		 */
		protected function pnlEditTipoDatoValor_Create() {
			QApplication::Redirect("/". tipodatovalor. "/edit/");

		}
	}
?>