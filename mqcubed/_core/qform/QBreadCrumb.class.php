<?php

class QBreadCrumb extends QMenuListBase {
    protected $strCssClass = 'breadcrumb';
//    /**
//     *
//     * @var QBreadCrumbPage[]
//     */
//    protected $objPagesArray;
//    
//    public function __construct($objParentObject, $objPagesArray = array() ,$strControlId = null) {
//
//        // Call the Parent
//        try {
//            parent::__construct($objParentObject, $strControlId);
//        } catch (QCallerException $objExc) {
//            $objExc->IncrementOffset();
//            throw $objExc;
//        }
//        $this->objPagesArray = $objPagesArray;
//    }
//    
//    public function GetControlHtml() {
//        $str = '<ul class="breadcrumb">';
//        foreach ($this->objPagesArray as $objPage) {
//            $str .= sprintf('<li><a href="%s">%s</a></li>', ($objPage->strLink) ? $objPage->strLink : '#', $objPage->strPage);
//        }
//        return "$str</ul>\n";
//    }
//    
//    public function AddPage($mixPage) {
//        if (is_array($mixPage)) {
//            $this->objPagesArray[] = new QBreadCrumbPage(current($mixPage),next($mixPage));
//        }
//        else if ($mixPage instanceof QBreadCrumbPage) {
//            $this->objPagesArray[] = $mixPage;
//        }
//        elseif (is_string($mixPage)) {
//            $this->objPagesArray[] = new QBreadCrumbPage($mixPage);
//        }
//        else {
//            throw new QCallerException('Error de parámetros agregando una página al QBreadCrumb');
//        }
//    }
//    
//    public function RemoveLastPage() {
//        array_pop($this->objPagesArray);
//    }
//    
//    public function RemovePageByIndex($index) {
//        unset($this->objPagesArray[$index]);
//    }
//    
//    public function RemoveAllPages() {
//        $this->objPagesArray = array();
//    }
//    
//}
//
//class QBreadCrumbPage {
//    public $strPage;
//    public $strLink;
//    
//    public function __construct($strPage = null, $strLink = null) {
//        $this->strPage = $strPage;
//        $this->strLink = $strLink;
//    }
}