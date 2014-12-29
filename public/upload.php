<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Upload extends FrontControllerBase {
public $intIdFolio;
public $strTipo;

//public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
  public function __construct() {
    try{
        
        $this->intIdFolio=$_GET['idfolio'];
        $this->strTipo=$_GET['tipo'];        
        
    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }


}
 


public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            
            parent::Run('Upload','../app/views/upload.tpl.php');
            
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

Upload::Run();
?>
