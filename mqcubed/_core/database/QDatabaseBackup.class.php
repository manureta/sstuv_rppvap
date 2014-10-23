<?php

abstract class QDatabaseBackup extends QDatabaseBase{
    
    /**
     * Abstract method to do the backup
     * @abstract
     * @access public
     */
    abstract public function Backup();
    
    public function GetFieldsForTable($strTableName) {
    }
    public function TransactionCommit() {
    }
    public function GetForeignKeysForTable($strTableName) {
    }
    public function InsertId($strTableName = null, $strColumnName = null) {
    }
    public function Connect() {
    }
    public function Close() {
    }
    public function NonQuery($strNonQuery) {
    }
    public function SqlSortByVariable($strSortByInfo) {
    }
    public function Query($strQuery) {
    }
    public function GetIndexesForTable($strTableName) {
    }
    public function TransactionBegin() {
    }
    public function TransactionRollBack() {
    }
    public function GetTables() {
    }
    public function SqlLimitVariablePrefix($strLimitInfo) {
    }
    public function SqlLimitVariableSuffix($strLimitInfo) {
    }
}
?>
