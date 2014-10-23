<?php
class QQNodeTipoBarrio extends QQNode {
		protected $strTableName = 'tipo_barrio';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TipoBarrio';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'Folio':
					return new QQReverseReferenceNodeFolio($this, 'folio', 'reverse_reference', 'tipo_barrio');

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