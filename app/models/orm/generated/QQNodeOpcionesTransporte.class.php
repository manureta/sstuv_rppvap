<?php
class QQNodeOpcionesTransporte extends QQNode {
		protected $strTableName = 'opciones_transporte';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OpcionesTransporte';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Opcion':
					return new QQNode('opcion', 'Opcion', 'string', $this);
				case 'TransporteAsColectivos':
					return new QQReverseReferenceNodeTransporte($this, 'transporteascolectivos', 'reverse_reference', 'colectivos');
				case 'TransporteAsFerrocarril':
					return new QQReverseReferenceNodeTransporte($this, 'transporteasferrocarril', 'reverse_reference', 'ferrocarril');
				case 'TransporteAsRemisCombis':
					return new QQReverseReferenceNodeTransporte($this, 'transporteasremiscombis', 'reverse_reference', 'remis_combis');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>