<?php
class QQNodeEstadoProceso extends QQNode {
		protected $strTableName = 'estado_proceso';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EstadoProceso';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'RegularizacionAs':
					return new QQReverseReferenceNodeRegularizacion($this, 'regularizacionas', 'reverse_reference', '_estado_proceso');

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