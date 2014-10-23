<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StresstestIndexPanel
 *
 * @author hernol
 */
class StresstestBatchPanel extends StresstestIndexPanel {

    public $strMsg = '';
    public $intInserts = 1000;
    public $objControlArray = array();
    public $btnDale;
    public $lblInfo;
    public $blnTransaction;
    public $blnNonquery;
    
    public function btnDale_Click($a,$b,$c) {
        $intTimeInit = time();
        $this->strMsg = "Time init $intTimeInit<br>";
        $this->strMsg .= "Insertando $this->intInserts batch en 'dato'...<br>";
        $values = array();
        $query = 'INSERT INTO dato (id_campo,id_personal,id_designacion,valor,fecha_modificacion) VALUES ';
        $now = date('Y-m-d H:i:s');
        foreach ($this->objControlArray as $i => $objControl) {
            switch (true) {
                case $objControl instanceof QListBox:
                    $val = $objControl->SelectedValue;
                    break;
                case $objControl instanceof QCheckBox:
                    $val = $objControl->Text;
                    break;
                case $objControl instanceof QTextBox:
                    $val = $objControl->Text;
                    break;
            }
            $values[] = "(1,1,1,'$val',TIMESTAMP '$now')";
        }
        $query .= implode(",\n", $values);
        $db = QApplication::$Database[1];
        try {
            if ($this->blnTransaction) {
                $db->TransactionBegin();
            }
            if ($this->blnNonquery) {
                $db->NonQuery($query);
            } else {
                $db->Query($query);
            }
            if ($this->blnTransaction) {
                $db->TransactionCommit();
            }
        } catch (Exception $e) {
            if ($this->blnTransaction) {
                $db->TransactionRollback();
            }
            throw $e; //jo jooooo jo
        }
        $intTimeEnd = time();
        $this->strMsg .= "Time end $intTimeEnd<br>";
        $this->strMsg .= "Total ". ($intTimeEnd - $intTimeInit) ."<br>";
        $this->lblInfo->Text = $this->strMsg;
        $this->lblInfo->Refresh();
        $this->Refresh();
    }

}

?>
