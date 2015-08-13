<?php
class QQNodeLocalidad extends QQNode {
		protected $strTableName = 'localidad';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Localidad';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'IdPartido':
					return new QQNode('id_partido', 'IdPartido', 'integer', $this);
				case 'IdPartidoObject':
					return new QQNodePartido('id_partido', 'IdPartidoObject', 'integer', $this);

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