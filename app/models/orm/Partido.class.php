<?php
require(__DATAGEN_CLASSES__ . '/PartidoGen.class.php');

class Partido extends PartidoGen {
    protected $strNoun = 'Partido';
    protected $strNounPlural = 'Partidos';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('%s - %s',  $this->strNombre,$this->strCodPartido);
    }

//class_query_method
    protected static $arrQueryTextFields = array(
        array("name"=>"Nombre","cod"=>"CodPartido","type"=>"string"),
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Partido::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Partido()->$arrCampo['name'], '%' . $strParameter . '%');
                    $arrCond[] = QQ::Like(QQN::Partido()->$arrCampo['cod'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Partido()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Partido no tiene definidos campos para la búsqueda de Autocomplete');
            case 1:
                return $arrCond[0];
            default:
                return QQ::OrCondition($arrCond);
        }
    }




}
?>