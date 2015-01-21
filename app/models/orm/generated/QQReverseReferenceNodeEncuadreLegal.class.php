<?php
class QQReverseReferenceNodeEncuadreLegal extends QQReverseReferenceNode {
		protected $strTableName = 'encuadre_legal';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EncuadreLegal';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeRegularizacion('id_folio', 'IdFolioObject', 'integer', $this);
				case 'Decreto222595':
					return new QQNode('decreto_2225_95', 'Decreto222595', 'boolean', $this);
				case 'Ley24374':
					return new QQNode('ley_24374', 'Ley24374', 'boolean', $this);
				case 'Decreto81588':
					return new QQNode('decreto_815_88', 'Decreto81588', 'boolean', $this);
				case 'Ley23073':
					return new QQNode('ley_23073', 'Ley23073', 'boolean', $this);
				case 'Decreto468696':
					return new QQNode('decreto_4686_96', 'Decreto468696', 'boolean', $this);
				case 'Expropiacion':
					return new QQNode('expropiacion', 'Expropiacion', 'string', $this);
				case 'Ley14449':
					return new QQNode('ley_14449', 'Ley14449', 'boolean', $this);
				case 'TieneExpropiacion':
					return new QQNode('tiene_expropiacion', 'TieneExpropiacion', 'boolean', $this);
				case 'Otros':
					return new QQNode('otros', 'Otros', 'string', $this);

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