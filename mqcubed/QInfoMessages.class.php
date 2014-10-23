<?php

class QInfoMessages extends QPanel {

    const ERROR = 1;
    const INFO = 2;
    protected $arrMessages = array(QInfoMessages::ERROR=>array(), QInfoMessages::INFO=>array());

    /**
     * Constructor for this control
     * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
     * @param string $strControlId optional control ID
     */
    public function __construct($objParentObject, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }


    /**
     * Get the HTML for this Control.
     * @return string
     */
    public function GetControlHtml() {
        $strReturn = '<table class="qmsg_table">';
        foreach($this->arrMessages as $MsgLvl=>$arrMsg) {
            switch($MsgLvl) { 
                case QInfoMessages::ERROR: $class = "error"; $action = 'RemoveError'; break;
                case QInfoMessages::INFO: $class = "success"; $action = 'RemoveInfo'; break; 
                default: $class = ""; $action = null;
            }
            foreach($arrMsg as $i=>$msg) {
                $lbl = new QLabel($this);
                $lbl->Text = $msg;
                $lbl->CssClass = $class;
                $strReturn .= '<tr class="qmsg_row"><td class="qmsg_lbl">'.$lbl->Render(false).'</td>';
                $btn = new QButton($this);
                $btn->Text = 'X';
                $btn->AddAction(new QClickEvent(), new QAjaxControlAction($this, $action));
                $btn->ActionParameter = $i;
                $btn->CssClass = $class;
                $strReturn .= '<td class="qmsg_close">'.$btn->Render(false).'</td></tr>';
            }
        }
        //$btn = new QButton($this);
        //$btn->Text = 'add';
        //$btn->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'ajAddError'));
        //$btn->ActionParameter = "ajaxoso";
        //$strReturn .= $btn->Render(false);
        //$btn = new QButton($this);
        //$btn->Text = 'addi';
        //$btn->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'ajAddInfo'));
        //$btn->ActionParameter = "ajaxoso";
        //$strReturn .= $btn->Render(false);
        $strReturn .= '</table>';

        //Mostrar los mensajes solo una vez;
        $this->arrMessages = array();
        $this->strText = $strReturn;
        return parent::GetControlHtml();
    }

    
    /**
     * Add an error message to display, QAjaxControlAction api
     * @return string
     */
    public function ajAddError($objForm, $objControl, $strError) {
        return $this->AddError($strError);
    }

    /**
     * Add an error message to display
     * @return string
     */
    public function AddError($strError) {
        $this->blnModified = true;
        $this->arrMessages[QInfoMessages::ERROR][] = $strError;
        $this->Persist();
        return $strError;
    }

    /**
     * Remove an error message to display
     */
    public function RemoveError($objForm, $objControl, $strMsgId) {
        $this->blnModified = true;
        unset($this->arrMessages[QInfoMessages::ERROR][$strMsgId]);
         $this->Persist();
        //$this->arrMessages = array(QInfoMessages::ERROR=>array(), QInfoMessages::INFO=>array());
    }

    /**
     * Add an info message to display, QAjaxControlAction api
     * @return string
     */
    public function ajAddInfo($objForm, $objControl, $strInfo) {
        return $this->AddInfo($strInfo);
    }

    /**
     * Add an info message to display
     * @return string
     */
    public function AddInfo($strInfo) {
        $this->blnModified = true;
        $this->arrMessages[QInfoMessages::INFO][] = $strInfo;
         $this->Persist();
        return $strInfo;
    }

    /**
     * Remove an info message to display
     */
    public function RemoveInfo($objForm, $objControl, $strMsgId) {
        $this->blnModified = true;
        unset($this->arrMessages[QInfoMessages::INFO][$strMsgId]);
    }
    
    /**
     * Remove all info messages
     */
    public function RemoveAllInfo() {
        $this->blnModified = true;
        $this->arrMessages[QInfoMessages::INFO] = array();
    }
    
    /**
     * Remove all error messages
     */
    public function RemoveAllError() {
        $this->blnModified = true;
        $this->arrMessages[QInfoMessages::ERROR] = array();
    }
    
    /**
     * Remove all messages
     */
    public function RemoveAll() {
        $this->blnModified = true;
        $this->arrMessages[QInfoMessages::INFO] = array();
        $this->arrMessages[QInfoMessages::ERROR] = array();
    }
    
}


?>
