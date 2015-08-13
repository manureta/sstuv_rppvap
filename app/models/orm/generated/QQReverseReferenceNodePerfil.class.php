<?php
class QQReverseReferenceNodePerfil extends QQReverseReferenceNode {
		protected $strTableName = 'perfil';
		protected $strPrimaryKey = 'id_perfil';
		protected $strClassName = 'Perfil';
		public function __get($strName) {
			switch ($strName) {
				case 'IdPerfil':
					return new QQNode('id_perfil', 'IdPerfil', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'UsuarioAsId':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioasid', 'reverse_reference', 'id_perfil');

				case '_PrimaryKeyNode':
					return new QQNode('id_perfil', 'IdPerfil', 'integer', $this);
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