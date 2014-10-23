<?php

// TODO moverlo a donde corresponda en el library
class QProgressBar extends QPanel {

    protected $lblStatus;
    protected $lblPercentage;
    protected $strName;
    protected $blnError;
    protected $msgError;
    protected $intStatus;

    const MSG_STATUS_DEFAULT = "No inicializado";
    const MSG_ERROR_DEFAULT = "ERROR";

    const STATUS_FINALIZADO = 100;
    const STATUS_ERROR = -1;


    /**
     * Constructor for this control
     * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
     * @param string $strControlId optional control ID
     */
    public function __construct($objParentObject, $name,$strControlId = null, $strStatus = self::MSG_STATUS_DEFAULT, $strError = self::MSG_ERROR_DEFAULT) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

        $this->lblStatus = new QLabel($this);
        $this->lblStatus->Text = QApplication::Translate($strStatus);
        $this->lblStatus->Visible = true;

        $this->blnError = false;
        $this->strName = $name;
        $this->intStatus = 0;

        $this->lblPercentage = new QLabel($this);
        $this->lblPercentage->Text = QApplication::Translate($this->intStatus . " %");
        $this->lblPercentage->Visible = false;

    }


    /**
     * If this control needs to update itself from the $_POST data, the logic to do so
     * will be performed in this method.
     */
    public function ParsePostData() {}

    /**
     * If this control has validation rules, the logic to do so
     * will be performed in this method.
     * @return boolean
     */
    public function Validate() {return true;}

    /**
     * Get the HTML for this Control.
     * @return string
     */
    public function GetControlHtml() {

        $assetsPath = __ASSETS_URI__.'/';
        $intWidth = ($this->strWidth) ? (int) $this->strWidth : 200;
        $strReturn = '<table class="qpbar_table">';
        $strReturn .= '<td class="qpbar_name">'.$this->strName."</td>";
        if($this->intStatus>=0){
            $strReturn .= sprintf('<td class="qpbar_bar" width="%d"><img id="%s_img" alt="" src="%s" ></td>', $intWidth, $this->strControlId, $assetsPath ."bar.php?img=winxp/$intWidth/". $this->intStatus ."/100");
            if($this->intStatus == 100 ){
                $strReturn .= sprintf('<td class="qpbar_icon"><img src="%s" ></td>',$assetsPath . "images/tilde_ok.gif");
            }
            else{
                $strReturn .= '<td class="qpbar_percentage">'.$this->lblPercentage->Render(false)."</td>";
            }
        }
        else{
            $strReturn .= sprintf('<td class="qpbar_bar" width="%d"><img id="%s_img" alt="" src="%s" ></td>', $intWidth, $this->strControlId, $assetsPath ."bar.php?img=winxp/$intWidth/0/100");
            $strReturn .= sprintf('<td class="qpbar_icon"><img src="%s" ></td>',$assetsPath . "images/error.gif");
        }
        $strReturn .= "</table>";

        return $strReturn;

/*
        return sprintf("<img id=\"%s_img\" alt=\"\" src=\"%s\" class=\"migrator_bar\">\n", $this->strControlId, $assetsPath ."bar.php?img=winxp/200/". ($this->intStatus<0?0:$this->intStatus) ."/100");

        return $this->lblPercentage->Render(false);

        
        $strAttributes = $this->GetAttributes();

        // Pull any styles
        if ($strStyle = $this->GetStyleAttributes())
                $strStyle = 'style="' . $strStyle . '"';
        
        $strReturn = "<table $strStyle $strAttributes class=\"progress\"><tr>";
        $strReturn .= "\t<th>".$this->strName."</th>\n";
        $strReturn .= sprintf("\t<td><img id=\"%s_img\" alt=\"\" src=\"%s\" class=\"migrator_bar\"></td>\n", $this->strControlId, $assetsPath ."/php/bar.php?img=winxp/200/". ($this->intStatus<0?0:$this->intStatus) ."/100");
        $strReturn .= "\t<td class=\"progress_percentage\">" .
                    ($this->intStatus<0?sprintf("<img src=\"%s\" >",self::$strPathToErrorImg):
                        ($this->intStatus==STATUS_MIGRADO?sprintf("<img src=\"%s\" >",self::$strPathToOkImg):$this->lblPercentage->Render(false))) . "</td>\n";
        $strReturn .= "\t<td class=\"progress_status\">" . $this->intStatus->Render(false) . "</td>\n";
        $strReturn .= "</tr></table>";
        return $strReturn;
 *
 */
    }

    
    // For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
    public function GetEndScript() {
        return parent::GetEndScript();        
    }

    /**
     * Verifica el estado de migraciÃ³n de una tabla y tilda el checkbox
     * @return boolean
     */
    public function Check(){return false;}
    
    // For any HTML code that needs to be rendered at the END of the QForm when this control is INITIALLY rendered.
//		public function GetEndHtml() {
//			$strToReturn = parent::GetEndHtml();
//			return $strToReturn;
//		}

    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            case 'Name': return $this->strName;
            case 'Error': return $this->blnError;
            case 'Percentage': return $this->intStatus;
            default:
                try {
                        return parent::__get($strName);
                } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////
    public function __set($strName, $mixValue) {
        $this->blnModified = true;
        switch ($strName) {
            case 'Name':
                    try {
                        $this->strName = QType::Cast($mixValue, QType::String);
                        return $this->strName;
                    } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
            case 'Width':
                    try {
                        $this->strWidth = QType::Cast($mixValue, QType::Integer);
                        return $this->strWidth;
                    } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
            case 'Percentage':
                    try {
                        $this->intStatus = QType::Cast($mixValue, QType::Integer);
                        if($this->intStatus<0){
                                $this->lblPercentage->Visible = false;
                                $this->lblStatus->Text = $this->msgError;
                                $this->lblStatus->Visible = false;
                        }
                        else{
                            $this->lblPercentage->Text = QType::Cast($mixValue, QType::String) . "%";
                            $this->lblPercentage->Visible = true;
                        }
                        return $this->lblPercentage->Text;
                    } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
            case 'Status':
                    try {
                        $this->lblStatus->Text = QType::Cast($mixValue, QType::String);
                        return $this->lblStatus->Text;
                    } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
            default:
                    try {
                            return (parent::__set($strName, $mixValue));
                    } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
        }
    }

    public function showStatus($blnShow){
        if($blnShow)
            $this->lblStatus->Visible = true;
        else
            $this->lblStatus->Visible = false;
    }

    public function showPercentage($blnShow){
        if($blnShow)
            $this->lblPercentage->Visible = true;
        else
            $this->lblPercentage->Visible = false;
    }

}


?>
