<?php
class QQNodeRegularizacion extends QQNode {
		protected $strTableName = 'regularizacion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Regularizacion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeFolio('id_folio', 'IdFolioObject', 'integer', $this);
				case 'ProcesoIniciado':
					return new QQNode('proceso_iniciado', 'ProcesoIniciado', 'boolean', $this);
				case 'FechaInicio':
					return new QQNode('_fecha_inicio', 'FechaInicio', 'QDateTime', $this);
				case 'TienePlano':
					return new QQNode('_tiene_plano', 'TienePlano', 'boolean', $this);
				case 'Circular10Catastro':
					return new QQNode('_circular_10_catastro', 'Circular10Catastro', 'boolean', $this);
				case 'AprobacionGeodesia':
					return new QQNode('_aprobacion_geodesia', 'AprobacionGeodesia', 'integer', $this);
				case 'AprobacionGeodesiaObject':
					return new QQNodeAprobacionGeodesia('_aprobacion_geodesia', 'AprobacionGeodesiaObject', 'integer', $this);
				case 'Registracion':
					return new QQNode('_registracion', 'Registracion', 'integer', $this);
				case 'EstadoProceso':
					return new QQNode('_estado_proceso', 'EstadoProceso', 'integer', $this);
				case 'EstadoProcesoObject':
					return new QQNodeEstadoProceso('_estado_proceso', 'EstadoProcesoObject', 'integer', $this);
				case 'AntecedentesAsIdFolio':
					return new QQReverseReferenceNodeAntecedentes($this, 'antecedentesasidfolio', 'reverse_reference', 'id_folio', 'AntecedentesAsIdFolio');
				case 'EncuadreLegalAsIdFolio':
					return new QQReverseReferenceNodeEncuadreLegal($this, 'encuadrelegalasidfolio', 'reverse_reference', 'id_folio');
				case 'RegistracionAsIdFolio':
					return new QQReverseReferenceNodeRegistracion($this, 'registracionasidfolio', 'reverse_reference', 'id_folio');

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