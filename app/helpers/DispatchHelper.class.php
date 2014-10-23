<?php

class DispatchHelper {

    //static constants
    const INDEX = "Index";
    const EDIT = "Edit";
    const VIEW = "View";
    const _LIST = "List";
    const _NEW = "New";
    const ACTUALIZAR = "Actualizar";
    const DESIGNACION = "Designacion";
    const VERIFICAR = "Verificar";
    const CONSTANCIA = "Constancia";
    const DOCUMENTACION = "Documentacion";
    const CONFLICTOS = "Conflictos";
    const IMPRESION = "Impresion";
    const LOCALIZACION = "Localizacion";
    const REGISTRACION = "Registracion";
    const TRAYECTORIA = "Trayectoria";
    const CONTACTO = "Contacto";
    const REPORTAR = "Reportar";
    const PAGINA = "pagina";

    //static atributes
    public static $blnInstance;
    public static $strController;
    public static $strAction;
    public static $intId = null;
    public static $intId2 = null;
    public static $strControllerName;
    public static $arrActiveControllers = array();

    public static function Initialize() {
        // Check if an instance is already available
        if(!self::$blnInstance) {
            // If there's no instance, initialize the dispatcher
            self::$blnInstance = new self();
        }
        return;
    }

    private function __construct() {
        // Retrieve the controller & action, and verify both
        self::$strController = QApplication::QueryString('controller');
        self::$strAction = QApplication::QueryString('action');
        self::$intId = QApplication::QueryString('id');
        self::$intId2 = QApplication::QueryString('id2');

        //self::$strAction
        if (self::$strController === '') {
            self::$strController = null;
        }
        if (self::$strAction === '') {
            self::$strAction = null;
        }
        // If both controller & action are empty, send to homepage
        if ( self::$strController === null && self::$strAction === null) {
            self::$strController = 'Page';
            self::$strAction = 'Home';
            self::$strControllerName = 'PageHomePanel';
        }
        elseif (strtolower(self::$strController) == 'pagina' && strtolower(self::$strAction) == '' && is_numeric(self::$intId)) {
            //self::$strControllerName = ucfirst(strtolower(self::$strController)) .ucfirst(strtolower(self::$strAction )).'Panel';
            self::$strControllerName = ucfirst(strtolower(self::$strController)) . self::$intId .'Panel';
        }
        // If controller is valid and no action is defined, set the default action
        elseif (ctype_alpha(self::$strController) && self::$strAction === null) {
            self::$strController = ucfirst(strtolower(self::$strController));
            self::$strAction = 'Index';
            self::$strControllerName = self::$strController . self::$strAction. 'Panel';
        }
        // If controller is valid and action is valid, combine the class name
        elseif (ctype_alpha(self::$strController) && ctype_alpha(self::$strAction)) {
            self::$strController = ucfirst(strtolower(self::$strController));
            self::$strAction = ucfirst(strtolower(self::$strAction));
            self::$strControllerName = self::$strController . self::$strAction. 'Panel';
        }
        // In all other situations, save the faulty URL to the session and show a 404
        else {
            self::$strController = 'Error';
            self::$strAction = 'Notfound';
            self::$strControllerName = self::$strController . self::$strAction .'Panel';
        }
        if(self::$strController==self::DOCUMENTACION)
            return;
        // Check if the class exists
        if (!class_exists(self::$strControllerName)) {
            self::$strController = 'Error';
            self::$strAction = 'Notfound';
            self::$strControllerName = self::$strController . self::$strAction .'Panel';
        }
        return;
    }

    public static function getControllerInstance(QForm $thisQForm) {
        $arrNoCheckControllers = array("Page","Login","Logout","Registracion");

        $strControllerName = DispatchHelper::$strControllerName;

        if(self::$strController==self::DOCUMENTACION){
            self::$strControllerName = self::$strController . self::INDEX . 'Panel';
            return new self::$strControllerName($thisQForm,null,self::$strAction);
        }

        if (strtolower(self::$strController) == self::PAGINA) {
            return new $strControllerName($thisQForm,self::$intId);
        }
        switch(self::$strAction) {
            case self::INDEX:
                return new $strControllerName($thisQForm,null,null,null,self::$intId,self::$intId2);
                break;
            case self::EDIT:
            case self::VIEW:
            case self::_LIST:
            case self::_NEW:
            case self::VERIFICAR:
            case self::CONSTANCIA:
            case self::IMPRESION:
            case self::ACTUALIZAR:
            case self::DESIGNACION:
            case self::CONFLICTOS:
            case self::LOCALIZACION:
            case self::REGISTRACION:
            case self::TRAYECTORIA:
            case self::CONTACTO:
            case self::REPORTAR:
                return new $strControllerName($thisQForm,null,self::$intId, null, self::$intId2);
                break;
            default:
                return new $strControllerName($thisQForm);
        }
    }
}
