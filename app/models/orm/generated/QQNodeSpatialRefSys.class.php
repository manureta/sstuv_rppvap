<?php
class QQNodeSpatialRefSys extends QQNode {
		protected $strTableName = 'spatial_ref_sys';
		protected $strPrimaryKey = 'srid';
		protected $strClassName = 'SpatialRefSys';
		public function __get($strName) {
			switch ($strName) {
				case 'Srid':
					return new QQNode('srid', 'Srid', 'integer', $this);
				case 'AuthName':
					return new QQNode('auth_name', 'AuthName', 'string', $this);
				case 'AuthSrid':
					return new QQNode('auth_srid', 'AuthSrid', 'integer', $this);
				case 'Srtext':
					return new QQNode('srtext', 'Srtext', 'string', $this);
				case 'Proj4text':
					return new QQNode('proj4text', 'Proj4text', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('srid', 'Srid', 'integer', $this);
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