<?php
class QQNodeElemento extends QQNode {
		protected $strTableName = 'elemento';
		protected $strPrimaryKey = 'id_elemento';
		protected $strClassName = 'Elemento';
		public function __get($strName) {
			switch ($strName) {
				case 'IdElemento':
					return new QQNode('id_elemento', 'IdElemento', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'IdPerfil':
					return new QQNode('id_perfil', 'IdPerfil', 'integer', $this);
				case 'IdPerfilObject':
					return new QQNodePerfil('id_perfil', 'IdPerfilObject', 'integer', $this);
				case 'Undato':
					return new QQNode('undato', 'Undato', 'string', $this);
				case 'Otrodato':
					return new QQNode('otrodato', 'Otrodato', 'string', $this);
				case 'ElementoHijoAsId':
					return new QQReverseReferenceNodeElementoHijo($this, 'elementohijoasid', 'reverse_reference', 'id_elemento');

				case '_PrimaryKeyNode':
					return new QQNode('id_elemento', 'IdElemento', 'integer', $this);
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