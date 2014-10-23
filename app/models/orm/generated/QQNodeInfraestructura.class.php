<?php
class QQNodeInfraestructura extends QQNode {
		protected $strTableName = 'infraestructura';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Infraestructura';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdFolio':
					return new QQNode('id_folio', 'IdFolio', 'integer', $this);
				case 'IdFolioObject':
					return new QQNodeCondicionesSocioUrbanisticas('id_folio', 'IdFolioObject', 'integer', $this);
				case 'EnergiaElectricaMedidorIndividual':
					return new QQNode('energia_electrica_medidor_individual', 'EnergiaElectricaMedidorIndividual', 'integer', $this);
				case 'EnergiaElectricaMedidorIndividualObject':
					return new QQNodeOpcionesInfraestructura('energia_electrica_medidor_individual', 'EnergiaElectricaMedidorIndividualObject', 'integer', $this);
				case 'EnergiaElectricaMedidorColectivo':
					return new QQNode('energia_electrica_medidor_colectivo', 'EnergiaElectricaMedidorColectivo', 'integer', $this);
				case 'EnergiaElectricaMedidorColectivoObject':
					return new QQNodeOpcionesInfraestructura('energia_electrica_medidor_colectivo', 'EnergiaElectricaMedidorColectivoObject', 'integer', $this);
				case 'AlumbradoPublico':
					return new QQNode('alumbrado_publico', 'AlumbradoPublico', 'integer', $this);
				case 'AlumbradoPublicoObject':
					return new QQNodeOpcionesInfraestructura('alumbrado_publico', 'AlumbradoPublicoObject', 'integer', $this);
				case 'AguaCorriente':
					return new QQNode('agua_corriente', 'AguaCorriente', 'integer', $this);
				case 'AguaCorrienteObject':
					return new QQNodeOpcionesInfraestructura('agua_corriente', 'AguaCorrienteObject', 'integer', $this);
				case 'AguaPotable':
					return new QQNode('agua_potable', 'AguaPotable', 'integer', $this);
				case 'AguaPotableObject':
					return new QQNodeOpcionesInfraestructura('agua_potable', 'AguaPotableObject', 'integer', $this);
				case 'RedCloacal':
					return new QQNode('red_cloacal', 'RedCloacal', 'integer', $this);
				case 'RedCloacalObject':
					return new QQNodeOpcionesInfraestructura('red_cloacal', 'RedCloacalObject', 'integer', $this);
				case 'SistAlternativoEliminacionExcretas':
					return new QQNode('sist_alternativo_eliminacion_excretas', 'SistAlternativoEliminacionExcretas', 'integer', $this);
				case 'SistAlternativoEliminacionExcretasObject':
					return new QQNodeOpcionesInfraestructura('sist_alternativo_eliminacion_excretas', 'SistAlternativoEliminacionExcretasObject', 'integer', $this);
				case 'RedGas':
					return new QQNode('red_gas', 'RedGas', 'integer', $this);
				case 'RedGasObject':
					return new QQNodeOpcionesInfraestructura('red_gas', 'RedGasObject', 'integer', $this);
				case 'Pavimento':
					return new QQNode('pavimento', 'Pavimento', 'integer', $this);
				case 'PavimentoObject':
					return new QQNodeOpcionesInfraestructura('pavimento', 'PavimentoObject', 'integer', $this);
				case 'CordonCuneta':
					return new QQNode('cordon_cuneta', 'CordonCuneta', 'integer', $this);
				case 'CordonCunetaObject':
					return new QQNodeOpcionesInfraestructura('cordon_cuneta', 'CordonCunetaObject', 'integer', $this);
				case 'DesaguesPluviales':
					return new QQNode('desagues_pluviales', 'DesaguesPluviales', 'integer', $this);
				case 'DesaguesPluvialesObject':
					return new QQNodeOpcionesInfraestructura('desagues_pluviales', 'DesaguesPluvialesObject', 'integer', $this);
				case 'RecoleccionResiduos':
					return new QQNode('recoleccion_residuos', 'RecoleccionResiduos', 'integer', $this);
				case 'RecoleccionResiduosObject':
					return new QQNodeOpcionesInfraestructura('recoleccion_residuos', 'RecoleccionResiduosObject', 'integer', $this);

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