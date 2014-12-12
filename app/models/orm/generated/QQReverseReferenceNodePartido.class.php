<?php
class QQReverseReferenceNodePartido extends QQReverseReferenceNode {
		protected $strTableName = 'partido';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Partido';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'CodPartido':
					return new QQNode('cod_partido', 'CodPartido', 'string', $this);
				case 'FolioAsId':
					return new QQReverseReferenceNodeFolio($this, 'folioasid', 'reverse_reference', 'id_partido');
				case 'LocalidadAsId':
					return new QQReverseReferenceNodeLocalidad($this, 'localidadasid', 'reverse_reference', 'id_partido');

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