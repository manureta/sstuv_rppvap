<?php
class QQReverseReferenceNodeUsoInterno extends QQReverseReferenceNode {
		protected $strTableName = 'uso_interno';
		protected $strPrimaryKey = 'id_folio';
		protected $strClassName = 'UsoInterno';
		public function __get($strName) {
			switch ($strName) {
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'InformeUrbanistico':
					return new QQNode('informe_urbanistico', 'InformeUrbanistico', 'string', $this);
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
				case 'RegularizacionCircular10Catastro':
					return new QQNode('regularizacion_circular_10_catastro', 'RegularizacionCircular10Catastro', 'boolean', $this);
				case 'RegularizacionAprobacionGeodesia':
					return new QQNode('regularizacion_aprobacion_geodesia', 'RegularizacionAprobacionGeodesia', 'integer', $this);
				case 'RegularizacionRegistracion':
					return new QQNode('regularizacion_registracion', 'RegularizacionRegistracion', 'integer', $this);
				case 'RegularizacionEstadoProceso':
					return new QQNode('regularizacion_estado_proceso', 'RegularizacionEstadoProceso', 'integer', $this);
				case 'RegularizacionEstadoProcesoObject':
					return new QQNodeEstadoProceso('regularizacion_estado_proceso', 'RegularizacionEstadoProcesoObject', 'integer', $this);
				case 'NumExpediente':
					return new QQNode('num_expediente', 'NumExpediente', 'string', $this);
				case 'RegistracionLegajo':
					return new QQNode('registracion_legajo', 'RegistracionLegajo', 'string', $this);
				case 'RegistracionFecha':
					return new QQNode('registracion_fecha', 'RegistracionFecha', 'string', $this);
				case 'RegistracionFolio':
					return new QQNode('registracion_folio', 'RegistracionFolio', 'string', $this);
				case 'GeodesiaNum':
					return new QQNode('geodesia_num', 'GeodesiaNum', 'string', $this);
				case 'GeodesiaAnio':
					return new QQNode('geodesia_anio', 'GeodesiaAnio', 'string', $this);
				case 'FechaCenso':
					return new QQNode('fecha_censo', 'FechaCenso', 'string', $this);
				case 'GeodesiaPartido':
					return new QQNode('geodesia_partido', 'GeodesiaPartido', 'string', $this);
				case 'EstadoFolio':
					return new QQNode('estado_folio', 'EstadoFolio', 'integer', $this);
				case 'EstadoFolioObject':
					return new QQNodeEstadoFolio('estado_folio', 'EstadoFolioObject', 'integer', $this);
				case 'RegularizacionTienePlano':
					return new QQNode('regularizacion_tiene_plano', 'RegularizacionTienePlano', 'string', $this);
				case 'TieneCenso':
					return new QQNode('tiene_censo', 'TieneCenso', 'string', $this);
				case 'Ley14449':
					return new QQNode('ley_14449', 'Ley14449', 'string', $this);
				case 'FechaInformeUrbanistico':
					return new QQNode('fecha_informe_urbanistico', 'FechaInformeUrbanistico', 'QDateTime', $this);

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