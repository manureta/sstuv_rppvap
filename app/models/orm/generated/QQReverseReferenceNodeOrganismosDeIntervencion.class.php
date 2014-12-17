<?php
class QQReverseReferenceNodeOrganismosDeIntervencion extends QQReverseReferenceNode {
		protected $strTableName = 'organismos_de_intervencion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OrganismosDeIntervencion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeAntecedentes('id_folio', 'IdFolioObject', 'integer', $this);
				case 'Nacional':
					return new QQNode('nacional', 'Nacional', 'boolean', $this);
				case 'Provincial':
					return new QQNode('provincial', 'Provincial', 'boolean', $this);
				case 'Municipal':
					return new QQNode('municipal', 'Municipal', 'boolean', $this);
				case 'FechaIntervencion':
					return new QQNode('fecha_intervencion', 'FechaIntervencion', 'QDateTime', $this);
				case 'Programas':
					return new QQNode('programas', 'Programas', 'string', $this);

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