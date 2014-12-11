<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Caratula extends FrontControllerBase {
public $objFolio;  
public $id; 
public $objPartido;
public $objInfraestructura;
public $arrNom;
public $objUsoInterno;

public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
    try{
        
        $this->id=$_GET['idfolio'];
        
        $this->objFolio = Folio::Load($this->id);
        $this->objInfraestructura=Infraestructura::QuerySingle(QQ::Equal(QQN::Infraestructura()->IdFolio,$this->id));
        $this->objUsoInterno=UsoInterno::QuerySingle(QQ::Equal(QQN::UsoInterno()->IdFolio,$this->id));
        $this->arrNom= Nomenclatura::QueryArray(
         QQ::Equal(QQN::Nomenclatura()->IdFolio,$this->id),QQ::LimitInfo(4)
        );

        
    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}

public function limpiar_ceros($intInd,$strTipo){
    $nom=$this->arrNom[$intInd];
    $valor="";
    switch ($strTipo) {
        case 'circ':
            $valor=ltrim($nom->Circ,'0');
            break;
        case 'secc':
            $valor=strtoupper(ltrim($nom->Secc,'0'));
            break;
        case 'chac_quinta':
            $c=substr($nom->ChacQuinta, 0,7);
            $cn=substr($c, 0,4);
            $cl=substr($c, 4,3);
            $chacra=ltrim($cn,'0').ltrim($cl,'0');

            $q=substr($nom->ChacQuinta, 7,7);
            $qn=substr($q, 0,4);
            $ql=substr($q, 4,3);
            $quinta=ltrim($qn,'0').ltrim($ql,'0');
            
            $valor=$chacra.$quinta;
            break;    
        case 'frac':
            $fn=substr($nom->Frac, 0,4);
            $fl=substr($nom->Frac, 4,3);
            $fraccion=ltrim($fn,'0').ltrim($fl,'0');
            $valor=$fraccion;
            break;
        case 'mza':
            $mn=substr($nom->Mza, 0,4);
            $ml=substr($nom->Mza, 4,3);
            $mza=ltrim($mn,'0').ltrim($ml,'0');
            $valor=$mza;
            break;
        case 'parc':
            $pn=substr($nom->Parc, 0,4);
            $pl=substr($nom->Parc, 4,3);
            $parc=ltrim($pn,'0').ltrim($pl,'0');
            $valor=$parc;
            break;                    
        default:
            # code...
            break;
    }
  return $valor;
}

public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            
            parent::Run('Caratula', '../app/views/caratula.tpl.php');
            
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

Caratula::Run();
?>
