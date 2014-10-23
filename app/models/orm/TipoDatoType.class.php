<?php
	require(__DATAGEN_CLASSES__ . '/TipoDatoTypeGen.class.php');

	/**
	 * The TipoDatoType class defined here contains any
	 * customized code for the TipoDatoType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "tipo_dato_type" table in the database,
	 * and extends from the code generated abstract TipoDatoTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 */
	abstract class TipoDatoType extends TipoDatoTypeGen {
        public static function ToIndex($intCTipoDato) {
            $intIndex = 0;
            foreach (self::$NameArray as $intId => $strValue) {
                if ($intCTipoDato == $intId) {
                    return $intIndex;
                }
                $intIndex++;
            }
        }
	}
?>