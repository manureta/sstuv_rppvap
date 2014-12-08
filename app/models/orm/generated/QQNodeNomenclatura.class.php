<?php
class QQNodeNomenclatura extends QQNode {
		protected $strTableName = 'nomenclatura';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Nomenclatura';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'PartidaInmobiliaria':
					return new QQNode('partida_inmobiliaria', 'PartidaInmobiliaria', 'string', $this);
				case 'TitularDominio':
					return new QQNode('titular_dominio', 'TitularDominio', 'string', $this);
				case 'Circ':
					return new QQNode('circ', 'Circ', 'string', $this);
				case 'Secc':
					return new QQNode('secc', 'Secc', 'string', $this);
				case 'ChacQuinta':
					return new QQNode('chac_quinta', 'ChacQuinta', 'string', $this);
				case 'Frac':
					return new QQNode('frac', 'Frac', 'string', $this);
				case 'Mza':
					return new QQNode('mza', 'Mza', 'string', $this);
				case 'Parc':
					return new QQNode('parc', 'Parc', 'string', $this);
				case 'InscripcionDominio':
					return new QQNode('_inscripcion_dominio', 'InscripcionDominio', 'string', $this);
				case 'TitularRegPropiedad':
					return new QQNode('_titular_reg_propiedad', 'TitularRegPropiedad', 'string', $this);
				case 'Partido':
					return new QQNode('partido', 'Partido', 'string', $this);
				case 'DatoVerificadoRegPropiedad':
					return new QQNode('_dato_verificado_reg_propiedad', 'DatoVerificadoRegPropiedad', 'boolean', $this);
				case 'EstadoGeografico':
					return new QQNode('estado_geografico', 'EstadoGeografico', 'string', $this);

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