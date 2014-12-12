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
				case 'AntecedentesAsIdFolio':
					return new QQReverseReferenceNodeAntecedentes($this, 'antecedentesasidfolio', 'reverse_reference', 'id_folio', 'AntecedentesAsIdFolio');
				case 'EncuadreLegalAsIdFolio':
					return new QQReverseReferenceNodeEncuadreLegal($this, 'encuadrelegalasidfolio', 'reverse_reference', 'id_folio');

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