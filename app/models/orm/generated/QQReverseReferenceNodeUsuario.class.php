<?php
class QQReverseReferenceNodeUsuario extends QQReverseReferenceNode {
		protected $strTableName = 'usuario';
		protected $strPrimaryKey = 'id_usuario';
		protected $strClassName = 'Usuario';
		public function __get($strName) {
			switch ($strName) {
				case 'IdUsuario':
					return new QQNode('id_usuario', 'IdUsuario', 'integer', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'SuperAdmin':
					return new QQNode('super_admin', 'SuperAdmin', 'boolean', $this);
				case 'FechaActivacion':
					return new QQNode('fecha_activacion', 'FechaActivacion', 'QDateTime', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'IdPerfil':
					return new QQNode('id_perfil', 'IdPerfil', 'integer', $this);
				case 'IdPerfilObject':
					return new QQNodePerfil('id_perfil', 'IdPerfilObject', 'integer', $this);
				case 'CodPartido':
					return new QQNode('cod_partido', 'CodPartido', 'string', $this);
				case 'NombreCompleto':
					return new QQNode('nombre_completo', 'NombreCompleto', 'string', $this);
				case 'Reparticion':
					return new QQNode('reparticion', 'Reparticion', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'FolioAsCreador':
					return new QQReverseReferenceNodeFolio($this, 'folioascreador', 'reverse_reference', 'creador');

				case '_PrimaryKeyNode':
					return new QQNode('id_usuario', 'IdUsuario', 'integer', $this);
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