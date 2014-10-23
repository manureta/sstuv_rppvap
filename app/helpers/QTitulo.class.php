<?php

class QTitulo extends QBlockControl {

    protected $strTitulo;
    protected $strSubtitulo;

    public function __construct($objParentObject, $strTitulo = null, $strSubtitulo = null, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->strTitulo = $strTitulo;
        $this->strSubtitulo = $strSubtitulo;
    }

    public function __get($strName) {
        switch ($strName) {
            case "Titulo":
                return $this->strTitulo;
            case "Subtitulo":
                return $this->strSubtitulo;
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
            case "Titulo":
                $this->strTitulo = (string) $mixValue;
                break;
            case "Subtitulo":
                $this->strSubtitulo = (string) $mixValue;
                break;
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

    public function GetControlHtml() {
        return sprintf('<div class="page-header position-relative"><h1>%s<small><i class="icon-double-angle-right"></i>%s</small></h1></div>', $this->strTitulo, $this->strSubtitulo);
    }

}

