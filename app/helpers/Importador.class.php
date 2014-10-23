<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Importador
 *
 * @author jose
 */
abstract class Importador {

    protected $objPadronWeServiceClient;

    public static function TraerPadron(){
        $this->objPadronWeServiceClient = new PadronWebServiceClient();

        //Se conecta y trae todos los backups planos: 1 por tabla y los devuelve en un array
        $strTablaArray = $this->objPadronWeServiceClient->TraerPadronEntero();

        $database = QApplication::$Database[1];

        try{
            //$database->NonQuery("");
            foreach($strTablaArray as $strTabla){
                $strScript = file_get_contents($strTabla);
                $database->NonQuery($strScript);
            }
        }catch(Exception $e){
            LogHelper::Log($e->getMessage());
            $blnExitState = false;
        }
        $database->Close();

    }

    public static function TraerEntidad($intCEntidad, $intIdEntidad){
        $this->objPadronWeServiceClient = new PadronWebServiceClient();
        
        //devuelve un serialize del elemento totalmente Hidratado para abajo.
        $strEntidad = $this->objPadronWeServiceClient->TraerEntidad($intCEntidad, $intIdEntida);
        $objEntidad = unserialize($strEntidad);
        try{
            $objEntidad->Save();
        }catch(Exception $e){
            LogHelper::Log($e->getMessage());
            $blnExitState = false;
    }
        $database->Close();

    }



}
?>
