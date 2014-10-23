<?php

class QTabPanel extends QPanel {

    /**
     * @access protected
     * @var array[QControl]
     */
    protected $arrTabs = array();

    // TODO: Implement Ajax Options

    /**
     * @access protected
     * @var boolean
     */
    protected $blnCache = false;

    /**
     * @access protected
     * @var boolean
     */
    protected $blnCollapsible = false;

    // TODO: Implement Cookie Object
    // TODO: Implement Disabled Tabs Array

    /**
     * @access protected
     * @var string
     */
    protected $strEvent = 'click';

    // TODO: Implement FX Options

    /**
     * @access protected
     * @var string
     */
    protected $strIdPrefix = 'ui-tabs-';

    /**
     * @access protected
     * @var string
     */
    protected $strPanelTemplate = '<div></div>';

    /**
     * @access protected
     * @var int
     */
    protected $intSelected = 0;

    /**
     * @access protected
     * @var string
     */
    protected $strSpinner = '<em>Loading&#8230;</em>';

    /**
     * @access protected
     * @var string
     */
    protected $strTabTemplate = '<li><a href="#{href}"><span>#{label}</span></a></li>';
    //</editor-fold>

    protected $intCurrentSection = 0;

    /**
     *
     * @param object $objParentObject

     * @param string $strControlId Optional. Defaults to null
     */
    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
    }

    protected function GetControlHtml() {
        //parent::GetControlHtml();
        $str = sprintf('<div class="tabbable">%s%s</div><input type="hidden" id="%s_active_tab_index" value="%s" />',$this->GetTabsHtml(),$this->GetContentHtml(), $this->ControlId, $this->Selected);
        return $str;
    }
    
    protected function GetTabsHtml() {
        $str = sprintf('<ul class="nav nav-tabs" id="%s-tabcontrol">',$this->ControlId);
        $i = 0;
        foreach ($this->arrTabs as $objTab) {
            $str .= sprintf('<li class="%s" onclick="document.getElementById(\'%s_active_tab_index\').value = \'%s\';"><a data-toggle="tab" href="#%s-tab%d">%s</a></li>', ($this->Selected == $i) ? 'active' : '', $this->ControlId, $i, $this->ControlId, $i, $objTab->Title);
            $i++;
        }
        return $str.'</ul>';
    }
    
    public function ParsePostData() {
        $key = sprintf('%s_active_tab_index', $this->ControlId);
        if (array_key_exists($key, $_POST)) {
            if ($this->intSelected !== (int) filter_input(INPUT_POST, $key))
                $this->Selected = (int) filter_input(INPUT_POST, $key);
        }
        parent::ParsePostData();
    }

    protected function GetContentHtml() {
        $str = sprintf('<div class="tab-content" id="%s-tabcontent">',$this->ControlId);
        foreach ($this->arrTabs as $i => $objTabSection) {
            $strActive = ($this->Selected == $i) ? 'in active' : '';
            $strTabContent = $objTabSection->Render(false);
            $str .= sprintf('<div id="%s-tab%d" class="tab-pane %s">%s</div>', $this->ControlId, $i, $strActive, $strTabContent);
        }
        return $str.'</div>';
    }

    
    /**
     * @access public
     * @param string $strName
     * @return mixed
     */
    public function __get($strName) {
        switch ($strName) {
            case 'CurrentSection': return $this->intCurrentSection;
            case 'ActiveTab': return $this->arrTabs[$this->intSelected];
            case 'Tabs': return $this->arrTabs;
            case 'Cache': return $this->blnCache;
            case 'Collapsibe': return $this->blnCollapsible;
            case 'Event': return $this->strEvent;
            case 'IdPrefix': return $this->strIdPrefix;
            case 'PanelTemplate': return $this->strPanelTemplate;
            case 'Selected': return $this->intSelected;
            case 'Spinner': return $this->strSpinner;
            case 'TabTemplate': return $this->strTabTemplate;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    /**
     * @access public
     * @param string $strName
     * @param mixed $mixValue
     */
    public function __set($strName, $mixValue) {
        $this->blnModified = true;
        try {
            switch ($strName) {
                case 'CurrentSection': return ($this->intCurrentSection = QType::Cast($mixValue, QType::Integer));
                case "Cache": $this->blnCache = QType::Cast($mixValue, QType::Boolean);
                    break;
                case "Collapsible": $this->blnCollapsible = QType::Cast($mixValue, QType::Boolean);
                    break;
                case "Event": $this->strEvent = QType::Cast($mixValue, QType::String);
                    break;
                case "IdPrefix": $this->strIdPrefix = QType::Cast($mixValue, QType::String);
                    break;
                case "PanelTemplate": $this->strPanelTemplate = QType::Cast($mixValue, QType::String);
                    break;
                case "Selected": $this->intSelected = QType::Cast($mixValue, QType::Integer);
                    break;
                case "Spinner": $this->strSpinner = QType::Cast($mixValue, QType::String);
                    break;
                case "TabTemplate": $this->strTabTemplate = QType::Cast($mixValue, QType::String);
                    break;
                default: parent::__set($strName, $mixValue);
            }
        } catch (QInvalidCastException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }



    public function AddTab($strTabTitle) {
        $objTabPanelSection = new QTabPanelSection($this, $strTabTitle);
        return $this->arrTabs[$this->CurrentSection++] = $objTabPanelSection;
    }

    public function RemoveTab($strTabName) {
        foreach ($this->arrTabs as $i => $objTab) {
            if ($objTab->Title == $strTabName) {
                $this->objForm->RemoveControl($objTab->ControlId);
                unset($this->arrTabs[$i]);
                return true;
            }
        }
        return false;
    }

    public function getTabByTitle($strTabTitle) {
        return $this->searchTabByName($strTabTitle);
    }

    private function searchTabByName($strTabName) {
        foreach ($this->arrTabs as $objTab) {
            if ($objTab->Title == $strTabName) {
                return $objTab;
            }
        }
        return false;
    }

    /**
     * selecciona un tab buscando por nombre
     * @param string $strTabName
     * @return QTabPanelSection
     */
    public function SelectTab($strTabName) {
        $intIndex = 0;
        foreach ($this->arrTabs as $objTab) {
            if ($objTab->Title == $strTabName) {
                //devuelvo el valor númerico del índice
                return ($this->Selected = $intIndex);
            }
            $intIndex++;
        }
        return false;
    }
    
    public function RenameTabByName($strTabName,$strNewTabName){
        foreach ($this->arrTabs as $i => $objTab) {
            if ($objTab->Title == $strTabName) {
                $objTab->Title = $strNewTabName;
                return true;
            }
        }
        return false;
    }
    
    public function RenameTabByIndex($iIndex,$strNewTabName){
        $bReturnVal=false;
        foreach($this->arrTabs as $i => $value) {
            if($i==$iIndex) {
                $value->Title = $strNewTabName;
                $bReturnVal=true;
                break;
            }
        }
        return $bReturnVal;
    }


}

?>
