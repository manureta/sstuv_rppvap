<?php
class QQReverseReferenceNodeSituacionAmbiental extends QQReverseReferenceNode {
		protected $strTableName = 'situacion_ambiental';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SituacionAmbiental';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeCondicionesSocioUrbanisticas('id_folio', 'IdFolioObject', 'integer', $this);
				case 'SinProblemas':
					return new QQNode('sin_problemas', 'SinProblemas', 'boolean', $this);
				case 'ReservaElectroducto':
					return new QQNode('reserva_electroducto', 'ReservaElectroducto', 'boolean', $this);
				case 'Inundable':
					return new QQNode('inundable', 'Inundable', 'boolean', $this);
				case 'SobreTerraplenFerroviario':
					return new QQNode('sobre_terraplen_ferroviario', 'SobreTerraplenFerroviario', 'boolean', $this);
				case 'SobreCaminoSirga':
					return new QQNode('sobre_camino_sirga', 'SobreCaminoSirga', 'boolean', $this);
				case 'ExpuestoContaminacionIndustrial':
					return new QQNode('expuesto_contaminacion_industrial', 'ExpuestoContaminacionIndustrial', 'boolean', $this);
				case 'SobreSueloDegradado':
					return new QQNode('sobre_suelo_degradado', 'SobreSueloDegradado', 'boolean', $this);
				case 'Otro':
					return new QQNode('otro', 'Otro', 'string', $this);

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