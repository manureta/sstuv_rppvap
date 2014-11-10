<?php
class QQNodeUsoInterno extends QQNode {
		protected $strTableName = 'uso_interno';
		protected $strPrimaryKey = 'id_folio';
		protected $strClassName = 'UsoInterno';
		public function __get($strName) {
			switch ($strName) {
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'InformeUrbanisticoFecha':
					return new QQNode('informe_urbanistico_fecha', 'InformeUrbanisticoFecha', 'string', $this);
				case 'MapeoPreliminar':
					return new QQNode('mapeo_preliminar', 'MapeoPreliminar', 'boolean', $this);
				case 'NoCorrespondeInscripcion':
					return new QQNode('no_corresponde_inscripcion', 'NoCorrespondeInscripcion', 'boolean', $this);
				case 'ResolucionInscripcionProvisoria':
					return new QQNode('resolucion_inscripcion_provisoria', 'ResolucionInscripcionProvisoria', 'string', $this);
				case 'ResolucionInscripcionDefinitiva':
					return new QQNode('resolucion_inscripcion_definitiva', 'ResolucionInscripcionDefinitiva', 'string', $this);
				case 'RegularizacionFechaInicio':
					return new QQNode('regularizacion_fecha_inicio', 'RegularizacionFechaInicio', 'QDateTime', $this);
				case 'RegularizacionTienePlano':
					return new QQNode('regularizacion_tiene_plano', 'RegularizacionTienePlano', 'boolean', $this);
				case 'RegularizacionCircular10Catastro':
					return new QQNode('regularizacion_circular_10_catastro', 'RegularizacionCircular10Catastro', 'boolean', $this);
				case 'RegularizacionAprobacionGeodesia':
					return new QQNode('regularizacion_aprobacion_geodesia', 'RegularizacionAprobacionGeodesia', 'integer', $this);
				case 'RegularizacionRegistracion':
					return new QQNode('regularizacion_registracion', 'RegularizacionRegistracion', 'integer', $this);
				case 'RegularizacionEstadoProceso':
					return new QQNode('regularizacion_estado_proceso', 'RegularizacionEstadoProceso', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeFolio('id_folio', 'IdFolio', 'integer', $this);
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