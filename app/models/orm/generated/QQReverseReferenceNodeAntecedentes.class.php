<?php
class QQReverseReferenceNodeAntecedentes extends QQReverseReferenceNode {
		protected $strTableName = 'antecedentes';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Antecedentes';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeRegularizacion('id_folio', 'IdFolioObject', 'integer', $this);
				case 'SinIntervencion':
					return new QQNode('sin_intervencion', 'SinIntervencion', 'boolean', $this);
				case 'ObrasInfraestructura':
					return new QQNode('obras_infraestructura', 'ObrasInfraestructura', 'boolean', $this);
				case 'Equipamientos':
					return new QQNode('equipamientos', 'Equipamientos', 'boolean', $this);
				case 'IntervencionesEnViviendas':
					return new QQNode('intervenciones_en_viviendas', 'IntervencionesEnViviendas', 'boolean', $this);
				case 'Otros':
					return new QQNode('otros', 'Otros', 'string', $this);
				case 'OrganismosDeIntervencionAsIdFolio':
					return new QQReverseReferenceNodeOrganismosDeIntervencion($this, 'organismosdeintervencionasidfolio', 'reverse_reference', 'id_folio');

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