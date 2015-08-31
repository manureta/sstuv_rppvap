<?php
class QQReverseReferenceNodeFolio extends QQReverseReferenceNode {
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
				case 'Matricula':
					return new QQNode('matricula', 'Matricula', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'NombreBarrioOficial':
					return new QQNode('nombre_barrio_oficial', 'NombreBarrioOficial', 'string', $this);
				case 'NombreBarrioAlternativo1':
					return new QQNode('nombre_barrio_alternativo_1', 'NombreBarrioAlternativo1', 'string', $this);
				case 'NombreBarrioAlternativo2':
					return new QQNode('nombre_barrio_alternativo_2', 'NombreBarrioAlternativo2', 'string', $this);
				case 'AnioOrigen':
					return new QQNode('anio_origen', 'AnioOrigen', 'string', $this);
				case 'CantidadFamilias':
					return new QQNode('cantidad_familias', 'CantidadFamilias', 'integer', $this);
				case 'TipoBarrio':
					return new QQNode('tipo_barrio', 'TipoBarrio', 'integer', $this);
				case 'TipoBarrioObject':
					return new QQNodeTipoBarrio('tipo_barrio', 'TipoBarrioObject', 'integer', $this);
				case 'ObservacionCasoDudoso':
					return new QQNode('observacion_caso_dudoso', 'ObservacionCasoDudoso', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'Geom':
					return new QQNode('geom', 'Geom', 'string', $this);
				case 'Judicializado':
					return new QQNode('judicializado', 'Judicializado', 'string', $this);
				case 'Localidad':
					return new QQNode('localidad', 'Localidad', 'string', $this);
				case 'Creador':
					return new QQNode('creador', 'Creador', 'integer', $this);
				case 'CreadorObject':
					return new QQNodeUsuario('creador', 'CreadorObject', 'integer', $this);
				case 'Superficie':
					return new QQNode('superficie', 'Superficie', 'double', $this);
				case 'Encargado':
					return new QQNode('encargado', 'Encargado', 'string', $this);
				case 'Reparticion':
					return new QQNode('reparticion', 'Reparticion', 'string', $this);
				case 'FolioOriginal':
					return new QQNode('folio_original', 'FolioOriginal', 'integer', $this);
				case 'CondicionesSocioUrbanisticasAsId':
					return new QQReverseReferenceNodeCondicionesSocioUrbanisticas($this, 'condicionessociourbanisticasasid', 'reverse_reference', 'id_folio', 'CondicionesSocioUrbanisticasAsId');
				case 'EvolucionFolioAsId':
					return new QQReverseReferenceNodeEvolucionFolio($this, 'evolucionfolioasid', 'reverse_reference', 'id_folio');
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