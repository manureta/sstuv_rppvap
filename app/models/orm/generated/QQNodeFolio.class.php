<?php
class QQNodeFolio extends QQNode {
		protected $strTableName = 'folio';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Folio';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CodFolio':
					return new QQNode('cod_folio', 'CodFolio', 'string', $this);
				case 'IdPartido':
					return new QQNode('id_partido', 'IdPartido', 'integer', $this);
				case 'IdPartidoObject':
					return new QQNodePartido('id_partido', 'IdPartidoObject', 'integer', $this);
				case 'IdLocalidad':
					return new QQNode('id_localidad', 'IdLocalidad', 'integer', $this);
				case 'IdLocalidadObject':
					return new QQNodeLocalidad('id_localidad', 'IdLocalidadObject', 'integer', $this);
				case 'Matricula':
					return new QQNode('matricula', 'Matricula', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Encargado':
					return new QQNode('encargado', 'Encargado', 'string', $this);
				case 'NombreBarrioOficial':
					return new QQNode('nombre_barrio_oficial', 'NombreBarrioOficial', 'string', $this);
				case 'NombreBarrioAlternativo1':
					return new QQNode('nombre_barrio_alternativo_1', 'NombreBarrioAlternativo1', 'string', $this);
				case 'NombreBarrioAlternativo2':
					return new QQNode('nombre_barrio_alternativo_2', 'NombreBarrioAlternativo2', 'string', $this);
				case 'AnioOrigen':
					return new QQNode('anio_origen', 'AnioOrigen', 'string', $this);
				case 'Superficie':
					return new QQNode('superficie', 'Superficie', 'string', $this);
				case 'CantidadFamilias':
					return new QQNode('cantidad_familias', 'CantidadFamilias', 'integer', $this);
				case 'TipoBarrio':
					return new QQNode('tipo_barrio', 'TipoBarrio', 'integer', $this);
				case 'TipoBarrioObject':
					return new QQNodeTipoBarrio('tipo_barrio', 'TipoBarrioObject', 'integer', $this);
				case 'ObservacionCasoDudoso':
					return new QQNode('observacion_caso_dudoso', 'ObservacionCasoDudoso', 'string', $this);
				case 'Judicializado':
					return new QQNode('judicializado', 'Judicializado', 'integer', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'NumExpedientes':
					return new QQNode('num_expedientes', 'NumExpedientes', 'string', $this);
				case 'CondicionesSocioUrbanisticasAsId':
					return new QQReverseReferenceNodeCondicionesSocioUrbanisticas($this, 'condicionessociourbanisticasasid', 'reverse_reference', 'id_folio', 'CondicionesSocioUrbanisticasAsId');
				case 'NomenclaturaAsId':
					return new QQReverseReferenceNodeNomenclatura($this, 'nomenclaturaasid', 'reverse_reference', 'id_folio');
				case 'RegularizacionAsId':
					return new QQReverseReferenceNodeRegularizacion($this, 'regularizacionasid', 'reverse_reference', 'id_folio', 'RegularizacionAsId');
				case 'UsoInterno':
					return new QQReverseReferenceNodeUsoInterno($this, 'usointerno', 'reverse_reference', 'id_folio', 'UsoInterno');

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