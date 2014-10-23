<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MockQPostgresDataBaseclass
 *
 * @author jose
 */
 require_once('QPostgreSqlDatabase.class.php');
class QMockPostgreSqlDatabase extends QPostgreSqlDatabase {
                /**
                 * Fake InsertId returns 999 for every inserted row for every table.
                 * @param string $strTableName
                 * @param string $strColumnName
                 * @return integer
                 */
		public function InsertId($strTableName = null, $strColumnName = null) {
			return 999;
		}

		public function Query($strQuery, $blnForceUpdate=false) {



			$objCache = new QCache('qquery/tests', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
                                // Connect if Applicable
                                if (!$this->blnConnectedFlag) $this->Connect();
                                // Log Query (for Profiling, if applicable)
                                $this->LogQuery($strQuery);
                                // Perform the Query
                                $objResult = pg_query($this->objPgSql, $strQuery);
                                if (!$objResult)
                                        throw new QPostgreSqlDatabaseException(pg_last_error(), 0, $strQuery);
                                $this->objMostRecentResult = $objResult;
                                $objPgSqlDatabaseResult = new QMockPostgreSqlDatabaseResult($objResult, $this);
                                $objCache->SaveData(serialize($objPgSqlDatabaseResult));
			} else {
				$objPgSqlDatabaseResult = unserialize($cacheData);
			}

                        // Return the Result
			return $objPgSqlDatabaseResult;

		}


                /**
                 * Fake Ok insert and Ok Update
                 * @param string $strNonQuery
                 */
                public function NonQuery($strNonQuery) {

		}

                /**
                 * fake Fail on insert or update for spected Exceptions.
                 *
                 * @param string $strNonQuery
                 */
                public function NonQueryFail($strNonQuery){
        		throw new QPostgreSqlDatabaseException(pg_last_error(), 0, $strNonQuery);
                }

                public function TransactionRollBack() {
                }
    }

class QMockPostgreSqlDatabaseResult extends QDatabaseResultBase {
		const COUNT = 3;

                protected $objPgSqlResult;
		protected $objDb;

                protected $arrayResult;
                private $index;

		public function __construct($objResult, QPostgreSqlDatabase $objDb) {
			$this->objPgSqlResult = $objResult;
			$this->objDb = $objDb;
                        $this->arrayResult = pg_fetch_all($this->objPgSqlResult);
                        $this->index = 0;
		}

		public function FetchArray() {
			return $this->FetchRow();
		}

		public function FetchFields() {
			return null;  // Not implemented
		}

		public function FetchField() {
			return null;  // Not implemented
		}

		public function FetchRow() {
                        if($this->index==$this->CountRows())
                            return null;
			return $this->arrayResult[$this->index++];
		}

		public function CountRows() {
			return min(count($this->arrayResult),self::COUNT);

		}

		public function CountFields() {
			return count($this->arrayResult[$this->index]);
		}

		public function Close() {

		}

		public function GetNextRow() {
			$strColumnArray = $this->FetchArray();

			if ($strColumnArray)
				return new QPostgreSqlDatabaseRow($strColumnArray);
			else
				return null;
		}

		public function GetRows() {
			$objDbRowArray = array();
			while ($objDbRow = $this->GetNextRow())
				array_push($objDbRowArray, $objDbRow);
			return $objDbRowArray;
		}
	}

?>
