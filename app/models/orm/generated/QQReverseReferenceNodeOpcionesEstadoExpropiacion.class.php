<?php
class QQReverseReferenceNodeOpcionesEstadoExpropiacion extends QQReverseReferenceNode {
		protected $strTableName = 'opciones_estado_expropiacion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OpcionesEstadoExpropiacion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'EncuadreLegalAsEstadoProcesoExpropiacion':
					return new QQReverseReferenceNodeEncuadreLegal($this, 'encuadrelegalasestadoprocesoexpropiacion', 'reverse_reference', 'estado_proceso_expropiacion');

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