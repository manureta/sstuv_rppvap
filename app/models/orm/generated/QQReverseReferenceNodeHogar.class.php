<?php
class QQReverseReferenceNodeHogar extends QQReverseReferenceNode {
		protected $strTableName = 'hogar';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Hogar';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'FechaAlta':
					return new QQNode('fecha_alta', 'FechaAlta', 'QDateTime', $this);
				case 'Circ':
					return new QQNode('circ', 'Circ', 'string', $this);
				case 'Secc':
					return new QQNode('secc', 'Secc', 'string', $this);
				case 'Mz':
					return new QQNode('mz', 'Mz', 'string', $this);
				case 'Pc':
					return new QQNode('pc', 'Pc', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'DeclaracionNoOcupacion':
					return new QQNode('declaracion_no_ocupacion', 'DeclaracionNoOcupacion', 'boolean', $this);
				case 'TipoDocAdj':
					return new QQNode('tipo_doc_adj', 'TipoDocAdj', 'string', $this);
				case 'DocTerreno':
					return new QQNode('doc_terreno', 'DocTerreno', 'string', $this);
				case 'TipoBeneficio':
					return new QQNode('tipo_beneficio', 'TipoBeneficio', 'string', $this);
				case 'FormaOcupacion':
					return new QQNode('forma_ocupacion', 'FormaOcupacion', 'string', $this);
				case 'FechaIngreso':
					return new QQNode('fecha_ingreso', 'FechaIngreso', 'string', $this);
				case 'OcupanteAsId':
					return new QQReverseReferenceNodeOcupante($this, 'ocupanteasid', 'reverse_reference', 'id_hogar');

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