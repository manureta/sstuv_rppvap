<?php
class QQReverseReferenceNodeRegistracion extends QQReverseReferenceNode {
		protected $strTableName = 'registracion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Registracion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeRegularizacion('id_folio', 'IdFolioObject', 'integer', $this);
				case 'Legajo':
					return new QQNode('legajo', 'Legajo', 'string', $this);
				case 'Folio':
					return new QQNode('folio', 'Folio', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);

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