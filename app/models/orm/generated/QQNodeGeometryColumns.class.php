<?php
class QQNodeGeometryColumns extends QQNode {
		protected $strTableName = 'geometry_columns';
		protected $strPrimaryKey = 'f_table_catalog';
		protected $strClassName = 'GeometryColumns';
		public function __get($strName) {
			switch ($strName) {
				case 'FTableCatalog':
					return new QQNode('f_table_catalog', 'FTableCatalog', 'string', $this);
				case 'FTableSchema':
					return new QQNode('f_table_schema', 'FTableSchema', 'string', $this);
				case 'FTableName':
					return new QQNode('f_table_name', 'FTableName', 'string', $this);
				case 'FGeometryColumn':
					return new QQNode('f_geometry_column', 'FGeometryColumn', 'string', $this);
				case 'CoordDimension':
					return new QQNode('coord_dimension', 'CoordDimension', 'integer', $this);
				case 'Srid':
					return new QQNode('srid', 'Srid', 'integer', $this);
				case 'Type':
					return new QQNode('type', 'Type', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('f_table_catalog', 'FTableCatalog', 'string', $this);
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