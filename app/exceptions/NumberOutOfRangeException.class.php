<?php
class NumberOutOfRangeException extends Exception{

        public function __construct($strColumnName, $strType = QType::Integer){
            parent::__construct(QApplication::Translate(ucfirst($strType).' out of range for column '.$strColumnName), 1);
        }

}
?>
