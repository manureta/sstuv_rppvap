<?php
	require(__DATAGEN_CLASSES__ . '/CriterioCompletitudTypeGen.class.php');

	/**
	 * The CriterioCompletitudType class defined here contains any
	 * customized code for the CriterioCompletitudType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "criterio_completitud_type" table in the database,
	 * and extends from the code generated abstract CriterioCompletitudTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage DataObjects
	 */
	abstract class CriterioCompletitudType extends CriterioCompletitudTypeGen {
		const Algundato = 1;
	}
?>
