<?php
	class QQN {
		/**
		 * @return QQNodeAntecedentes
		 */
		static public function Antecedentes() {
			return new QQNodeAntecedentes('antecedentes', null, null);
		}
		/**
		 * @return QQNodeArchivosAdjuntos
		 */
		static public function ArchivosAdjuntos() {
			return new QQNodeArchivosAdjuntos('archivos_adjuntos', null, null);
		}
		/**
		 * @return QQNodeCondicionesSocioUrbanisticas
		 */
		static public function CondicionesSocioUrbanisticas() {
			return new QQNodeCondicionesSocioUrbanisticas('condiciones_socio_urbanisticas', null, null);
		}
		/**
		 * @return QQNodeEncuadreLegal
		 */
		static public function EncuadreLegal() {
			return new QQNodeEncuadreLegal('encuadre_legal', null, null);
		}
		/**
		 * @return QQNodeEquipamiento
		 */
		static public function Equipamiento() {
			return new QQNodeEquipamiento('equipamiento', null, null);
		}
		/**
		 * @return QQNodeEstadoProceso
		 */
		static public function EstadoProceso() {
			return new QQNodeEstadoProceso('estado_proceso', null, null);
		}
		/**
		 * @return QQNodeFolio
		 */
		static public function Folio() {
			return new QQNodeFolio('folio', null, null);
		}
		/**
		 * @return QQNodeGeometryColumns
		 */
		static public function GeometryColumns() {
			return new QQNodeGeometryColumns('geometry_columns', null, null);
		}
		/**
		 * @return QQNodeInfraestructura
		 */
		static public function Infraestructura() {
			return new QQNodeInfraestructura('infraestructura', null, null);
		}
		/**
		 * @return QQNodeLocalidad
		 */
		static public function Localidad() {
			return new QQNodeLocalidad('localidad', null, null);
		}
		/**
		 * @return QQNodeNomenclatura
		 */
		static public function Nomenclatura() {
			return new QQNodeNomenclatura('nomenclatura', null, null);
		}
		/**
		 * @return QQNodeOpcionesEquipamientos
		 */
		static public function OpcionesEquipamientos() {
			return new QQNodeOpcionesEquipamientos('opciones_equipamientos', null, null);
		}
		/**
		 * @return QQNodeOpcionesInfraestructura
		 */
		static public function OpcionesInfraestructura() {
			return new QQNodeOpcionesInfraestructura('opciones_infraestructura', null, null);
		}
		/**
		 * @return QQNodeOpcionesTransporte
		 */
		static public function OpcionesTransporte() {
			return new QQNodeOpcionesTransporte('opciones_transporte', null, null);
		}
		/**
		 * @return QQNodeOrganismosDeIntervencion
		 */
		static public function OrganismosDeIntervencion() {
			return new QQNodeOrganismosDeIntervencion('organismos_de_intervencion', null, null);
		}
		/**
		 * @return QQNodePartido
		 */
		static public function Partido() {
			return new QQNodePartido('partido', null, null);
		}
		/**
		 * @return QQNodePerfil
		 */
		static public function Perfil() {
			return new QQNodePerfil('perfil', null, null);
		}
		/**
		 * @return QQNodeRegularizacion
		 */
		static public function Regularizacion() {
			return new QQNodeRegularizacion('regularizacion', null, null);
		}
		/**
		 * @return QQNodeSituacionAmbiental
		 */
		static public function SituacionAmbiental() {
			return new QQNodeSituacionAmbiental('situacion_ambiental', null, null);
		}
		/**
		 * @return QQNodeSpatialRefSys
		 */
		static public function SpatialRefSys() {
			return new QQNodeSpatialRefSys('spatial_ref_sys', null, null);
		}
		/**
		 * @return QQNodeTipoBarrio
		 */
		static public function TipoBarrio() {
			return new QQNodeTipoBarrio('tipo_barrio', null, null);
		}
		/**
		 * @return QQNodeTransporte
		 */
		static public function Transporte() {
			return new QQNodeTransporte('transporte', null, null);
		}
		/**
		 * @return QQNodeUsoInterno
		 */
		static public function UsoInterno() {
			return new QQNodeUsoInterno('uso_interno', null, null);
		}
		/**
		 * @return QQNodeUsuario
		 */
		static public function Usuario() {
			return new QQNodeUsuario('usuario', null, null);
		}
	}
?>