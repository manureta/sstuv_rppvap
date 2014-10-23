<?php
	require(__DATAGEN_CLASSES__ . '/CodigoValorGen.class.php');

	/**
	 * The CodigoValor class defined here contains any
	 * customized code for the CodigoValor class in the
	 * Object Relational Model.  It represents the "codigo_valor" table 
	 * in the database, and extends from the code generated abstract CodigoValorGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage DataObjects
	 * 
	 */
	class CodigoValor extends CodigoValorGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCodigoValor->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
                        if($this->strCodigo != '')
                            return sprintf('%s - %s', $this->strCodigo, $this->strDescripcion);
                        return sprintf('%s',  $this->strDescripcion);
		}

                public static function GetCodigoRelacional($intIdCodigoValor) {
                    if(!$intIdCodigoValor) return '-2';
                    $objCodigoValor =  CodigoValor::Load($intIdCodigoValor);
                    if(!$objCodigoValor) {
                        throw new QCallerException(sprintf("El intIdCodigoValor pasado no existe %s", $intIdCodigoValor));
                    }
                    return $objCodigoValor->CodigoRelacional;
                }
                
                public static function GetCodigoValor($intTipoDatoType,$intCodigoRelacional, $intIdDefinicionCuadro,$intIdDefinicionColumna){
                    LogHelper::Debug(__FUNCTION__." ($intTipoDatoType,$intCodigoRelacional,$intIdDefinicionCuadro,$intIdDefinicionColumna)");
                    $objDefCuadroDefColumnaCodvalorArray = DefCuadroDefColumnaCodvalor::LoadArrayByIdDefinicionColumnaIdDefinicionCuadro($intIdDefinicionColumna, $intIdDefinicionCuadro);
                    foreach ($objDefCuadroDefColumnaCodvalorArray as $objDefCuadroDefColumnaCodvalor) {
                        if($objDefCuadroDefColumnaCodvalor->IdCodigoValorObject->CodigoRelacional == $intCodigoRelacional)
                                return $objDefCuadroDefColumnaCodvalor->IdCodigoValorObject->IdCodigoValor;
                    }
                    $objCodigoValor =  CodigoValor::QuerySingle(
                                QQ::AndCondition(
                                    QQ::Equal(QQN::CodigoValor()->CTipoDato, $intTipoDatoType),
                                    QQ::Equal(QQN::CodigoValor()->CodigoRelacional, $intCodigoRelacional)
                                )
                            );
                    if($objCodigoValor){
                        LogHelper::Debug("Devuelve $objCodigoValor");
                        return $objCodigoValor->IdCodigoValor;
                    }
                    LogHelper::Log("no hay valor para el tipo de datos $intTipoDatoType y el codigo relacional $intCodigoRelacional en la columna $intIdDefinicionColumna");
                    return "";
                }
                public static function GetCodigoValorByCodigo($strCodigo, $arrPosiblesValores){
                    foreach($arrPosiblesValores as $intKey){
                        $objCodigoValor = self::Load($intKey);
                        if($objCodigoValor->Codigo == $strCodigo)
                            return $objCodigoValor->IdCodigoValor;
                    }
                    throw new QCallerException("No se encontro valor para el codigo ". $strCodigo);
                }   
	}
?>
