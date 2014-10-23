<?php

class QConfirmBox extends QDialogBox{

    protected $arrOkMethod;
    protected $arrCancelMethod;
    public $btnOk;
    
    public function __construct($objParentObject,$strTitle=null, $arrOkMethod=null, $arrCancelMethod=null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $arrOkMethod && $this->ValidateMethod($arrOkMethod) && $this->arrOkMethod = $arrOkMethod;
        $arrCancelMethod && $this->ValidateMethod($arrCancelMethod) &&  $this->arrCancelMethod = $arrCancelMethod;
        $strTitle && $this->strTitle = $strTitle;

        //YES BUTTON
        $this->btnOk = new QButton($this);
        $this->btnOk->AddCssClass('btn btn-default btn-success');
        $this->btnOk->Icon = 'ok';
        $this->btnOk->Text = 'Aceptar';
        $this->btnOk->Visible = true;
        $this->btnOk->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnOk_Click'));
    }
    
    public function Show(){
        $this->ShowDialogBox();
    }
    
    public function btnOk_Click(){
        if($this->arrOkMethod){
            call_user_func($this->arrOkMethod);
            return $this->HideDialogBox();
        }
    }
    
    public function btnClose_Click(){
        if($this->arrCancelMethod){
            call_user_func($this->arrCancelMethod);
        }
        return $this->HideDialogBox();
    }

    protected function ValidateMethod(&$arrMethod){
        $strMsj='';$blnOk=False;
        if($arrMethod && is_array($arrMethod))
            if( is_object($arrMethod[0]) &&  is_string($arrMethod[1]))
                if(is_callable($arrMethod)) $blnOk=True; //OK
                else $strMsj = 'Metodo: '.get_class ($arrMethod[0]).'->'.$arrMethod[1].' Inexistente.';
            else $strMsj = 'QConfirmBox: Parametro Incorrecto. Se espera un array (Objeto,String).';
        else $strMsj = 'QConfirmBox: Parametro Incorrecto. Se espera un array.';
        if(!$blnOk)throw new QCallerException($strMsj);
        return $blnOk;
    }

    protected function btnClose_Create() {
        $this->btnClose = new QButton($this);
        $this->btnClose->AddCssClass('btn btn-default');
        $this->btnClose->Icon = 'undo';
        $this->btnClose->Text = 'Cancelar';
        $this->btnClose->Visible = True;
        $this->btnClose->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnClose_Click'));
    }
    
    
    protected function GetControlHtml() {
        return sprintf('<div style="display:none;text-align: center;" class="qdialogbox qconfirmbox" id="%s"><div class="botones-form">%s%s</div><div style="clear:both"></div></div>', 
                $this->ControlId, $this->btnOk->Render(false), $this->btnClose->Render(false));
    }
    
    public function __get($strName) {
        switch ($strName) {
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
        $this->blnModified = true;
        switch ($strName) {
            case 'LabelOk':
                if (!is_string($mixValue))
                    throw new QCallerException('QConfirmBox: El valor de LabelOk no es string.');
                return $this->btnOk->Text = $mixValue;
            case 'LabelCancel':
                if (!is_string($mixValue))
                    throw new QCallerException('QConfirmBox: El valor de LabelCancel no es string.');
                return $this->btnCancel->Text = $mixValue;
            case 'OkMethod':
                return $this->ValidateMethod($mixValue) && $this->arrOkMethod = $mixValue;
            case 'CancelMethod':
                return $this->ValidateMethod($mixValue) && $this->arrCancelMethod = $mixValue;
            default:
                try {
                    return parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }
}
