<?php
class QQReverseReferenceNodeElementoHijo extends QQReverseReferenceNode {
		protected $strTableName = 'elemento_hijo';
		protected $strPrimaryKey = 'id_elemento_hijo';
		protected $strClassName = 'ElementoHijo';
		public function __get($strName) {
			switch ($strName) {
				case 'IdElementoHijo':
					return new QQNode('id_elemento_hijo', 'IdElementoHijo', 'integer', $this);
				case 'IdElemento':
					return new QQNode('id_elemento', 'IdElemento', 'integer', $this);
				case 'IdElementoObject':
					return new QQNodeElemento('id_elemento', 'IdElementoObject', 'integer', $this);
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

				case '_PrimaryKeyNode':
					return new QQNode('id_elemento_hijo', 'IdElementoHijo', 'integer', $this);
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