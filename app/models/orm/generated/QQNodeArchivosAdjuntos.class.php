<?php
class QQNodeArchivosAdjuntos extends QQNode {
		protected $strTableName = 'archivos_adjuntos';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ArchivosAdjuntos';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'PathFile':
					return new QQNode('path_file', 'PathFile', 'string', $this);

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