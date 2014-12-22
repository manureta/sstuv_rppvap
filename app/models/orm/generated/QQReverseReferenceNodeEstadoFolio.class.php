<?php
class QQReverseReferenceNodeEstadoFolio extends QQReverseReferenceNode {
		protected $strTableName = 'estado_folio';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EstadoFolio';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'UsoInterno':
					return new QQReverseReferenceNodeUsoInterno($this, 'usointerno', 'reverse_reference', 'estado_folio');

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