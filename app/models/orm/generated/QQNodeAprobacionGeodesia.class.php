<?php
class QQNodeAprobacionGeodesia extends QQNode {
		protected $strTableName = 'aprobacion_geodesia';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AprobacionGeodesia';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CodPartido':
					return new QQNode('cod_partido', 'CodPartido', 'integer', $this);
				case 'Num':
					return new QQNode('num', 'Num', 'integer', $this);
				case 'Anio':
					return new QQNode('anio', 'Anio', 'string', $this);
				case 'RegularizacionAs':
					return new QQReverseReferenceNodeRegularizacion($this, 'regularizacionas', 'reverse_reference', '_aprobacion_geodesia');

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