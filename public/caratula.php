<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Caratula extends FrontControllerBase {
public $objFolio;  
public $id; 
public $objPartido;
public $objInfraestructura;

public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
    try{
        
        $this->id=$_GET['idfolio'];
        
        $this->objFolio = Folio::Load($this->id);
        $this->objInfraestructura=Infraestructura::QuerySingle(QQ::Equal(QQN::Infraestructura()->IdFolio,$this->id));
        
        
    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}

public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            /*$id=$_GET['idfolio'];  
            $objDatabase = QApplication::$Database[1];
            $strQuery="
select f.*,p.nombre,i.energia_electrica_medidor_individual,i.alumbrado_publico,i.agua_corriente,i.red_cloacal,i.red_gas,i.pavimento
 from folio f join partido p on f.id_partido=p.id join infraestructura i on f.id=i.id_folio where f.id=$id";
            // Perform the Query
            $objDbResult = $objDatabase->Query($strQuery);        
            $caratula = $objDbResult->FetchArray();
        */
            parent::Run('Caratula', '../app/views/caratula.tpl.php');
            
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

}

Caratula::Run();
?>
