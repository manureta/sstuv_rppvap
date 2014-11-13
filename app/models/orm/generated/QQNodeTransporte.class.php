<?php
class QQNodeTransporte extends QQNode {
		protected $strTableName = 'transporte';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Transporte';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeCondicionesSocioUrbanisticas('id_folio', 'IdFolioObject', 'integer', $this);
				case 'Colectivos':
					return new QQNode('colectivos', 'Colectivos', 'integer', $this);
				case 'ColectivosObject':
					return new QQNodeOpcionesTransporte('colectivos', 'ColectivosObject', 'integer', $this);
				case 'Ferrocarril':
					return new QQNode('ferrocarril', 'Ferrocarril', 'integer', $this);
				case 'FerrocarrilObject':
					return new QQNodeOpcionesTransporte('ferrocarril', 'FerrocarrilObject', 'integer', $this);
				case 'RemisCombis':
					return new QQNode('remis_combis', 'RemisCombis', 'integer', $this);
				case 'RemisCombisObject':
					return new QQNodeOpcionesTransporte('remis_combis', 'RemisCombisObject', 'integer', $this);

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