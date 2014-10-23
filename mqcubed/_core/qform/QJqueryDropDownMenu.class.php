<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of QJqueryDropDownMenu class
 *
 * @author jose
 */
class QJqueryDropDownMenu extends QControl {

    //protected $strScript;
    protected $arrMenuItems = array();

    public function __construct($objParent,$strControlId=null) {
        parent::__construct($objParent,$strControlId);
        $this->AddJavascriptFile("_core/jquery/jquery-1.3.2.min.js");
        $this->AddJavascriptFile(__VIRTUAL_DIRECTORY__.'/js/QJQuerySimpleDropDownMenu.js');
    }

    public function ParsePostData() {
    }
    protected function GetControlHtml() {
        $strToReturn = sprintf('<ul id="%s">',$this->ControlId);
        foreach($this->arrMenuItems as $objMenuItem) {
            $strToReturn .= $objMenuItem->GetControlHtml();
        }
        $strToReturn .= '</ul>';

        return $strToReturn;

    }
    public function Validate() {
        return true;
    }


    public function addMenuItem($strControlId = null) {
        $objItemMenu = new QJqueryDropDownMenuItem($this,$strControlId);
        $this->arrMenuItems[] = $objItemMenu;
        return $objItemMenu;
    }

    public function addMenuAjaxButtonItem($objControlActor, $strControlId = null) {
        $objItemMenu = new QJqueryDropDownMenuAjaxButtonItem($this,$objControlActor,$strControlId);
        $this->arrMenuItems[] = $objItemMenu;
        return $objItemMenu;
    }

    public function addMenuCheckItem($objControlActor, $strControlId = null) {
        $objItemMenu = new QJqueryDropDownMenuCheckItem($this,$objControlActor,$strControlId);
        $this->arrMenuItems[] = $objItemMenu;
        return $objItemMenu;
    }
}

class QJqueryDropDownMenuItem extends QControl {
    public $Title;
    public $Link;
    protected $objMenu;

    public function ParsePostData() {
    }
    protected function GetControlHtml() {
        $strToReturn = sprintf('<li><a %s >%s</a>
                                %s
                            </li>',($this->Link)?'href="'.$this->Link.'"':'',
                $this->Title,
                ($this->objMenu)?$this->objMenu->GetControlHtml():''
        );

        return $strToReturn;
    }

    public function Validate() {
        return true;
    }

    public function Menu_create($strControId = null) {
        $this->objMenu = new QJqueryDropDownMenu($this,$strControId);
        return $this->objMenu;

    }

}

class QJqueryDropDownMenuAjaxButtonItem extends QJqueryDropDownMenuItem {

    protected $objControlActor;
    protected $objButton;
    public function  __construct($objParent, $objControlActor, $strControlId = null) {
        parent::__construct($objParent, $strControlId);
        $this->objButton = new QButton($objParent);
        $this->objControlActor = $objControlActor;

    }

    public function ParsePostData() {
    }
    protected function GetControlHtml() {
        $strToReturn = sprintf('<li>%s
                                %s
                            </li>',
                $this->objButton->Render(false),
                ($this->objMenu)?$this->objMenu->GetControlHtml():''
        );

        return $strToReturn;
    }

    public function  __set($name,  $value) {
        switch($name){
            case "ButtonTitle":
                $this->objButton->Text=$value;
            break;
            case "ButtonLink":
                $this->objButton->RemoveAllActions(QClickEvent::EventName);
                $this->objButton->AddAction(new QClickEvent(),new QAjaxControlAction($this->objControlActor,$value));
                break;
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
class QJqueryDropDownMenuCheckItem extends QJqueryDropDownMenuItem {

    protected $objControlActor;
    protected $objCheckBox;
    public function  __construct($objParent, $objControlActor, $strControlId = null) {
        parent::__construct($objParent, $strControlId);
        $this->objCheckBox = new QCheckBox($objParent);
        $this->objControlActor = $objControlActor;

    }

    public function ParsePostData() {
    }
    protected function GetControlHtml() {
        $strToReturn = sprintf('<li>%s
                                %s
                            </li>',
                $this->objCheckBox->Render(false),
                ($this->objMenu)?$this->objMenu->GetControlHtml():''
        );

        return $strToReturn;
    }

    public function  __set($name,  $value) {
        switch($name){
            case "CheckTitle":
                $this->objCheckBox->Text=$value;
            break;
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
?>
