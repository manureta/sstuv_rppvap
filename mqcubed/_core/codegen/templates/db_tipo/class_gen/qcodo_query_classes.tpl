/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////
<% foreach ($objTable->ManyToManyReferenceArray as $objReference) {
	// for every ManyToMany Reference, we must generate a tpl template so the Generator can generate each QQNodeReference clases in separate files.
	$strOutput="<template OverwriteFlag='true' DocrootFlag='false' DirectorySuffix='' TargetDirectory='". __DATAGEN_CLASSES__ ."' TargetFileName='QQNode".$objTable->ClassName."".$objReference->ObjectDescription.".class.php'/>
	<?php
	class QQNode".$objTable->ClassName."".$objReference->ObjectDescription." extends QQAssociationNode {
		protected \$strType = 'association';
		protected \$strName = '".strtolower($objReference->ObjectDescription)."';
		protected \$strTableName = '".$objReference->Table."';
		protected \$strPrimaryKey = '".$objReference->Column."';
		protected \$strClassName = '".$objReference->VariableType."';
		public function __get(\$strName) {
			switch (\$strName) {	
				case '".$objReference->OppositePropertyName."':
					return new QQNode('".$objReference->OppositeColumn."', '".$objReference->OppositePropertyName."', '".$objReference->OppositeVariableType."', \$this);
                                case 'Orden':
					return new QQNode('orden', 'Orden', 'integer', \$this);
				case '".$objReference->VariableType."':
					return new QQNode".$objReference->VariableType."('".$objReference->OppositeColumn."', '".$objReference->OppositePropertyName."', '".$objReference->OppositeVariableType."', \$this);
				case '_ChildTableNode':
					return new QQNode".$objReference->VariableType."('".$objReference->OppositeColumn."', '".$objReference->OppositePropertyName."', '".$objReference->OppositeVariableType."', \$this);
				default:
					try {
						return parent::__get(\$strName);
					} catch (QCallerException \$objExc) {
						\$objExc->IncrementOffset();
						throw \$objExc;
					}
			}
		}
	}?>";
	//here we write the new files for the codegen.
	$objHandler = fopen(__CODEGEN_DIR__."/templates/db_orm/class_gen/__qnodereference".$objReference->ObjectDescription.".tpl", "w");
	fwrite($objHandler,$strOutput);
	fclose($objHandler);

 } %>