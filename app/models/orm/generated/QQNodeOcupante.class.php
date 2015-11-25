<?php
class QQNodeOcupante extends QQNode {
		protected $strTableName = 'ocupante';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Ocupante';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdHogar':
					return new QQNode('id_hogar', 'IdHogar', 'integer', $this);
				case 'IdHogarObject':
					return new QQNodeHogar('id_hogar', 'IdHogarObject', 'integer', $this);
				case 'Apellido':
					return new QQNode('apellido', 'Apellido', 'string', $this);
				case 'Nombres':
					return new QQNode('nombres', 'Nombres', 'string', $this);
				case 'FechaNacimiento':
					return new QQNode('fecha_nacimiento', 'FechaNacimiento', 'QDateTime', $this);
				case 'Edad':
					return new QQNode('edad', 'Edad', 'integer', $this);
				case 'EstadoCivil':
					return new QQNode('estado_civil', 'EstadoCivil', 'string', $this);
				case 'DeOConQuien':
					return new QQNode('de_o_con_quien', 'DeOConQuien', 'string', $this);
				case 'Ocupacion':
					return new QQNode('ocupacion', 'Ocupacion', 'string', $this);
				case 'Ingreso':
					return new QQNode('ingreso', 'Ingreso', 'string', $this);
				case 'TipoDoc':
					return new QQNode('tipo_doc', 'TipoDoc', 'string', $this);
				case 'Doc':
					return new QQNode('doc', 'Doc', 'integer', $this);
				case 'Nacionalidad':
					return new QQNode('nacionalidad', 'Nacionalidad', 'string', $this);
				case 'NyaMadre':
					return new QQNode('nya_madre', 'NyaMadre', 'string', $this);
				case 'NyaPadre':
					return new QQNode('nya_padre', 'NyaPadre', 'string', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'boolean', $this);

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