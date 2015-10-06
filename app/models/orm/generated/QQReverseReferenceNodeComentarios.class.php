<?php
class QQReverseReferenceNodeComentarios extends QQReverseReferenceNode {
		protected $strTableName = 'comentarios';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Comentarios';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'IdUsuario':
					return new QQNode('id_usuario', 'IdUsuario', 'integer', $this);
				case 'IdUsuarioObject':
					return new QQNodeUsuario('id_usuario', 'IdUsuarioObject', 'integer', $this);
				case 'FechaCreacion':
					return new QQNode('fecha_creacion', 'FechaCreacion', 'QDateTime', $this);
				case 'FechaModificacion':
					return new QQNode('fecha_modificacion', 'FechaModificacion', 'QDateTime', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'string', $this);

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