<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class ObjetarFolio extends FrontControllerBase {
public $intIdFolio;
public $txtComentario;
public $mensaje;
//public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
  public function __construct() {
    try{
        
        if(isset($_POST['comentario']) && isset($_SESSION['folio_a_objetar']) ){

            $this->intIdFolio=$_SESSION['folio_a_objetar'];
            $this->txtComentario=$_POST['comentario'];
            

            $objFolio=Folio::Load($this->intIdFolio);
            if(!Permission::PuedeObjetarFolio($objFolio))
                QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");

            
            $objUsoInterno = $objFolio->UsoInterno;
            $objUsoInterno->Objetado=true;
            $objUsoInterno->ComentarioObjetacion=$this->txtComentario;
            $objUsoInterno->EstadoFolio = EstadoFolio::OBJETADO;
            $objUsoInterno->Save();
            Folio::CambioEstadoFolio($objFolio);
            $this->mensaje="exito";
            unset($_SESSION['folio_a_objetar']);
        }
                
        
    }catch(Exception $exception) {
            $this->mensaje="error";
    }


}
 


public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            if(Authentication::EstaConectado()){
                //parent::Run('Upload','../app/views/upload.tpl.php');    
                parent::Run('ObjetarFolio','../app/views/objetado/objetado.tpl.php');
            }
            
            
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

ObjetarFolio::Run();
?>
