<?php

class QMenuListBase extends QPanel {

    protected $objItemsArray;
    
    public function __construct($objParentObject, $objItemsArray = array() ,$strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objItemsArray = $objItemsArray;
    }
    
    public function GetControlHtml() {
        $str = '';
        foreach ($this->objItemsArray as $objItem) {
            if ($objItem instanceof QControl) {
                $str .= sprintf('<li>%s</li>', $objItem->GetControlHtml());
                //$str .= sprintf('<li><a href="%s">%s</a></li>', ($objItem->Link) ? $objItem->Link : '#', $objItem->Text);
            } else { //divider
                $str .= '<li class="divider"></li>';
            }
        }
        return sprintf('<ul class="%s">%s</ul>', $this->strCssClass, $str);
    }
    
    public function AddItem($mixItem = null) {
        if (is_array($mixItem)) {
            $link = new QLinkButton($this);
            $link->Text = current($mixItem);
            $link->Link = next($mixItem);
            $this->objItemsArray[] = $link;
            
//            $this->objItemsArray[] = new QBreadCrumbPage(current($mixPage),next($mixPage));
        }
        elseif ($mixItem instanceof QControl) {
            $this->objItemsArray[] = $mixItem;
        }
        elseif (is_string($mixItem)) {
            $link = new QLinkButton($this);
            $link->Text = $mixItem;
            $this->objItemsArray[] = $link;
        }
        elseif (is_null($mixItem)) { //divider
            $this->objItemsArray[] = '';
        } 
        else {
            throw new QCallerException('Error de parámetros agregando un item a un QMenuList');
        }
    }
    
    public function RemoveLastPage() {
        array_pop($this->objItemsArray);
    }
    
    public function RemovePageByIndex($index) {
        unset($this->objItemsArray[$index]);
    }
    
    public function RemoveAllPages() {
        $this->objItemsArray = array();
    }
    
}
