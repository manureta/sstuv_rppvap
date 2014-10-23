<?php
class QQReverseReferenceNodeEquipamiento extends QQReverseReferenceNode {
		protected $strTableName = 'equipamiento';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Equipamiento';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeCondicionesSocioUrbanisticas('id_folio', 'IdFolioObject', 'integer', $this);
				case 'UnidadSanitaria':
					return new QQNode('unidad_sanitaria', 'UnidadSanitaria', 'integer', $this);
				case 'UnidadSanitariaObject':
					return new QQNodeOpcionesEquipamientos('unidad_sanitaria', 'UnidadSanitariaObject', 'integer', $this);
				case 'JardinInfantes':
					return new QQNode('jardin_infantes', 'JardinInfantes', 'integer', $this);
				case 'JardinInfantesObject':
					return new QQNodeOpcionesEquipamientos('jardin_infantes', 'JardinInfantesObject', 'integer', $this);
				case 'EscuelaPrimaria':
					return new QQNode('escuela_primaria', 'EscuelaPrimaria', 'integer', $this);
				case 'EscuelaPrimariaObject':
					return new QQNodeOpcionesEquipamientos('escuela_primaria', 'EscuelaPrimariaObject', 'integer', $this);
				case 'EscuelaSecundaria':
					return new QQNode('escuela_secundaria', 'EscuelaSecundaria', 'integer', $this);
				case 'EscuelaSecundariaObject':
					return new QQNodeOpcionesEquipamientos('escuela_secundaria', 'EscuelaSecundariaObject', 'integer', $this);
				case 'Comedor':
					return new QQNode('comedor', 'Comedor', 'integer', $this);
				case 'ComedorObject':
					return new QQNodeOpcionesEquipamientos('comedor', 'ComedorObject', 'integer', $this);
				case 'SalonUsosMultiples':
					return new QQNode('salon_usos_multiples', 'SalonUsosMultiples', 'integer', $this);
				case 'SalonUsosMultiplesObject':
					return new QQNodeOpcionesEquipamientos('salon_usos_multiples', 'SalonUsosMultiplesObject', 'integer', $this);
				case 'CentroIntegracionComunitaria':
					return new QQNode('centro_integracion_comunitaria', 'CentroIntegracionComunitaria', 'integer', $this);
				case 'CentroIntegracionComunitariaObject':
					return new QQNodeOpcionesEquipamientos('centro_integracion_comunitaria', 'CentroIntegracionComunitariaObject', 'integer', $this);
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