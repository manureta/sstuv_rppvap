<?php
class QQReverseReferenceNodeCensoGrupoFamiliar extends QQReverseReferenceNode {
		protected $strTableName = 'censo_grupo_familiar';
		protected $strPrimaryKey = 'censo_grupo_familiar_id';
		protected $strClassName = 'CensoGrupoFamiliar';
		public function __get($strName) {
			switch ($strName) {
				case 'CensoGrupoFamiliarId':
					return new QQNode('censo_grupo_familiar_id', 'CensoGrupoFamiliarId', 'integer', $this);
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
				case 'TipoBeneficio':
					return new QQNode('tipo_beneficio', 'TipoBeneficio', 'string', $this);
				case 'CensoPersona':
					return new QQReverseReferenceNodeCensoPersona($this, 'censopersona', 'reverse_reference', 'censo_grupo_familiar_id');

				case '_PrimaryKeyNode':
					return new QQNode('censo_grupo_familiar_id', 'CensoGrupoFamiliarId', 'integer', $this);
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