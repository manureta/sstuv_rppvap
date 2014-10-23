<?php

// This class is meant to be a date-picker.  It will essentially render an uneditable HTML textbox
// as well as a calendar icon.  The idea is that if you click on the icon or the textbox,
// it will pop up a calendar in a new small window.
// * "Date" is a Date object for the specified date.

class QDateTimePicker extends QControl {

    ///////////////////////////
    // Private Member Variables
    ///////////////////////////
    // MISC
    protected $dttDateTime = null;
    protected $strDateTimePickerType = QDateTimePickerType::Date;
    protected $strDateTimePickerFormat = QDateTimePickerFormat::DayMonthYear;
    protected $intMinimumYear = 1900;
    protected $intMaximumYear = 2050;
    protected $intSelectedMonth = null;
    protected $intSelectedDay = null;
    protected $intSelectedYear = null;
    // SETTINGS
    protected $strCssClass = 'form-control';

    //////////
    // Methods
    //////////

    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        //$this->AddJavascriptFile("_core/bootstrap-datepicker.js");
        $this->AddJavascriptFile(__VIRTUAL_DIRECTORY__ . "/assets/js/uncompressed/date-time/bootstrap-datepicker.js?1");
        $this->AddJavascriptFile(__VIRTUAL_DIRECTORY__ . "/assets/js/date-time/locales/bootstrap-datepicker.es.js");
        $this->AddJavascriptFile(__VIRTUAL_DIRECTORY__ . "/assets/js/uncompressed/jquery.maskedinput.js");
        $this->AddJavascriptFile("_core/date_time_picker.js?1");
        $this->dttDateTime = null;
    }
    
    protected function GetDaysMonth($intMonth, $intYear){
        switch($intMonth){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return 31;
            case 2:
                return ((!($intYear%4) && ($intYear%100)) || !($intYear%400)) ? 29 : 28;
            default:
                return 30;
        }
    }

    public function ParsePostData() {
        if (array_key_exists($this->strControlId, $_POST)) {
            $dttNewDateTime = new QDateTime();

            // Update Date Component
            switch ($this->strDateTimePickerType) {
                case QDateTimePickerType::Date:
                case QDateTimePickerType::DateTime:
                case QDateTimePickerType::DateTimeSeconds:
                    if (!strlen($_POST[$this->strControlId])){
                        $this->dttDateTime = null;
                        return;
                    }

                    $intDay = substr($_POST[$this->strControlId], 0, 2);
                    $intMonth = substr($_POST[$this->strControlId], 3, 2);
                    $intYear = substr($_POST[$this->strControlId], 6, 4);

                    if (!is_numeric($intYear) || !is_numeric($intMonth) || !is_numeric($intDay)) {
                        $this->dttDateTime = null;
                        return;
                    }
                    if($intMonth > 12){
                        $this->dttDateTime = null;
                        return;
                    }
                    if($intDay > $this->GetDaysMonth($intMonth, $intYear)){
                        $this->dttDateTime = null;
                        return;
                    }                    

                    $this->intSelectedMonth = $intMonth;
                    $this->intSelectedDay = $intDay;
                    $this->intSelectedYear = $intYear;

                    if (strlen($intYear) && strlen($intMonth) && strlen($intDay))
                        $dttNewDateTime->setDate($intYear, $intMonth, $intDay);
                    else
                        $dttNewDateTime->Year = null;
                    break;
            }

            // Update Time Component
            switch ($this->strDateTimePickerType) {
                case QDateTimePickerType::Time:
                case QDateTimePickerType::TimeSeconds:
                case QDateTimePickerType::DateTime:
                case QDateTimePickerType::DateTimeSeconds:
                    if (!strlen($_POST[$this->strControlId])) {
                        $this->dttDateTime = null;
                        return;
                    }
                    $intHour = (int) substr($_POST[$this->strControlId], 0, 2);
                    if ($intHour > 23){
                        $this->dttDateTime = null;
                        return;
                    }
                    $intMinute = (int) substr($_POST[$this->strControlId], 3, 2);
                    if ($intMinute > 59){
                        $this->dttDateTime = null;
                        return;
                    }
                    $intSecond = 0;
                    $dttNewDateTime->setTime($intHour, $intMinute, $intSecond);
                    break;
            }

            // Update local intTimestamp
            $this->dttDateTime = $dttNewDateTime;
        }
    }

    public function GetJavaScriptAction() {
        return "onchange";
    }

    public function GetEndScript() {
        $str = parent::GetEndScript();
        if ($this->Visible && $this->strDateTimePickerType == QDateTimePickerType::Date){
            $str .= sprintf("InitializeDatePicker('%s', %d, %d);", $this->ControlId, $this->intMinimumYear, $this->intMaximumYear);
        }
        elseif ($this->strDateTimePickerType == QDateTimePickerType::Time){
            $str .= sprintf('$("#%s").mask("?99:99");', $this->ControlId);
        }
        return $str;
    }

    protected function GetControlHtml() {
        $x = '<label class="input-group">';
        if (in_array($this->strDateTimePickerType, array(QDateTimePickerType::Date, QDateTimePickerType::DateTimeSeconds, QDateTimePickerType::DateTime))) {
            $x .= sprintf('
    <input class="date-picker %s" maxlength="10" id="%s" type="text" data-date-format="dd-mm-yyyy"  value="%s"  data-MinYear="%s" data-MaxYear="%s" data-Required="%s" data-ValidateFunc="Date" %s/ %s >'
                    , $this->strCssClass, $this->ControlId, ($this->dttDateTime) ? $this->dttDateTime->qFormat('DD/MM/YYYY') : (array_key_exists($this->strControlId, $_POST) ? $_POST[$this->strControlId] : '') , $this->intMinimumYear, $this->intMaximumYear, $this->Required ? 'required' : '',  (!$this->blnEnabled)?'disabled="disabled"':'', $this->GetAttributes());
        }
        if (in_array($this->strDateTimePickerType, array(QDateTimePickerType::TimeSeconds, QDateTimePickerType::DateTimeSeconds, QDateTimePickerType::Time, QDateTimePickerType::DateTime))) {
            $x .= sprintf('
    <input class="time-picker %s" maxlength="5" id="%s" type="text" value="%s" data-ValidateFunc="Time" %s %s />'
                    , $this->strCssClass, $this->ControlId, ($this->dttDateTime) ? $this->dttDateTime->qFormat('hhhh:mm') : (array_key_exists($this->strControlId, $_POST) ? $_POST[$this->strControlId] : '') , (!$this->blnEnabled)?'disabled="disabled"':'', $this->GetAttributes());
        }
        $x .= '</label>';
        return $x;
    }

    public function Validate() {
        if ($this->blnRequired) {
            $blnIsNull = false;

            if (!$this->dttDateTime)
                $blnIsNull = true;
            elseif ($this->strDateTimePickerType == QDateTimePickerType::Date && $this->dttDateTime->IsDateNull())
                $blnIsNull = true;
            elseif ($this->strDateTimePickerType == QDateTimePickerType::Time && $this->dttDateTime->IsTimeNull())
                $blnIsNull = true;

            if ($blnIsNull) {
                if ($this->strName)
                    $this->ValidationError = sprintf(QApplication::Translate('%s is required'), $this->strName);
                else
                    $this->ValidationError = QApplication::Translate('Required');
                return false;
            }
        } else {
            if (is_null($this->dttDateTime) && (array_key_exists($this->strControlId, $_POST) && $_POST[$this->strControlId] != '')) {
                if($this->strDateTimePickerType == QDateTimePickerType::Date)
                    $this->ValidationError = 'Formato de fecha incorrecto';
                elseif($this->strDateTimePickerType == QDateTimePickerType::Time)
                    $this->ValidationError = 'Formato de horario incorrecto';
                return false;
            }
        }
        if ($this->strDateTimePickerType == QDateTimePickerType::Date && $this->dttDateTime){
            $intYear = $this->dttDateTime->Year;
            if($this->intMaximumYear < $intYear){
                $this->ValidationError = 'La fecha debe ser anterior a ' . $this->intMaximumYear;
                return false;
            }
            if($this->intMinimumYear > $intYear){
                $this->ValidationError = 'La fecha debe ser posterior a ' . $this->intMinimumYear;
                return false;
            }
        }

        $this->ValidationError = '';
        return true;
    }

    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            // MISC
            case "DateTime":
                if (is_null($this->dttDateTime) || $this->dttDateTime->IsNull())
                    return null;
                else {
                    $objToReturn = clone($this->dttDateTime);
                    return $objToReturn;
                }

            case "DateTimePickerType": return $this->strDateTimePickerType;
            case "DateTimePickerFormat": return $this->strDateTimePickerFormat;
            case "MinimumYear": return $this->intMinimumYear;
            case "MaximumYear": return $this->intMaximumYear;

            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////
    public function __set($strName, $mixValue) {
        $this->blnModified = true;

        switch ($strName) {
            // MISC
            case "DateTime":
                try {
                    $dttDate = QType::Cast($mixValue, QType::DateTime);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

                $this->intSelectedMonth = null;
                $this->intSelectedDay = null;
                $this->intSelectedYear = null;

                if (is_null($dttDate) || $dttDate->IsNull())
                    $this->dttDateTime = null;
                else
                    $this->dttDateTime = $dttDate;

                break;

            case "DateTimePickerType":
                try {
                    $this->strDateTimePickerType = QType::Cast($mixValue, QType::String);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                if(in_array($this->strDateTimePickerType, array(QDateTimePickerType::DateTime, QDateTimePickerType::DateTimeSeconds)))
                    throw new QCallerException('Soporte para fecha y hora no desarrollado');
                break;

            case "DateTimePickerFormat":
                try {
                    $this->strDateTimePickerFormat = QType::Cast($mixValue, QType::String);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;

            case "MinimumYear":
                try {
                    $this->intMinimumYear = QType::Cast($mixValue, QType::String);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;

            case "MaximumYear":
                try {
                    $this->intMaximumYear = QType::Cast($mixValue, QType::String);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;

            default:
                try {
                    parent::__set($strName, $mixValue);
                    break;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }    
}
?>