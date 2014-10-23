<?php

require(__DATAGEN_CLASSES__ . '/DefinicionCeldaGen.class.php');

/**
 * The DefinicionCelda class defined here contains any
 * customized code for the DefinicionCelda class in the
 * Object Relational Model.  It represents the "definicion_celda" table 
 * in the database, and extends from the code generated abstract DefinicionCeldaGen
 * class, which contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 * 
 * @package Relevamiento Anual
 * @subpackage DataObjects
 * 
 */
class DefinicionCelda extends DefinicionCeldaGen {

    /**
     * Default "to string" handler
     * Allows pages to _p()/echo()/print() this object, and to define the default
     * way this object would be outputted.
     *
     * Can also be called directly via $objDefinicionCelda->__toString().
     *
     * @return string a nicely formatted string representation of this object
     */
    public function __toString() {
        return sprintf('DefinicionCelda Object %s', $this->intIdDefinicionCelda);
    }

    // This adds the created by and creation date before saving a new user
    public function Save($blnForceInsert = false, $blnForceUpdate = false) {
        throw new QCallerException('Las DefinicionCelda no deberían guardarse a través del framework');
        if ((!$this->__blnRestored) || ($blnForceInsert)) {
            //$this->Createdby = QApplication::$objUser->IdUserbackend;
            //$this->Datecreated = new QDateTime(QDateTime::Now);
        } else {
            //$this->Modifiedby = QApplication::$objUser->IdUserbackend;
        }
        parent::Save($blnForceInsert, $blnForceUpdate);
    }

    public static function LoadSingleBySample($intIdDefinicionFila, $intIdDefinicionColumna, $objOptionalClauses = null) {
        // This will return an array of DatosCelda objects
        return DefinicionCelda::QueryArray(
                QQ::AndCondition(
                        QQ::Equal(QQN::DatosCelda()->Param1, $strParam1),
                        QQ::GreaterThan(QQN::DatosCelda()->Param2, $intParam2)
                ),
                $objOptionalClauses
        );
    }

    public static function LoadSingleByIdDefinicionColumnaIdDefinicionFila($intIdDefinicionColumna, $intIdDefinicionFila, $objOptionalClauses = null) {
        // Call DefinicionCelda::QueryArray to perform the LoadArrayByIdDefinicionColumna query
        try {
            return DefinicionCelda::QuerySingle(
                    QQ::AndCondition(QQ::Equal(QQN::DefinicionCelda()->IdDefinicionColumna, $intIdDefinicionColumna),
                            QQ::Equal(QQN::DefinicionCelda()->IdDefinicionFila, $intIdDefinicionFila)),
                    $objOptionalClauses);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    public static function LoadSingleByIdColumnaIdFilaIdCuadro($intIdDefinicionColumna, $intIdDefinicionFila, $intIdDefinicionCuadro, $objOptionalClauses = null) {
        // Call DefinicionCelda::QueryArray to perform the LoadArrayByIdDefinicionColumna query
        try {
            return DefinicionCelda::QuerySingle(
                    QQ::AndCondition(
                            QQ::Equal(QQN::DefinicionCelda()->IdDefinicionColumna, $intIdDefinicionColumna),
                            QQ::Equal(QQN::DefinicionCelda()->IdDefinicionFila, $intIdDefinicionFila),
                            QQ::Equal(QQN::DefinicionCelda()->IdDefinicionCuadro, $intIdDefinicionCuadro)
                            ),
                    $objOptionalClauses);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    public static function LoadArrayByIdDefinicionCuadroDisabled($intIdDefinicionCuadro, $blnDisabled, $objOptionalClauses = null) {
      if (is_null($objOptionalClauses)) {
        $objOptionalClauses = QQ::OrderBy(QQN::DefinicionCelda()->IdDefinicionCelda);
      } elseif (is_array($objOptionalClauses)) {
        array_push($objOptionalClauses, QQ::OrderBy(QQN::DefinicionCelda()->IdDefinicionCelda));
      }
      try {
        return DefinicionCelda::QueryArray(
          QQ::AndCondition(
              QQ::Equal(QQN::DefinicionCelda()->IdDefinicionCuadro, $intIdDefinicionCuadro),
              QQ::Equal(QQN::DefinicionCelda()->Disabled, $blnDisabled)
              ),
          $objOptionalClauses);
      } catch (QCallerException $objExc) {
        $objExc->IncrementOffset();
        throw $objExc;
      }
    }


// Override or Create New Load/Count methods
    // (For obvious reasons, these methods are commented out...
    // but feel free to use these as a starting point)
    /*
      public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
      // This will return an array of DefinicionCelda objects
      return DefinicionCelda::QueryArray(
      QQ::AndCondition(
      QQ::Equal(QQN::DefinicionCelda()->Param1, $strParam1),
      QQ::GreaterThan(QQN::DefinicionCelda()->Param2, $intParam2)
      ),
      $objOptionalClauses
      );
      }

      public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
      // This will return a single DefinicionCelda object
      return DefinicionCelda::QuerySingle(
      QQ::AndCondition(
      QQ::Equal(QQN::DefinicionCelda()->Param1, $strParam1),
      QQ::GreaterThan(QQN::DefinicionCelda()->Param2, $intParam2)
      ),
      $objOptionalClauses
      );
      }

      public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
      // This will return a count of DefinicionCelda objects
      return DefinicionCelda::QueryCount(
      QQ::AndCondition(
      QQ::Equal(QQN::DefinicionCelda()->Param1, $strParam1),
      QQ::Equal(QQN::DefinicionCelda()->Param2, $intParam2)
      ),
      $objOptionalClauses
      );
      }

      public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
      // Performing the load manually (instead of using Qcodo Query)

      // Get the Database Object for this Class
      $objDatabase = DefinicionCelda::GetDatabase();

      // Properly Escape All Input Parameters using Database->SqlVariable()
      $strParam1 = $objDatabase->SqlVariable($strParam1);
      $intParam2 = $objDatabase->SqlVariable($intParam2);

      // Setup the SQL Query
      $strQuery = sprintf('
      SELECT
      "definicion_celda".*
      FROM
      "definicion_celda" AS "definicion_celda"
      WHERE
      param_1 = %s AND
      param_2 < %s',
      $strParam1, $intParam2);

      // Perform the Query and Instantiate the Result
      $objDbResult = $objDatabase->Query($strQuery);
      return DefinicionCelda::InstantiateDbResult($objDbResult);
      }
     */




    // Override or Create New Properties and Variables
    // For performance reasons, these variables and __set and __get override methods
    // are commented out.  But if you wish to implement or override any
    // of the data generated properties, please feel free to uncomment them.
    /*
      protected $strSomeNewProperty;

      public function __get($strName) {
      switch ($strName) {
      case 'SomeNewProperty': return $this->strSomeNewProperty;

      default:
      try {
      return parent::__get($strName);
      } catch (QCallerException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
      }
      }
      }

      public function __set($strName, $mixValue) {
      switch ($strName) {
      case 'SomeNewProperty':
      try {
      return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
      } catch (QInvalidCastException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
      }

      default:
      try {
      return (parent::__set($strName, $mixValue));
      } catch (QCallerException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
      }
      }
      }
     */
}
?>
