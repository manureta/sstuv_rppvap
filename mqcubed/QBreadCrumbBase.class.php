<?php
/**
 * Description of QBreadCrumbBase
 *
 * @author hcisneros
 */
class QBreadCrumbBase extends QPanel {

    protected $arrPages = array();
    protected $arrDescPages = array();
    protected $arrLinkPages = array();
    //protected $strLastPage;
    //protected $strDescLastPage;
    protected $intMaxPages = 5;
    protected $btnDeleteAll;
    const QBREADCRUMB_SLUG = 'QBreadCrumb';

    public function __construct($objParentObject, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Load();
        $this->btnDeleteAll = new QLinkButton($this);
        $this->btnDeleteAll->Text = 'X';
        $this->btnDeleteAll->Visible = false;
        $this->btnDeleteAll->SetCustomStyle('padding', '0px');
        $this->btnDeleteAll->SetCustomStyle('color', 'red');
        $this->btnDeleteAll->SetCustomStyle('text-decoration', 'none');
        $this->btnDeleteAll->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'DeleteAllPages'));
    }

    public function DeleteAllPages($strFormId, $strControlId, $strParameter) {
        foreach ($this->arrPages as $intIndex => $strPage) {
            $this->DeletePageByIndex($intIndex);
        }
        $this->Save();
        $this->Refresh();
    }

    public function AddPage($strPage) {
        $strPrevPage = '';
        if (count($this->arrPages)) {
            $strPrevPage = $this->arrPages[count($this->arrPages)-1];
        }
        if ($strPage != $strPrevPage) {
            //if (count($this->arrPages)) {
                //$this->strLastPage = $this->arrPages[count($this->arrPages) - 1];
                //$this->strDescLastPage = $this->GetPageDesc($this->arrPages[count($this->arrPages) - 1]);
            //}
            array_push($this->arrPages, $strPage);
            array_push($this->arrDescPages, $this->GetPageDesc($strPage));
            $this->AddLinkPage($strPage, $this->GetPageDesc($strPage));
            if (count($this->arrLinkPages) > $this->intMaxPages) {
                array_shift($this->arrPages);
                array_shift($this->arrDescPages);
                array_shift($this->arrLinkPages);
            }
        }
        $this->Save();
        return;
    }

    public function AddLinkPage($strPage, $strDesc = 'Default') {
        $objLink = new QLinkButton($this);
        $objLink->Name = $strDesc;
        $objLink->Text = $strDesc;
        $objLink->ActionParameter = $strPage;
        $objLink->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'GoToLinkPage'));
        array_push($this->arrLinkPages, $objLink);
    }

    public function AddCurrentPage() {
        $strCurrentPage = DispatchHelper::$strController . "/" . DispatchHelper::$strAction;
        if (!is_null(DispatchHelper::$intId)) {
            $strCurrentPage .= "/" . (int)DispatchHelper::$intId;
        }
        if (!is_null(DispatchHelper::$intId2)) {
            $strCurrentPage .= "/" . (int)DispatchHelper::$intId2;
        }
        $this->AddPage(strtolower($strCurrentPage));
    }

    public function GoToPrevious() {
        if (count($this->arrPages) > 1) {
            $strPrevPage = $this->arrPages[count($this->arrPages)-2];
        } else {
            $strPrevPage = $this->arrPages[count($this->arrPages)-1];
        }
        $this->GoToLinkPage($this->Form->FormId, $this->ControlId, $strPrevPage);
    }

    public function GoToLinkPage($strFormId, $strControlId, $strParameter) {
        if (in_array($strParameter, $this->arrPages)) {
            $intKey = array_search($strParameter, $this->arrPages);
            foreach ($this->arrPages as $intIndex => $strPage) {
                if ($intIndex > $intKey) {
                    $this->DeletePageByIndex($intIndex);
                }
            }
            $this->Save();
        }
        QApplication::ExecuteJavascript(sprintf("location.href='%s/%s'",__VIRTUAL_DIRECTORY__,$strParameter));
    }

    public function GetLastPage() {
        return $this->strLastPage;
    }

    protected function DeletePageByIndex($intIndex) {
        unset($this->arrPages[$intIndex]);
        unset($this->arrDescPages[$intIndex]);
        unset($this->arrLinkPages[$intIndex]);
    }

    protected function GetPageDesc($strPage) {
        $strDescPage = '';
        $arrDesc = explode('/', $strPage);
        $strDescPage = ucfirst($strAction).' '.ucfirst($strPage);
        if (isset($arrDesc[2])) {
            $strDescPage .= ' '.ucfirst($arrDesc[2]);
        }
        return $strDescPage;
    }

    public function Save() {
        Session::SetSessionVar(self::QBREADCRUMB_SLUG, serialize($this->arrPages));
        Session::SetSessionVar(self::QBREADCRUMB_SLUG . 'Desc', serialize($this->arrDescPages));
        //Session::SetSessionVar(self::QBREADCRUMB_SLUG . 'Link', serialize($this->arrLinkPages));
    }

    public function Load() {
        $arrPagesSerialized = Session::GetSessionVar(self::QBREADCRUMB_SLUG);
        $arrDescPagesSerialized = Session::GetSessionVar(self::QBREADCRUMB_SLUG . 'Desc');
        //$arrLinkPagesSerialized = Session::GetSessionVar(self::QBREADCRUMB_SLUG . 'Link');
        if ($arrPagesSerialized && $arrDescPagesSerialized) {
            $this->arrPages = unserialize($arrPagesSerialized);
            $this->arrDescPages = unserialize($arrDescPagesSerialized);
            $this->CreateLinkPages();
            //$this->arrLinkPages = unserialize($arrLinkPagesSerialized);
            //if (count($this->arrPages)) {
                //$this->strLastPage = $this->arrPages[count($this->arrPages) - 1];
                //$this->strDescLastPage = $this->arrDescPages[count($this->arrDescPages) - 1];
            //}
        }
    }

    protected function CreateLinkPages() {
        foreach ($this->arrPages as $intIndex => $strPage) {
            $this->AddLinkPage($strPage, $this->GetDescPageByIndex($intIndex));
        }
    }

    public function GetPages() {
        return $this->arrPages;
    }

    public function GetLinkPages() {
        return $this->arrLinkPages;
    }

    public function GetDescPages() {
        return $this->arrDescPages;
    }

    public function GetDescPageByIndex($intIndex) {
        if (array_key_exists($intIndex, $this->arrDescPages))
            return $this->arrDescPages[$intIndex];
        return;
    }

    public function GetLinkPageByIndex($intIndex) {
        if (array_key_exists($intIndex, $this->arrLinkPages))
            return $this->arrLinkPages[$intIndex];
        return;
    }

    public function GetPageByIndex($intIndex) {
        if (array_key_exists($intIndex, $this->arrPages))
            return $this->arrPages[$intIndex];
        return;
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case "Pages":
                try {
                    $this->arrPages = QType::Cast($mixValue, QType::ArrayType);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case "DescPages":
                try {
                    $this->arrDescPages = QType::Cast($mixValue, QType::ArrayType);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case "LastPage":
                try {
                    $this->strLastPage = QType::Cast($mixValue, QType::String);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case "DescLastPage":
                try {
                    $this->strDescLastPage = QType::Cast($mixValue, QType::String);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            default:
                try {
                    parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;
        }
    }

    public function __get($strName) {
        switch ($strName) {
            case "Pages": return $this->arrPages;
            case "DescPages": return $this->arrDescPages;
            case "LastPage": return $this->strLastPage;
            case "DescLastPage": return $this->strDescLastPage;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function ParsePostData() {

    }

    public function GetControlHtml() {
        /*foreach ($this->GetPages() as $intIndex => $strPage) {
            $strToReturn .= '<li>&gt;&gt;<a href="'.__VIRTUAL_DIRECTORY__."/$strPage".'" title="'.$this->GetDescPageByIndex($intIndex).'">'.$this->GetDescPageByIndex($intIndex).'</a></li>';
        }*/
        $strToReturn = '<div id="'.$this->ControlId.'">';
        $strToReturn .= '<ul id="qbreadcrumb">';
        //$strToReturn .= '<li>'.$this->btnDeleteAll->GetControlHtml().'</li>';
        foreach ($this->GetLinkPages() as $intIndex => $objButton) {
            //$strToReturn .= '<li>&gt;&gt;<a href="'.__VIRTUAL_DIRECTORY__."/$strPage".'" title="'.$this->GetDescPageByIndex($intIndex).'">'.$this->GetDescPageByIndex($intIndex).'</a></li>';
            $strToReturn .= '<li>&gt;&gt;'.$objButton->GetControlHtml().'</li>';
        }
        $strToReturn .= '</ul>';
        $strToReturn .= '</div>';
        //$strToReturn .= '<br>LastPage:: '.$this->strLastPage;
        return $strToReturn;
    }

    public function Validate() {
        return true;
    }

}
?>
