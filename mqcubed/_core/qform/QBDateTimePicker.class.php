<?php

class QBDateTimePicker extends QDateTimePicker {

    ///////////////////////////
    // Private Member Variables
    ///////////////////////////
    // MISC
    protected $dttDateTime = null;
    protected $strDateTimePickerType = QDateTimePickerType::Date;
    protected $strDateTimePickerFormat = QDateTimePickerFormat::DayMonthYear;
    protected $intMinimumYear = 1970;
    protected $intMaximumYear = 2020;
    protected $intSelectedMonth = null;
    protected $intSelectedDay = null;
    protected $intSelectedYear = null;
    // SETTINGS
    
    protected $strJavaScripts = 'date-time/bootstrap-datepicker.min.js';
    //protected $strCssClass = 'datetimepicker';

    //////////
    // Methods
    //////////
//                public function __construct($objParentObject, $strControlId = null) {
//                    parent::__construct($objParentObject, $strControlId);
//
//                    $this->DateTime = QDateTime::Now();
//                }

    public function ParsePostData() {
        if (array_key_exists($this->strControlId . '_lstMonth', $_POST) || array_key_exists($this->strControlId . '_lstHour', $_POST)) {
            $dttNewDateTime = new QDateTime();

            // Update Date Component
            switch ($this->strDateTimePickerType) {
                case QDateTimePickerType::Date:
                case QDateTimePickerType::DateTime:
                case QDateTimePickerType::DateTimeSeconds:
                    $strKey = $this->strControlId . '_lstMonth';
                    if (array_key_exists($strKey, $_POST))
                        $intMonth = $_POST[$strKey];
                    else
                        $intMonth = null;

                    $strKey = $this->strControlId . '_lstDay';
                    if (array_key_exists($strKey, $_POST))
                        $intDay = $_POST[$strKey];
                    else
                        $intDay = null;

                    $strKey = $this->strControlId . '_lstYear';
                    if (array_key_exists($strKey, $_POST))
                        $intYear = $_POST[$strKey];
                    else
                        $intYear = null;

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
                    $strKey = $this->strControlId . '_lstHour';
                    if (array_key_exists($strKey, $_POST)) {
                        $intHour = $_POST[$strKey];
                        if (strlen($intHour)) {
                            $intHour = $_POST[$this->strControlId . '_lstHour'];
                            $intMinute = $_POST[$this->strControlId . '_lstMinute'];
                            $intSecond = 0;
                            if (($this->strDateTimePickerType == QDateTimePickerType::TimeSeconds) ||
                                    ($this->strDateTimePickerType == QDateTimePickerType::DateTimeSeconds))
                                $intSecond = $_POST[$this->strControlId . '_lstSecond'];

                            if (strlen($intHour) && strlen($intMinute) && strlen($intSecond))
                                $dttNewDateTime->setTime($intHour, $intMinute, $intSecond);
                            else
                                $dttNewDateTime->Hour = null;
                        }
                    }
                    break;
            }

            // Update local intTimestamp
            $this->dttDateTime = $dttNewDateTime;
        }
    }

    public function GetJavaScriptAction() {
        return "onchange";
    }

