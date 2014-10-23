<?php

/**
 * PDO Generic database driver
 * @abstract
 * @author Marcos Sanchez [marcosdsanchez at thinkclear dot com dot ar]
 * @package DatabaseAdapters
 */
abstract class QPdoDatabase extends QDatabaseBase {
    const Adapter = 'Generic PDO Adapter (Abstract)';

    /**
     * @var PDO connection handler
     * @access protected
     */
    protected $objPdo;

    /**
     * @var PDOStatement most recent query result
     * @access protected
     */
    protected $objMostRecentResult;

    public function PrepareStatement($strQuery, $mixParameterArray = null) {
        if (!$this->blnConnectedFlag)
            $this->Connect();
        $objPrepareStatement = $this->objPdo->prepare($strQuery);
        return $objPrepareStatement;
    }

    public function NonQuery($strNonQuery, $objPreparedStatement = null, $mixParameterArray = null) {
        // Connect if Applicable
        if (!$this->blnConnectedFlag)
            $this->Connect();

        // Log Query (for Profiling, if applicable)
        $this->LogQuery($strNonQuery);

        // Perform the Query
        if (!$objPreparedStatement)
            $objResult = $this->objPdo->exec($strNonQuery);
        else
        if ($mixParameterArray)
            $objResult = $objPreparedStatement->execute($mixParameterArray);
        else
            $objResult = $objPreparedStatement->execute();
        if ($objResult === false) {
            $arrPdoError = $this->objPdo->errorInfo();
            throw new QPdoDatabaseException($arrPdoError[2], $this->objPdo->errorCode(), $strNonQuery);
        }
        $this->objMostRecentResult = $objResult;
    }

    public function __get($strName) {
        switch ($strName) {
            case 'AffectedRows':
                return $this->objMostRecentResult->rowCount();
            case 'PDO':
                return $this->objPdo;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function Close() {
        $this->objPdo = null;
    }

    protected function LogQuery($strQuery) {
        if ($this->blnEnableProfiling) {
            // Dereference-ize Backtrace Information
            $objDebugBacktrace = debug_backtrace();

            // Get Rid of Unnecessary Backtrace Info
            $intLength = count($objDebugBacktrace);
            for ($intIndex = 0; $intIndex < $intLength; $intIndex++) {
                if (($intIndex < 2) || ($intIndex > 3))
                    $objDebugBacktrace[$intIndex] = 'BackTrace ' . $intIndex;
                else {
                    if (array_key_exists('args', $objDebugBacktrace[$intIndex])) {
                        $intInnerLength = count($objDebugBacktrace[$intIndex]['args']);
                        for ($intInnerIndex = 0; $intInnerIndex < $intInnerLength; $intInnerIndex++)
                            if (($objDebugBacktrace[$intIndex]['args'][$intInnerIndex] instanceof QQClause) ||
                                    ($objDebugBacktrace[$intIndex]['args'][$intInnerIndex] instanceof QQCondition))
                                $objDebugBacktrace[$intIndex]['args'][$intInnerIndex] = sprintf("[%s]", $objDebugBacktrace[$intIndex]['args'][$intInnerIndex]->__toString());
                            else if (is_null($objDebugBacktrace[$intIndex]['args'][$intInnerIndex]))
                                $objDebugBacktrace[$intIndex]['args'][$intInnerIndex] = 'null';
                            else if (gettype($objDebugBacktrace[$intIndex]['args'][$intInnerIndex]) == 'integer')
                                $objDebugBacktrace[$intIndex]['args'][$intInnerIndex] = $objDebugBacktrace[$intIndex]['args'][$intInnerIndex];
                            else if (gettype($objDebugBacktrace[$intIndex]['args'][$intInnerIndex]) == 'object')
                                $objDebugBacktrace[$intIndex]['args'][$intInnerIndex] = 'Object';
                            else
                                $objDebugBacktrace[$intIndex]['args'][$intInnerIndex] = sprintf("'%s'", QVarDumper::dump ($objDebugBacktrace[$intIndex]['args'][$intInnerIndex],2));
                    }
                }
            }

            // Push it onto the profiling information array
            array_push($this->strProfileArray, $objDebugBacktrace);
            array_push($this->strProfileArray, $strQuery);
        }
    }

    public function TransactionBegin() {
        $this->objPdo->beginTransaction();
    }

    public function TransactionCommit() {
        $this->objPdo->commit();
    }

    public function TransactionRollBack() {
        $this->objPdo->rollback();
    }

}

/**
 * QPdoDatabaseResult
 *
 * @abstract
 */
abstract class QPdoDatabaseResult extends QDatabaseResultBase {

    /**
     * @var PDOStatement Query result
     * @access protected
     */
    protected $objPdoResult;

    /**
     * @var PDO Connection object
     * @access protected
     */
    protected $objPdo;

    public function __construct($objResult, QPdoDatabase $objDb) {
        $this->objPdoResult = $objResult;
        $this->objPdo = $objDb;
    }

    public function FetchAll() {
        return $this->objPdoResult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FetchArray() {
        return $this->objPdoResult->fetch();
    }

    public function FetchRow() {
        return $this->objPdoResult->fetch(PDO::FETCH_NUM);
    }

    public function CountRows() {
        return $this->objPdoResult->rowCount();
    }

    public function CountFields() {
        return $this->objPdoResult->columnCount();
    }

    public function Close() {
        $this->objPdoResult = null;
    }

    public function GetRows() {
        $objDbRowArray = array();
        while ($objDbRow = $this->GetNextRow())
            array_push($objDbRowArray, $objDbRow);
        return $objDbRowArray;
    }

}

/**
 * PdoDatabaseException
 * 
 * @abstract
 */
class QPdoDatabaseException extends QDatabaseExceptionBase {

    public function __construct($strMessage, $intNumber, $strQuery) {
        parent::__construct($strMessage, 2);
        $this->intErrorNumber = $intNumber;
        $this->strQuery = $strQuery;
    }

}

?>
