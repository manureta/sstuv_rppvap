<?php
class QQReverseReferenceNodeAprobacionGeodesia extends QQReverseReferenceNode {
		protected $strTableName = 'aprobacion_geodesia';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AprobacionGeodesia';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdPartido':
					return new QQNode('id_partido', 'IdPartido', 'integer', $this);
				case 'IdPartidoObject':
					return new QQNodePartido('id_partido', 'IdPartidoObject', 'integer', $this);
				case 'Num':
					return new QQNode('num', 'Num', 'integer', $this);
				case 'Anio':
					return new QQNode('anio', 'Anio', 'string', $this);
				case 'UsoInternoAsRegularizacion':
					return new QQReverseReferenceNodeUsoInterno($this, 'usointernoasregularizacion', 'reverse_reference', 'regularizacion_aprobacion_geodesia');

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