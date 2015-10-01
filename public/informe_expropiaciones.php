<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class InformeExpropiaciones extends FrontControllerBase {
public $objFolio;
public $id;
public $objPartido;
public $objInfraestructura;
public $arrNom;
public $objUsoInterno;
public $objCond;
public $objEquip;
public $objTransporte;
public $objAmbiental;
public $objRegularizacion;
public $objEncuadre;
public $objAntecedentes;
public $objOrg;

public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
    try{

        $this->id=$_GET['idfolio'];

        $this->objFolio = Folio::Load($this->id);
        $this->objEncuadre=EncuadreLegal::QuerySingle(QQ::Equal(QQN::EncuadreLegal()->IdFolio,$this->id));

    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}



public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {

              if(Authentication::EstaConectado()){
              parent::Run('InformeExpropiaciones', '../app/views/InformeExpropiaciones.tpl.php');
              }else{
                  echo("<script type='text/javascript'>alert('Error: No tiene permisos para ver el contenido.')</script>");
              }
                                
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

InformeExpropiaciones::Run();
?>
