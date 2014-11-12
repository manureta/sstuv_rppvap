<?php
class QQNodeCondicionesSocioUrbanisticas extends QQNode {
		protected $strTableName = 'condiciones_socio_urbanisticas';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CondicionesSocioUrbanisticas';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'EspacioLibreComun':
					return new QQNode('espacio_libre_comun', 'EspacioLibreComun', 'boolean', $this);
				case 'PresenciaOrgSociales':
					return new QQNode('presencia_org_sociales', 'PresenciaOrgSociales', 'string', $this);
				case 'NombreRefernte':
					return new QQNode('nombre_refernte', 'NombreRefernte', 'string', $this);
				case 'TelefonoReferente':
					return new QQNode('telefono_referente', 'TelefonoReferente', 'string', $this);
				case 'EquipamientoAsIdFolio':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoasidfolio', 'reverse_reference', 'id_folio');
				case 'InfraestructuraAsIdFolio':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasidfolio', 'reverse_reference', 'id_folio');
				case 'SituacionAmbientalAsIdFolio':
					return new QQReverseReferenceNodeSituacionAmbiental($this, 'situacionambientalasidfolio', 'reverse_reference', 'id_folio');
				case 'TransporteAsIdFolio':
					return new QQReverseReferenceNodeTransporte($this, 'transporteasidfolio', 'reverse_reference', 'id_folio');

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