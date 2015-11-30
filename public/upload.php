<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Upload extends FrontControllerBase {
public $intIdFolio;
public $strTipo;
public $intHogar; //solo para censos

//public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
  public function __construct() {
    
        $this->intHogar=false;
                
            try{
                
                if(isset($_GET['idfolio']) && isset($_GET['tipo'])){
                    $this->intIdFolio=$_GET['idfolio'];
                    $this->strTipo=$_GET['tipo'];

                    if(isset($_GET['hogar'])){
                        if(!is_null($_GET['hogar']) && $_GET['hogar'] !==''){
                            $this->intHogar=$_GET['hogar'];
                            $this->strTipo=$_GET['tipo'];

                        }
                    }

                }
                new UploadHandler($this->intIdFolio,$this->strTipo,$this->intHogar);
                die();

            }catch(Exception $exception) {
                    error_log($exception->getMessage());
                    throw $exception;
            }
    }



public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
       
        try {
            if(Authentication::EstaConectado()){     

                parent::Run('Upload','../app/views/upload.tpl.php');
                
            }


        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

Upload::Run();
?>