    protected function GetControlHtml() {
        // Ignore Class
        $strCssClass = $this->strCssClass;
        $this->strCssClass = '';
        $strAttributes = $this->GetAttributes();
        $this->strCssClass = $strCssClass;

        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strAttributes .= sprintf(' style="%s"', $strStyle);

        return sprintf('<div class="input-group"><input id="%s" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy"><span class="input-group-addon"><i class="icon-calendar bigger-110"></i></span></div>',$this->strControlId);
        $strCommand = sprintf(' onchange="Qcodo__DateTimePicker_Change(\'%s\', this);"', $this->strControlId);

        if ($this->dttDateTime) {
            $dttDateTime = $this->dttDateTime;
        } else {
            $dttDateTime = new QDateTime();
        }

        if ($dttDateTime->IsDateNull() && is_null($this->intSelectedDay) && is_null($this->intSelectedMonth) && is_null($this->intSelectedYear)) {
            $objNow = QDateTime::Now();
            $this->intSelectedDay = $objNow->Day;
            $this->intSelectedMonth = $objNow->Month;
            $this->intSelectedYear = $objNow->Year;
        }

        $strToReturn = '';

        // Generate Date-portion
        switch ($this->strDateTimePickerType) {
            case QDateTimePickerType::Date:
            case QDateTimePickerType::DateTime:
            case QDateTimePickerType::DateTimeSeconds:
                // Month
                $strMonthListbox = sprintf('<select name="%s_lstMonth" id="%s_lstMonth" class="month" %s%s>', $this->strControlId, $this->strControlId, $strAttributes, $strCommand);
                if (!$this->blnRequired || $dttDateTime->IsDateNull())
                    $strMonthListbox .= '<option value="">--</option>';
                for ($intMonth = 1; $intMonth <= 12; $intMonth++) {
                    if ((!$dttDateTime->IsDateNull() && ($dttDateTime->Month == $intMonth)) || ($this->intSelectedMonth == $intMonth))
                        $strSelected = ' selected="selected"';
                    else
                        $strSelected = '';
                    $strMonthListbox .= sprintf('<option value="%s"%s>%s</option>', $intMonth, $strSelected, QApplication::Translate(strftime("%b", mktime(0, 0, 0, $intMonth, 1, 2000))));
                }
                $strMonthListbox .= '</select>';

                // Day
                $strDayListbox = sprintf('<select name="%s_lstDay" id="%s_lstDay" class="day" %s%s>', $this->strControlId, $this->strControlId, $strAttributes, $strCommand);
                if (!$this->blnRequired || $dttDateTime->IsDateNull())
                    $strDayListbox .= '<option value="">--</option>';
                if ($dttDateTime->IsDateNull()) {
                    if ($this->blnRequired) {
                        // New DateTime, but we are required -- therefore, let's assume January is preselected
                        for ($intDay = 1; $intDay <= 31; $intDay++) {
                            $strDayListbox .= sprintf('<option value="%s">%s</option>', $intDay, $intDay);
                        }
                    } else {
                        // New DateTime -- but we are NOT required
                        // See if a month has been selected yet.
                        if ($this->intSelectedMonth) {
                            $intSelectedYear = ($this->intSelectedYear) ? $this->intSelectedYear : 2000;
                            $intDaysInMonth = date('t', mktime(0, 0, 0, $this->intSelectedMonth, 1, $intSelectedYear));
                            for ($intDay = 1; $intDay <= $intDaysInMonth; $intDay++) {
                                if (($dttDateTime->Day == $intDay) || ($this->intSelectedDay == $intDay))
                                    $strSelected = ' selected="selected"';
                                else
                                    $strSelected = '';
                                $strDayListbox .= sprintf('<option value="%s"%s>%s</option>', $intDay, $strSelected, $intDay);
                            }
                        } else {
                            // It's ok just to have the "--" marks and nothing else
                        }
                    }
                } else {
                    $intDaysInMonth = $dttDateTime->PHPDate('t');
                    for ($intDay = 1; $intDay <= $intDaysInMonth; $intDay++) {
                        if (($dttDateTime->Day == $intDay) || ($this->intSelectedDay == $intDay))
                            $strSelected = ' selected="selected"';
                        else
                            $strSelected = '';
                        $strDayListbox .= sprintf('<option value="%s"%s>%s</option>', $intDay, $strSelected, $intDay);
                    }
                }
                $strDayListbox .= '</select>';

                // Year
                $strYearListbox = sprintf('<select name="%s_lstYear" id="%s_lstYear" class="year" %s%s>', $this->strControlId, $this->strControlId, $strAttributes, $strCommand);
                if (!$this->blnRequired || $dttDateTime->IsDateNull())
                    $strYearListbox .= '<option value="">--</option>';
                for ($intYear = $this->intMinimumYear; $intYear <= $this->intMaximumYear; $intYear++) {
                    if (($dttDateTime->IsDateNull()) && (!isset($this->intSelectedYear) && ($intYear == QDateTime::Now()->Year)) || (($dttDateTime->Year == $intYear) || ($this->intSelectedYear == $intYear)))
                        $strSelected = ' selected="selected"';
                    else
                        $strSelected = '';
                    $strYearListbox .= sprintf('<option value="%s"%s>%s</option>', $intYear, $strSelected, $intYear);
                }
                $strYearListbox .= '</select>';

                // Put it all together
                switch ($this->strDateTimePickerFormat) {
                    case QDateTimePickerFormat::MonthDayYear:
                        $strToReturn .= $strMonthListbox . $strDayListbox . $strYearListbox;
                        break;
                    case QDateTimePickerFormat::DayMonthYear:
                        $strToReturn .= $strDayListbox . $strMonthListbox . $strYearListbox;
                        break;
                    case QDateTimePickerFormat::YearMonthDay:
                        $strToReturn .= $strYearListbox . $strMonthListbox . $strDayListbox;
                        break;
                }
        }

        switch ($this->strDateTimePickerType) {
            case QDateTimePickerType::DateTime:
            case QDateTimePickerType::DateTimeSeconds:
                $strToReturn .= '<span class="divider"></span>';
        }

        switch ($this->strDateTimePickerType) {
            case QDateTimePickerType::Time:
            case QDateTimePickerType::TimeSeconds:
            case QDateTimePickerType::DateTime:
            case QDateTimePickerType::DateTimeSeconds:
                // Hour
                $strHourListBox = sprintf('<select name="%s_lstHour" id="%s_lstHour" class="hour" %s>', $this->strControlId, $this->strControlId, $strAttributes);
                if (!$this->blnRequired || $dttDateTime->IsTimeNull())
                    $strHourListBox .= '<option value="">--</option>';
                for ($intHour = 0; $intHour <= 23; $intHour++) {
                    if (!$dttDateTime->IsTimeNull() && ($dttDateTime->Hour == $intHour))
                        $strSelected = ' selected="selected"';
                    else
                        $strSelected = '';
                    $strHourListBox .= sprintf('<option value="%s"%s>%s</option>', $intHour, $strSelected, date('g A', mktime($intHour, 0, 0, 1, 1, 2000)));
                }
                $strHourListBox .= '</select>';


                // Minute
                $strMinuteListBox = sprintf('<select name="%s_lstMinute" id="%s_lstMinute" class="minute" %s>', $this->strControlId, $this->strControlId, $strAttributes);
                if (!$this->blnRequired || $dttDateTime->IsTimeNull())
                    $strMinuteListBox .= '<option value="">--</option>';
                for ($intMinute = 0; $intMinute <= 59; $intMinute++) {
                    if (!$dttDateTime->IsTimeNull() && ($dttDateTime->Minute == $intMinute))
                        $strSelected = ' selected="selected"';
                    else
                        $strSelected = '';
                    $strMinuteListBox .= sprintf('<option value="%s"%s>%02d</option>', $intMinute, $strSelected, $intMinute);
                }
                $strMinuteListBox .= '</select>';


                // Seconds
                $strSecondListBox = sprintf('<select name="%s_lstSecond" id="%s_lstSecond" class="second" %s>', $this->strControlId, $this->strControlId, $strAttributes);
                if (!$this->blnRequired || $dttDateTime->IsTimeNull())
                    $strSecondListBox .= '<option value="">--</option>';
                for ($intSecond = 0; $intSecond <= 59; $intSecond++) {
                    if (!$dttDateTime->IsTimeNull() && ($dttDateTime->Second == $intSecond))
                        $strSelected = ' selected="selected"';
                    else
                        $strSelected = '';
                    $strSecondListBox .= sprintf('<option value="%s"%s>%02d</option>', $intSecond, $strSelected, $intSecond);
                }
                $strSecondListBox .= '</select>';


                // PUtting it all together
                if (($this->strDateTimePickerType == QDateTimePickerType::DateTimeSeconds) ||
                        ($this->strDateTimePickerType == QDateTimePickerType::TimeSeconds))
                    $strToReturn .= $strHourListBox . ':' . $strMinuteListBox . ':' . $strSecondListBox;
                else
                    $strToReturn .= $strHourListBox . ':' . $strMinuteListBox;
        }

        if ($this->strCssClass)
            $strCssClass = ' class="' . $this->strCssClass . '"';
        else
            $strCssClass = '';
        return sprintf('<span id="%s"%s>%s</span>', $this->strControlId, $strCssClass, $strToReturn);
    }

    public function GetEndScript() {
        return sprintf('$(\'#%s\').datepicker({autoclose:true}).next().on(ace.click_event, function(){$(this).prev().focus();}); ',$this->strControlId);
    }
}

?>