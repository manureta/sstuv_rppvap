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
class StresstestIndexPanel extends QPanel {

    public $strMsg = '';
    public $intInserts = 1000;
    public $objControlArray = array();
    public $btnDale;
    public $lblInfo;
    public $blnTransaction;
    public $blnNonquery;

    public function __construct($objParentObject, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Template = __VIEW_DIR__ . '/stresstest/StresstestIndexPanel.tpl.php';
        if (QApplication::QueryString('id') > 0) {
            $this->intInserts = QApplication::QueryString('id');
        }
        $this->blnTransaction = QApplication::QueryString('transaction') ? QApplication::QueryString('transaction') : false;
        $this->blnNonquery = QApplication::QueryString('nonquery') ? QApplication::QueryString('nonquery') : false;
        $intEach = ceil($this->intInserts / 3);
        for ($i = 0; $i < $intEach; $i++) {
            $objCheckbox = new QCheckBox($this);
            $objCheckbox->Text = $i;
            $objCheckbox->Checked = true;
            $this->objControlArray[] = $objCheckbox;
            $objListBox = new QListBox($this);
            $objListBox->AddItem($i, $i);
            $objListBox->AddItem($i + 1, $i + 1);
            $objListBox->AddItem($i + 2, $i + 2);
            $this->objControlArray[] = $objListBox;
            $objTextBox = new QTextBox($this);
            $objTextBox->Text = $i . "abcdefghijklmnñopqrs";
            $this->objControlArray[] = $objTextBox;
        }
        $this->btnDale = new QButton($this);
        $this->btnDale->Text = 'Dale';
        $this->btnDale->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDale_Click'));
        $this->lblInfo = new QLabel($this);
        $this->lblInfo->Text = 'Rendering ' . $this->intInserts . ' controls';
        $this->lblInfo->HtmlEntities = false;
    }

    public function btnDale_Click($strFormId, $strControlId, $strParameter) {
        $intTimeInit = time();
        $this->strMsg = "Time init $intTimeInit<br>";
        $this->strMsg .= "Insertando $this->intInserts en 'dato'...<br>";
        $objPersonalArray = Personal::LoadAll();
        $objPersonal = $objPersonalArray[0];
        foreach ($this->objControlArray as $i => $objControl) {
            if ($i % ceil($this->intInserts / 100) == 0) {
                $this->strMsg .= "INSERT $i/$this->intInserts ...<br>\n";
            }
            switch (true) {
                case $objControl instanceof QListBox:
                    $val = $objControl->SelectedValue;
                    break;
                case $objControl instanceof QCheckBox:
                    $val = $objControl->Text;
                    break;
                case $objControl instanceof QTextBox:
                    $objDato = new DatoString();
                    $objDato->IdCampo = 1;
                    $objDato->IdPersonal = $objPersonal->IdPersonal;
                    $objDato->IdDesignacion = 1;
                    $objDato->Valor = $val;
                    $objDato->FechaModificacion = QDateTime::Now();
                    $objDato->Save();
                    $val = $objControl->Text;
                    break;
            }
//            $now = date('Y-m-d H:i:s');
//            $objDato = new Dato();
//            $objDato->IdCampo = 1;
//            $objDato->IdPersonal = 1;
//            $objDato->IdDesignacion = 1;
//            $objDato->Valor = $val;
//            $objDato->FechaModificacion = QDateTime::Now();
//            $objDato->Save();
        }
        $intTimeEnd = time();
        $this->strMsg .= "Time end $intTimeEnd<br>";
        $this->strMsg .= "Total " . ($intTimeEnd - $intTimeInit) . "<br>";
        $this->lblInfo->Text = $this->strMsg;
        $this->lblInfo->Refresh();
        $this->Refresh();
    }

}

?>
