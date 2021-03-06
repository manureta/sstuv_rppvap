<?php
class QQNodeOpcionesEquipamientos extends QQNode {
		protected $strTableName = 'opciones_equipamientos';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OpcionesEquipamientos';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Opcion':
					return new QQNode('opcion', 'Opcion', 'string', $this);
				case 'EquipamientoAsCentroIntegracionComunitaria':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoascentrointegracioncomunitaria', 'reverse_reference', 'centro_integracion_comunitaria');
				case 'EquipamientoAsComedor':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoascomedor', 'reverse_reference', 'comedor');
				case 'EquipamientoAsEscuelaPrimaria':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoasescuelaprimaria', 'reverse_reference', 'escuela_primaria');
				case 'EquipamientoAsEscuelaSecundaria':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoasescuelasecundaria', 'reverse_reference', 'escuela_secundaria');
				case 'EquipamientoAsJardinInfantes':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoasjardininfantes', 'reverse_reference', 'jardin_infantes');
				case 'EquipamientoAsUnidadSanitaria':
					return new QQReverseReferenceNodeEquipamiento($this, 'equipamientoasunidadsanitaria', 'reverse_reference', 'unidad_sanitaria');

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