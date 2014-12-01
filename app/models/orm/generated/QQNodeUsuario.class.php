<?php
class QQNodeUsuario extends QQNode {
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
				case 'RespuestaA':
					return new QQNode('respuesta_a', 'RespuestaA', 'string', $this);
				case 'RespuestaB':
					return new QQNode('respuesta_b', 'RespuestaB', 'string', $this);
				case 'PreguntaSecretaA':
					return new QQNode('pregunta_secreta_a', 'PreguntaSecretaA', 'string', $this);
				case 'PreguntaSecretaB':
					return new QQNode('pregunta_secreta_b', 'PreguntaSecretaB', 'string', $this);
				case 'CodPartido':
					return new QQNode('cod_partido', 'CodPartido', 'string', $this);

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