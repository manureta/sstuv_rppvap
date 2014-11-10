<?php
class QQReverseReferenceNodeOpcionesInfraestructura extends QQReverseReferenceNode {
		protected $strTableName = 'opciones_infraestructura';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OpcionesInfraestructura';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Opcion':
					return new QQNode('opcion', 'Opcion', 'string', $this);
				case 'InfraestructuraAsAguaCorriente':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasaguacorriente', 'reverse_reference', 'agua_corriente');
				case 'InfraestructuraAsAguaPotable':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasaguapotable', 'reverse_reference', 'agua_potable');
				case 'InfraestructuraAsAlumbradoPublico':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasalumbradopublico', 'reverse_reference', 'alumbrado_publico');
				case 'InfraestructuraAsCordonCuneta':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraascordoncuneta', 'reverse_reference', 'cordon_cuneta');
				case 'InfraestructuraAsDesaguesPluviales':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasdesaguespluviales', 'reverse_reference', 'desagues_pluviales');
				case 'InfraestructuraAsEnergiaElectricaMedidorColectivo':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasenergiaelectricamedidorcolectivo', 'reverse_reference', 'energia_electrica_medidor_colectivo');
				case 'InfraestructuraAsEnergiaElectricaMedidorIndividual':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasenergiaelectricamedidorindividual', 'reverse_reference', 'energia_electrica_medidor_individual');
				case 'InfraestructuraAsPavimento':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraaspavimento', 'reverse_reference', 'pavimento');
				case 'InfraestructuraAsRecoleccionResiduos':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasrecoleccionresiduos', 'reverse_reference', 'recoleccion_residuos');
				case 'InfraestructuraAsRedCloacal':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasredcloacal', 'reverse_reference', 'red_cloacal');
				case 'InfraestructuraAsRedGas':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraasredgas', 'reverse_reference', 'red_gas');
				case 'InfraestructuraAsSistAlternativoEliminacionExcretas':
					return new QQReverseReferenceNodeInfraestructura($this, 'infraestructuraassistalternativoeliminacionexcretas', 'reverse_reference', 'sist_alternativo_eliminacion_excretas');

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