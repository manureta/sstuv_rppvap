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
          if(!Permission::PuedeImprimirCertificado()){
              $this->error="No tiene permisos para imprimir el certificado";
              return;
          }
          if(isset($_GET['id']) && ($_GET['id'])>0){
            $this->objHogar=Hogar::load($_GET['id']);
            $arrOcupantes=Ocupante::QueryArray(
                QQ::AndCondition(
                  QQ::Equal(QQN::Ocupante()->IdHogar,$this->objHogar->Id),
                  QQ::Equal(QQN::Ocupante()->Activo,TRUE)
                )
            );    
            if(!$this->objHogar->DeclaracionNoOcupacion){
              $this->error="Para imprimir el certificado es necesario que esté tildado 'Los ocupantes declaran que no son titulares de otro inmueble'";
              return;
            }

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
          }else{
            $this->error="<p>El id del grupo familiar (lote) no es válido o es nulo</p><p>Este error seguramente se debe a que todavía no se guardaron los cambios del grupo familiar</p>";
          }
      }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}


  public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
    try {
        parent::Run('Certificado', '../app/views/certificado.tpl.php');

    } catch (Exception $exception) {
        error_log($exception->getMessage());
        throw $exception;
    }
  }



}


Certificado::Run();
?>
