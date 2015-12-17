<?php
class QQNodeConflictoHabitacional extends QQNode {
		protected $strTableName = 'conflicto_habitacional';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ConflictoHabitacional';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'IntervinoArea':
					return new QQNode('intervino_area', 'IntervinoArea', 'boolean', $this);
				case 'FueroInterviniente':
					return new QQNode('fuero_interviniente', 'FueroInterviniente', 'string', $this);
				case 'JuzgadoInterviniente':
					return new QQNode('juzgado_interviniente', 'JuzgadoInterviniente', 'string', $this);
				case 'CaratulaExpediente':
					return new QQNode('caratula_expediente', 'CaratulaExpediente', 'string', $this);
				case 'MinisterioDesarrollo':
					return new QQNode('ministerio_desarrollo', 'MinisterioDesarrollo', 'boolean', $this);
				case 'MinisterioDesarrolloReferente':
					return new QQNode('ministerio_desarrollo_referente', 'MinisterioDesarrolloReferente', 'string', $this);
				case 'DefensorPueblo':
					return new QQNode('defensor_pueblo', 'DefensorPueblo', 'boolean', $this);
				case 'DefensorPuebloReferente':
					return new QQNode('defensor_pueblo_referente', 'DefensorPuebloReferente', 'string', $this);
				case 'SecretariaNacional':
					return new QQNode('secretaria_nacional', 'SecretariaNacional', 'boolean', $this);
				case 'SecretariaNacionalReferente':
					return new QQNode('secretaria_nacional_referente', 'SecretariaNacionalReferente', 'string', $this);
				case 'Municipalidad':
					return new QQNode('municipalidad', 'Municipalidad', 'boolean', $this);
				case 'MunicipalidadReferente':
					return new QQNode('municipalidad_referente', 'MunicipalidadReferente', 'string', $this);
				case 'OrganizacionBarrial':
					return new QQNode('organizacion_barrial', 'OrganizacionBarrial', 'boolean', $this);
				case 'OrganizacionBarrialReferente':
					return new QQNode('organizacion_barrial_referente', 'OrganizacionBarrialReferente', 'string', $this);
				case 'OtrosOrganismos':
					return new QQNode('otros_organismos', 'OtrosOrganismos', 'string', $this);
				case 'OrdenDesalojo':
					return new QQNode('orden_desalojo', 'OrdenDesalojo', 'boolean', $this);
				case 'FechaEjecucion':
					return new QQNode('fecha_ejecucion', 'FechaEjecucion', 'string', $this);
				case 'SuspensionHecho':
					return new QQNode('suspension_hecho', 'SuspensionHecho', 'boolean', $this);
				case 'SolicitudSuspension':
					return new QQNode('solicitud_suspension', 'SolicitudSuspension', 'boolean', $this);
				case 'FechaSuspension':
					return new QQNode('fecha_suspension', 'FechaSuspension', 'string', $this);
				case 'DuracionSuspension':
					return new QQNode('duracion_suspension', 'DuracionSuspension', 'string', $this);
				case 'MesaGestion':
					return new QQNode('mesa_gestion', 'MesaGestion', 'boolean', $this);
				case 'Observaciones':
					return new QQNode('observaciones', 'Observaciones', 'string', $this);

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