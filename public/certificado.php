<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Certificado extends FrontControllerBase {

public $objHogar;
public $ocupantes;
public $template;
public $error;

public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
    $this->template="error/error.tpl.php";
    $this->error="";
    try{
        if(isset($_GET['id'])){
          $this->objHogar=Hogar::load($_GET['id']);
          $arrOcupantes=Ocupante::QueryArray(QQ::Equal(QQN::Ocupante()->IdHogar,$this->objHogar->Id));
          if(count($arrOcupantes)>0){
            $tmp=array();
            foreach($arrOcupantes as $ocupante){
              array_push($tmp,$ocupante->Apellido.", ".$ocupante->Nombres." ,".strtoupper($ocupante->TipoDoc)." ".$ocupante->Doc." ");
            }
            $this->ocupantes=implode(",", $tmp);
            if($this->objHogar->TipoBeneficio=="decreto_81588"){
                $this->template="compraventa.tpl.php";
            }
          }else{
            $this->error="No hay ocupantes cargados en este Lote";
          }


        }


    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}


  public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
    try {
        if(Permission::PuedeImprimirCertificado()){
            parent::Run('Certificado', '../app/views/certificado.tpl.php');
        }

    } catch (Exception $exception) {
        error_log($exception->getMessage());
        throw $exception;
    }
  }



}


Certificado::Run();
?>
