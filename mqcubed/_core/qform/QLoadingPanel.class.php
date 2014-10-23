<?php

/**
 * 
 * QLoadingPanel es un QWaitIcon que aparece visible durante la carga de la página,
 * y no permite interactuar con los controles hasta que todo esté inicializado.
 */
class QLoadingPanel extends QWaitIcon {

    /**
     * strImage: contiene el nombre de la imagen de carga
     * @var string
     */
    protected $strImage = null;

    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->strTagName = 'div';
        $this->blnDisplay = true;
        $this->blnIsBlockElement = true;
        $this->strHorizontalAlign = QHorizontalAlign::Center;
        $this->strVerticalAlign = QVerticalAlign::Middle;
        $this->strPadding = '230px 0 0 0';
        $this->strText = 'Cargando...';
        $this->strImage = __IMAGE_ASSETS__ . '/cargando.gif';
        //$this->strJavaScripts = '_core/jquery/jquery-1.3.2.min.js';
        $this->addCssClass('QLoadingPanel');
    }

    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            case "Image": return $this->strImage;

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
            // APPEARANCE
            case "Image":
                try {
                    $this->strImage = QType::Cast($mixValue, QType::String);
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

    public function GetStyleAttributes() {
        $strStyle = parent::GetStyleAttributes();
        $strStyle .= "left:0;top:0;width:100%;height:100%;position:fixed;z-index:2147483647;cursor:wait;background-color: transparent;";
        return $strStyle;
    }

    protected function GetControlHtml() {
        $strText = QApplication::Translate($this->strText);
        $strStyle = $this->GetStyleAttributes();
        $strImagePath = (substr($this->strImage, 0, 1) != '/') ? __IMAGE_ASSETS__ . '/' . $this->strImage : $this->strImage;
        $strInnerHtml = sprintf('<img src="%s" alt="%s" title="%s"/>', $strImagePath, $strText, $strText);

        $strToReturn = sprintf('<%s id="%s" %s style="%s">%s</%s>', $this->strTagName, $this->strControlId, $this->GetAttributes(true, false), $strStyle, $strInnerHtml, $this->strTagName);

        return $strToReturn;
    }

    public function GetEndScript() {
        $strToReturn = parent::GetEndScript();
        $event = (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')) ? 'ready' : 'load';
        return $strToReturn . "qc.objLoadingPanel = qc.getW('{$this->ControlId}');$(window).{$event} ( function () {qc.objLoadingPanel.style.display='none';});";
    }

}

?>
