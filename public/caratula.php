<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Caratula extends FrontControllerBase {
public $objFolio;  
public $id; 

public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
    try{
        $this->id=$_GET['idfolio'];
        $this->objFolio = Folio::Load($this->id);
    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}

public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            
            //QApplication::DisplayAlert("/caratula.tpl.php");
            parent::Run('Caratula', '../app/views/caratula.tpl.php');
            

        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

Caratula::Run();
?>
